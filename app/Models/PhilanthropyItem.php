<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilanthropyItem extends Model
{
    protected $table = 'philanthropy_items';

    public const APPLY_FORM_HARDSHIP_FUND = 'hardship_fund';

    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'image_path',
        'image_paths',
        'content',
        'document_path',
        'document_path_fr',
        'closing_date',
        'apply_form_type',
        'apply_intro',
        'sort_order',
        'active',
        'status',
    ];

    protected $casts = [
        'active' => 'boolean',
        'image_paths' => 'array',
        'closing_date' => 'date',
    ];

    public const STATUS_ONGOING = 'ongoing';
    public const STATUS_PAST = 'past';

    public static function statusLabels(): array
    {
        return [
            self::STATUS_ONGOING => 'En cours',
            self::STATUS_PAST => 'Passé / Terminé',
        ];
    }

    public function hasApplyForm(): bool
    {
        return !empty($this->apply_form_type);
    }

    /** Vrai si la date de clôture est dépassée ou si le statut est past */
    public function isClosed(): bool
    {
        if ($this->status === self::STATUS_PAST) {
            return true;
        }
        if ($this->closing_date && $this->closing_date->isPast()) {
            return true;
        }
        return false;
    }

    /** Statut effectif pour l'affichage (clôture automatique si date dépassée) */
    public function getEffectiveStatusAttribute(): string
    {
        if ($this->closing_date && $this->closing_date->isPast()) {
            return self::STATUS_PAST;
        }
        return $this->status ?? self::STATUS_ONGOING;
    }

    /** Peut-on encore candidater (formulaire actif et pas clôturé) */
    public function canApply(): bool
    {
        return $this->hasApplyForm() && !$this->isClosed();
    }

    public static function applyFormTypeLabels(): array
    {
        return [
            '' => 'Aucun',
            self::APPLY_FORM_HARDSHIP_FUND => 'Candidature Hardship Fund (Women in STEM)',
        ];
    }

    /** Met à jour le statut pour les items dont la date de clôture est dépassée (annonce reste visible, candidature désactivée). */
    public static function syncClosingDates(): int
    {
        $today = now()->startOfDay();
        return self::whereNotNull('closing_date')
            ->where('closing_date', '<', $today)
            ->where('status', '!=', self::STATUS_PAST)
            ->update(['status' => self::STATUS_PAST]);
    }
}
