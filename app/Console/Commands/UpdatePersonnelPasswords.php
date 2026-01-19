<?php

namespace App\Console\Commands;

use App\Models\AIRID_Personnel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePersonnelPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'personnel:update-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour les mots de passe de tous les personnels avec le format Airid{prenom_personnel}{année}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mise à jour des mots de passe des personnels...');
        $this->info('Format: Airid{prenom_personnel}2026');
        $this->newLine();

        $personnels = AIRID_Personnel::all();
        $updated = 0;
        $skipped = 0;
        $annee = now()->format('Y'); // 2026

        foreach ($personnels as $personnel) {
            if (empty($personnel->prenom_personnel)) {
                $this->warn("Personnel ID {$personnel->id}: Prénom manquant, ignoré");
                $skipped++;
                continue;
            }

            // Générer le mot de passe selon le format: Airid{prenom_personnel}2026
            $password = 'Airid' . $personnel->prenom_personnel . $annee;
            
            // Hasher le mot de passe
            $hashedPassword = Hash::make($password);
            
            // Mettre à jour directement en base de données pour éviter les problèmes avec le mutator
            DB::table('airid_personnels')
                ->where('id', $personnel->id)
                ->update([
                    'password' => $hashedPassword,
                    'password_plain' => $password,
                    'updated_at' => now()
                ]);

            $email = $personnel->email_personnel ? " ({$personnel->email_personnel})" : " (pas d'email)";
            $this->line("✓ Personnel ID {$personnel->id}: {$personnel->prenom_personnel} {$personnel->nom_personnel}{$email}");
            $this->line("  Mot de passe: {$password}");
            $this->newLine();
            
            $updated++;
        }

        $this->info("═══════════════════════════════════════════════════════════");
        $this->info("Terminé! {$updated} personnels mis à jour, {$skipped} ignorés.");
        $this->info("═══════════════════════════════════════════════════════════");
        
        return Command::SUCCESS;
    }
}
