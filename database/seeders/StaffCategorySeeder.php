<?php

namespace Database\Seeders;

use App\Models\AIRID_Personnel;
use Illuminate\Database\Seeder;

/**
 * Remplit staff_category selon la logique Our Team :
 * - Management & Operations
 * - Facility & Platform Supervisors
 * - Research Team
 * Une seule catégorie par personne ; priorité : Management > Facility > Research.
 */
class StaffCategorySeeder extends Seeder
{
    public function run(): void
    {
        $personnels = AIRID_Personnel::with('posteOccupe')->get();

        foreach ($personnels as $p) {
            $prenom = $this->normalizeName($p->prenom_personnel ?? '');
            $intitule = $this->normalizeName(optional($p->posteOccupe)->intitule_poste ?? '');

            // Déjà assigné : on ne change pas (priorité déjà appliquée)
            if (!empty($p->staff_category)) {
                continue;
            }

            if ($this->isManagement($prenom, $intitule)) {
                $p->update(['staff_category' => AIRID_Personnel::CATEGORY_MANAGEMENT]);
                continue;
            }
            if ($this->isFacility($prenom, $intitule)) {
                $p->update(['staff_category' => AIRID_Personnel::CATEGORY_FACILITY]);
                continue;
            }
            if ($this->isResearch($prenom, $intitule)) {
                $p->update(['staff_category' => AIRID_Personnel::CATEGORY_RESEARCH]);
            }
        }
    }

    private function normalizeName(?string $s): string
    {
        return trim(mb_strtolower($s ?? ''));
    }

    private function contains(string $haystack, array $needles): bool
    {
        foreach ($needles as $n) {
            if ($n !== '' && str_contains($haystack, $n)) {
                return true;
            }
        }
        return false;
    }

    /** Management & Operations: Executive Director, Finance, Partnerships, Admin, HR, Governance, M&E */
    private function isManagement(string $prenom, string $intitule): bool
    {
        $prenoms = ['corine', 'prisca', 'mikael', 'imelda', 'danielle', 'georgine'];
        if (in_array($prenom, $prenoms, true)) {
            return true;
        }
        $titres = [
            'executive director', 'directeur', 'directrice',
            'finance', 'contracts officer', 'chief finance',
            'partnerships manager', 'administrative officer',
            'human resources', 'governance manager',
            'monitoring', 'evaluation officer', 'm&e',
        ];
        return $this->contains($intitule, $titres);
    }

    /** Facility & Platform Supervisors: Lab supervisors, Insectary, Field site, Data/IT, QA, Equipment */
    private function isFacility(string $prenom, string $intitule): bool
    {
        $prenoms = ['boris', 'judicael', 'romaric', 'damien', 'melis', 'justine', 'francis', 'corneille', 'eloe'];
        if (in_array($prenom, $prenoms, true)) {
            return true;
        }
        $titres = [
            'insecticide testing', 'laboratory supervisor', 'molecular', 'analytical laboratory',
            'insectary supervisor', 'field site', 'platform supervisor',
            'data', 'it platform', 'quality assurance manager', 'equipment platform',
        ];
        return $this->contains($intitule, $titres);
    }

    /** Research Team: PIs, Research Fellows, Scientific Officers, Senior/Research Assistants */
    private function isResearch(string $prenom, string $intitule): bool
    {
        $prenoms = [
            'idelphonse', 'ludovic', 'josias',
            'aicha', 'nadia', 'ridwane', 'euphrasie', 'jocelyn', 'martial', 'estelle',
        ];
        if (in_array($prenom, $prenoms, true)) {
            return true;
        }
        $titres = [
            'principal investigator', 'research fellow', 'scientific officer',
            'senior research assistant', 'research assistant',
        ];
        return $this->contains($intitule, $titres);
    }
}
