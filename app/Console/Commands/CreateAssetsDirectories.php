<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateAssetsDirectories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:create-directories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer tous les dossiers nécessaires pour les assets (staff, publications, vacancies, etc.)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Création des dossiers assets...');
        
        $directories = [
            public_path('assets/staff'),
            public_path('assets/publications/couverture'),
            public_path('assets/publications/pdf'),
            public_path('assets/vacancies'),
            public_path('storage/assets/logo'),
        ];
        
        $created = 0;
        $failed = 0;
        
        foreach ($directories as $directory) {
            try {
                if (File::exists($directory)) {
                    if (is_writable($directory)) {
                        $this->line("✓ {$directory} existe déjà et est accessible en écriture");
                        continue;
                    } else {
                        $perms = substr(sprintf('%o', fileperms($directory)), -4);
                        $this->warn("⚠ {$directory} existe mais n'est pas accessible en écriture (permissions: {$perms})");
                        
                        // Essayer de corriger les permissions
                        if (@chmod($directory, 0755)) {
                            if (is_writable($directory)) {
                                $this->info("  → Permissions corrigées avec succès");
                                continue;
                            }
                        }
                        
                        // Essayer avec 0777
                        if (@chmod($directory, 0777)) {
                            if (is_writable($directory)) {
                                $this->info("  → Permissions corrigées avec succès (777)");
                                continue;
                            }
                        }
                        
                        $this->error("  ✗ Impossible de corriger les permissions");
                        $failed++;
                        continue;
                    }
                }
                
                // Créer le dossier
                File::makeDirectory($directory, 0755, true);
                
                // Vérifier que le dossier a été créé
                if (File::exists($directory) && is_dir($directory)) {
                    // Essayer de définir les permissions
                    @chmod($directory, 0755);
                    
                    // Vérifier l'accessibilité en écriture
                    if (!is_writable($directory)) {
                        @chmod($directory, 0777);
                    }
                    
                    if (is_writable($directory)) {
                        $perms = substr(sprintf('%o', fileperms($directory)), -4);
                        $this->info("✓ {$directory} créé avec succès (permissions: {$perms})");
                        $created++;
                    } else {
                        $perms = substr(sprintf('%o', fileperms($directory)), -4);
                        $this->error("✗ {$directory} créé mais non accessible en écriture (permissions: {$perms})");
                        $failed++;
                    }
                } else {
                    $this->error("✗ Échec de la création de {$directory}");
                    $failed++;
                }
                
            } catch (\Exception $e) {
                $this->error("✗ Erreur lors de la création de {$directory}: " . $e->getMessage());
                $failed++;
            }
        }
        
        $this->newLine();
        $this->info("Résumé:");
        $this->line("  - Dossiers créés: {$created}");
        $this->line("  - Échecs: {$failed}");
        
        if ($failed > 0) {
            $this->newLine();
            $this->warn("Certains dossiers n'ont pas pu être créés ou ne sont pas accessibles en écriture.");
            $this->warn("Vous devrez peut-être les créer manuellement via FTP/cPanel avec les permissions 755 ou 777.");
            return 1;
        }
        
        $this->newLine();
        $this->info("Tous les dossiers ont été créés avec succès!");
        return 0;
    }
}
