<?php

namespace App\Http\Controllers;

use App\Models\AIRID_Personnel;
use App\Models\AIRID_Publication;
use App\Models\AIRID_Vacancies;
use App\Models\AIRID_Partenaire;
use App\Models\AIRID_Project;
use App\Models\AIRID_ProjetCategory;
use App\Models\AIRID_News;
use App\Models\AIRID_Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // Login
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email_personnel' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email_personnel', 'password');

        // Use Laravel's authentication with custom field name
        if (Auth::guard('personnel')->attempt([
            'email_personnel' => $credentials['email_personnel'],
            'password' => $credentials['password']
        ], $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Les identifiants fournis ne correspondent pas à nos enregistrements.');
    }

    public function logout()
    {
        Auth::guard('personnel')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // Dashboard
    public function dashboard()
    {
        $personnel = Auth::guard('personnel')->user();
        $staffCount = AIRID_Personnel::count();
        $publicationsCount = AIRID_Publication::count();
        $vacanciesCount = AIRID_Vacancies::count();
        $projectsCount = AIRID_Project::count();
        $newsCount = AIRID_News::count();
        $blogsCount = AIRID_Blog::count();

        return view('admin.dashboard', compact('personnel', 'staffCount', 'publicationsCount', 'vacanciesCount', 'projectsCount', 'newsCount', 'blogsCount'));
    }

    // STAFF CRUD
    public function staffIndex()
    {
        $staff = AIRID_Personnel::with(['departement', 'posteOccupe'])->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    public function staffCreate()
    {
        $departements = \App\Models\AIRID_Departement::all();
        $postes = \App\Models\AIRID_Poste::all();
        return view('admin.staff.create', compact('departements', 'postes'));
    }

    public function staffStore(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'prenom_personnel' => 'required|string',
            'nom_personnel' => 'required|string',
            'email_personnel' => 'nullable|email|unique:airid_personnels,email_personnel',
            'photo_personnel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'niveau_poste' => 'required|integer',
            'poids_personnel' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_personnel')) {
            $file = $request->file('photo_personnel');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/staff');
            
            // Créer le dossier s'il n'existe pas avec gestion d'erreurs
            $directoryResult = $this->ensureDirectoryExists($destinationPath);
            if ($directoryResult !== true) {
                $errorMessage = is_string($directoryResult) 
                    ? $directoryResult 
                    : 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.';
                return back()->withErrors(['photo_personnel' => $errorMessage])->withInput();
            }
            
            try {
                $file->move($destinationPath, $fileName);
                $data['photo_personnel'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier photo_personnel', [
                    'destination' => $destinationPath,
                    'filename' => $fileName,
                    'error' => $e->getMessage()
                ]);
                return back()->withErrors(['photo_personnel' => 'Erreur lors de l\'enregistrement du fichier. Veuillez réessayer.'])->withInput();
            }
        }

        $personnel = AIRID_Personnel::create($data);
        
        // S'assurer que password_plain est défini si le mot de passe a été généré automatiquement
        if (empty($personnel->password_plain) && !empty($personnel->prenom_personnel)) {
            $annee = $personnel->created_at ? $personnel->created_at->format('Y') : now()->format('Y');
            $passwordPlain = 'Airid' . $personnel->prenom_personnel . $annee;
            $personnel->password_plain = $passwordPlain;
            $personnel->save();
        }

        return redirect()->route('admin.staff.index')->with('success', 'Staff ajouté avec succès');
    }

    public function staffShow($id)
    {
        $staff = AIRID_Personnel::with(['departement', 'posteOccupe'])->findOrFail($id);
        
        // Afficher le mot de passe en clair stocké en base de données
        // Si password_plain n'existe pas, générer selon le format par défaut
        if (!empty($staff->password_plain)) {
            $password = $staff->password_plain;
        } else {
            $annee = $staff->created_at ? $staff->created_at->format('Y') : now()->format('Y');
            $password = AIRID_Personnel::generatePassword($staff->prenom_personnel, $annee);
        }
        
        return view('admin.staff.show', compact('staff', 'password'));
    }

    public function staffEdit($id)
    {
        $staff = AIRID_Personnel::findOrFail($id);
        $departements = \App\Models\AIRID_Departement::all();
        $postes = \App\Models\AIRID_Poste::all();
        
        // Afficher le mot de passe en clair stocké en base de données
        // Si password_plain n'existe pas, générer selon le format par défaut
        if (!empty($staff->password_plain)) {
            $currentPassword = $staff->password_plain;
        } else {
            $annee = $staff->created_at ? $staff->created_at->format('Y') : now()->format('Y');
            $currentPassword = AIRID_Personnel::generatePassword($staff->prenom_personnel, $annee);
        }
        
        return view('admin.staff.edit', compact('staff', 'departements', 'postes', 'currentPassword'));
    }

    public function staffUpdate(Request $request, $id)
    {
        $staff = AIRID_Personnel::findOrFail($id);

        $request->validate([
            'titre' => 'required|string',
            'prenom_personnel' => 'required|string',
            'nom_personnel' => 'required|string',
            'email_personnel' => 'nullable|email|unique:airid_personnels,email_personnel,' . $id,
            'photo_personnel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'niveau_poste' => 'required|integer',
            'poids_personnel' => 'required|integer',
            'password' => 'nullable|string|min:6',
        ], [
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        $data = $request->all();

        // Retirer le mot de passe du tableau $data pour le gérer séparément
        $passwordToUpdate = null;
        // Vérifier si un mot de passe a été fourni (même si vide)
        if ($request->has('password')) {
            $newPassword = trim($request->input('password', ''));
            
            // Log pour debug
            \Log::info('Password update attempt', [
                'staff_id' => $id,
                'has_password_field' => $request->has('password'),
                'password_value' => $newPassword,
                'password_length' => strlen($newPassword),
                'password_not_empty' => !empty($newPassword),
                'password_min_length_ok' => strlen($newPassword) >= 6
            ]);
            
            // Si un mot de passe est fourni et qu'il n'est pas vide, on le met à jour
            if (!empty($newPassword) && strlen($newPassword) >= 6) {
                $passwordToUpdate = $newPassword;
                \Log::info('Password will be updated', ['new_password' => substr($passwordToUpdate, 0, 10) . '...']);
            } else {
                \Log::warning('Password not updated - empty or too short', [
                    'empty' => empty($newPassword),
                    'length' => strlen($newPassword)
                ]);
            }
            unset($data['password']);
        } else {
            \Log::info('Password field not present in request');
        }

        if ($request->hasFile('photo_personnel')) {
            // Supprimer l'ancienne photo si elle existe
            if ($staff->photo_personnel) {
                $oldFilePath = public_path('assets/staff/' . $staff->photo_personnel);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('photo_personnel');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/staff');
            
            // Créer le dossier s'il n'existe pas avec gestion d'erreurs
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_personnel' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_personnel'] = $fileName; // Stocker uniquement le nom du fichier
        }

        // Mettre à jour le mot de passe AVANT les autres champs pour éviter qu'il soit écrasé
        $passwordUpdated = false;
        if ($passwordToUpdate !== null && !empty($passwordToUpdate)) {
            // Hasher le mot de passe manuellement
            $hashedPassword = Hash::make($passwordToUpdate);
            
            \Log::info('Updating password in database', [
                'staff_id' => $staff->id,
                'old_password_hash_start' => substr($staff->password, 0, 20) . '...',
                'new_password_hash_start' => substr($hashedPassword, 0, 20) . '...',
                'plain_password' => substr($passwordToUpdate, 0, 10) . '...'
            ]);
            
            // Mettre à jour directement en base de données pour éviter les problèmes avec le mutator
            // Stocker aussi le mot de passe en clair pour l'affichage
            $updated = DB::table('airid_personnels')
                ->where('id', $staff->id)
                ->update([
                    'password' => $hashedPassword,
                    'password_plain' => $passwordToUpdate, // Stocker le mot de passe en clair
                    'updated_at' => now()
                ]);
            
            \Log::info('Database update result', [
                'rows_affected' => $updated,
                'staff_id' => $staff->id
            ]);
            
            if ($updated > 0) {
                // Rafraîchir le modèle pour avoir la nouvelle valeur
                $staff->refresh();
                
                // Vérifier que le mot de passe a bien été mis à jour
                $passwordMatches = Hash::check($passwordToUpdate, $staff->password);
                \Log::info('Password verification after update', [
                    'password_matches' => $passwordMatches,
                    'new_hash_start' => substr($staff->password, 0, 20) . '...',
                    'can_login_with_new_password' => $passwordMatches
                ]);
                
                $passwordUpdated = true;
            } else {
                \Log::error('Password update failed - no rows affected', [
                    'staff_id' => $staff->id
                ]);
            }
        } else {
            \Log::warning('Password not updated - passwordToUpdate is null or empty', [
                'passwordToUpdate' => $passwordToUpdate,
                'is_null' => is_null($passwordToUpdate),
                'is_empty' => empty($passwordToUpdate)
            ]);
        }
        
        // Mettre à jour les autres champs APRÈS le mot de passe
        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff modifié avec succès');
    }

    public function staffDestroy($id)
    {
        $staff = AIRID_Personnel::findOrFail($id);

        if ($staff->photo_personnel) {
            $filePath = public_path('assets/staff/' . $staff->photo_personnel);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff supprimé avec succès');
    }

    // PUBLICATIONS CRUD
    public function publicationsIndex()
    {
        $publications = AIRID_Publication::paginate(10);
        return view('admin.publications.index', compact('publications'));
    }

    public function publicationsCreate()
    {
        return view('admin.publications.create');
    }

    public function publicationsStore(Request $request)
    {
        $request->validate([
            'titre_publication' => 'required|string',
            'auteurs' => 'required|string',
            'annee_publication' => 'required|integer',
            'url_publication' => 'nullable|url',
            'resume_publication' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fichier_publication' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_couverture')) {
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/publications/couverture');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_couverture'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('fichier_publication')) {
            $file = $request->file('fichier_publication');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/publications/pdf');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['fichier_publication' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['fichier_publication'] = $fileName; // Stocker uniquement le nom du fichier
        }

        AIRID_Publication::create($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication ajoutée avec succès');
    }

    public function publicationsShow($id)
    {
        $publication = AIRID_Publication::findOrFail($id);
        return view('admin.publications.show', compact('publication'));
    }

    public function publicationsEdit($id)
    {
        $publication = AIRID_Publication::findOrFail($id);
        return view('admin.publications.edit', compact('publication'));
    }

    public function publicationsUpdate(Request $request, $id)
    {
        $publication = AIRID_Publication::findOrFail($id);

        $request->validate([
            'titre_publication' => 'required|string',
            'auteurs' => 'required|string',
            'annee_publication' => 'required|integer',
            'url_publication' => 'nullable|url',
            'resume_publication' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fichier_publication' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_couverture')) {
            // Supprimer l'ancienne photo si elle existe
            if ($publication->photo_couverture) {
                $oldFilePath = public_path('assets/publications/couverture/' . $publication->photo_couverture);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/publications/couverture');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_couverture'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('fichier_publication')) {
            // Supprimer l'ancien fichier si il existe
            if ($publication->fichier_publication) {
                $oldFilePath = public_path('assets/publications/pdf/' . $publication->fichier_publication);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('fichier_publication');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/publications/pdf');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['fichier_publication' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['fichier_publication'] = $fileName; // Stocker uniquement le nom du fichier
        }

        $publication->update($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication modifiée avec succès');
    }

    public function publicationsDestroy($id)
    {
        $publication = AIRID_Publication::findOrFail($id);

        if ($publication->photo_couverture) {
            $filePath = public_path('assets/publications/couverture/' . $publication->photo_couverture);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($publication->fichier_publication) {
            $filePath = public_path('assets/publications/pdf/' . $publication->fichier_publication);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $publication->delete();

        return redirect()->route('admin.publications.index')->with('success', 'Publication supprimée avec succès');
    }

    // VACANCIES CRUD
    public function vacanciesIndex()
    {
        $vacancies = AIRID_Vacancies::paginate(10);
        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function vacanciesCreate()
    {
        return view('admin.vacancies.create');
    }

    public function vacanciesStore(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string',
            'contract_type' => 'required|string',
            'location' => 'required|string',
            'application_deadline' => 'required|date',
            'url_page' => 'nullable|url',
            'email_apply' => 'nullable|email',
            'subject' => 'nullable|string',
            'application_file_fr' => 'nullable|file|mimes:pdf|max:10240',
            'application_file_en' => 'nullable|file|mimes:pdf|max:10240',
            'intitule_recrutement' => 'required|string',
            'type_contrat_propose' => 'required|string',
            'a_propos_airid' => 'nullable|string',
            'resume_poste' => 'nullable|string',
            'responsabilites_principales' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'offre' => 'nullable|string',
            'comment_postuler' => 'nullable|string',
            'date_fin_candidature' => 'required|date',
            'plus_info' => 'nullable|string',
            'note_info' => 'nullable|string',
            'active' => 'boolean',
        ]);

        $data = $request->all();

        // Convertir active en booléen
        $data['active'] = $request->has('active') && $request->input('active') ? 1 : 0;

        if ($request->hasFile('application_file_fr')) {
            $file = $request->file('application_file_fr');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['application_file_fr' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_fr'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('application_file_en')) {
            $file = $request->file('application_file_en');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['application_file_en' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_en'] = $fileName; // Stocker uniquement le nom du fichier
        }

        AIRID_Vacancies::create($data);

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy ajoutée avec succès');
    }

    public function vacanciesShow($id)
    {
        $vacancy = AIRID_Vacancies::findOrFail($id);
        return view('admin.vacancies.show', compact('vacancy'));
    }

    public function vacanciesEdit($id)
    {
        $vacancy = AIRID_Vacancies::findOrFail($id);
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    public function vacanciesUpdate(Request $request, $id)
    {
        $vacancy = AIRID_Vacancies::findOrFail($id);

        $request->validate([
            'job_title' => 'required|string',
            'contract_type' => 'required|string',
            'location' => 'required|string',
            'application_deadline' => 'required|date',
            'url_page' => 'nullable|url',
            'email_apply' => 'nullable|email',
            'subject' => 'nullable|string',
            'application_file_fr' => 'nullable|file|mimes:pdf|max:10240',
            'application_file_en' => 'nullable|file|mimes:pdf|max:10240',
            'intitule_recrutement' => 'required|string',
            'type_contrat_propose' => 'required|string',
            'a_propos_airid' => 'nullable|string',
            'resume_poste' => 'nullable|string',
            'responsabilites_principales' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'offre' => 'nullable|string',
            'comment_postuler' => 'nullable|string',
            'date_fin_candidature' => 'required|date',
            'plus_info' => 'nullable|string',
            'note_info' => 'nullable|string',
            'active' => 'boolean',
        ]);

        $data = $request->all();

        // Convertir active en booléen
        $data['active'] = $request->has('active') && $request->input('active') ? 1 : 0;

        if ($request->hasFile('application_file_fr')) {
            // Supprimer l'ancien fichier si il existe
            if ($vacancy->application_file_fr) {
                $oldFilePath = public_path('assets/vacancies/' . $vacancy->application_file_fr);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('application_file_fr');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['application_file_fr' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_fr'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('application_file_en')) {
            // Supprimer l'ancien fichier si il existe
            if ($vacancy->application_file_en) {
                $oldFilePath = public_path('assets/vacancies/' . $vacancy->application_file_en);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('application_file_en');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['application_file_en' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_en'] = $fileName; // Stocker uniquement le nom du fichier
        }

        $vacancy->update($data);

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy modifiée avec succès');
    }

    public function vacanciesDestroy($id)
    {
        $vacancy = AIRID_Vacancies::findOrFail($id);

        if ($vacancy->application_file_fr) {
            $filePath = public_path('assets/vacancies/' . $vacancy->application_file_fr);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($vacancy->application_file_en) {
            $filePath = public_path('assets/vacancies/' . $vacancy->application_file_en);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy supprimée avec succès');
    }

    // PARTNERS CRUD
    public function partnersIndex()
    {
        $partners = AIRID_Partenaire::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function partnersCreate()
    {
        return view('admin.partners.create');
    }

    public function partnersStore(Request $request)
    {
        $request->validate([
            'nom_partenaire' => 'required|string|max:255',
            'nom_long_partenaire' => 'nullable|string|max:500',
            'type_partenaire' => 'required|string|in:funding_partner,industry_partner,accreditation_partner,Work partner',
            'description' => 'nullable|string',
            'logo_partenaire' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_web' => 'nullable|url|max:500',
            'linkedin' => 'nullable|url|max:500',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo_partenaire')) {
            $file = $request->file('logo_partenaire');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/logo');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['logo_partenaire' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['logo_partenaire'] = $fileName;
        }

        AIRID_Partenaire::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire ajouté avec succès');
    }

    public function partnersShow($id)
    {
        $partner = AIRID_Partenaire::findOrFail($id);
        return view('admin.partners.show', compact('partner'));
    }

    public function partnersEdit($id)
    {
        $partner = AIRID_Partenaire::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function partnersUpdate(Request $request, $id)
    {
        $partner = AIRID_Partenaire::findOrFail($id);

        $request->validate([
            'nom_partenaire' => 'required|string|max:255',
            'nom_long_partenaire' => 'nullable|string|max:500',
            'type_partenaire' => 'required|string|in:funding_partner,industry_partner,accreditation_partner,Work partner',
            'description' => 'nullable|string',
            'logo_partenaire' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_web' => 'nullable|url|max:500',
            'linkedin' => 'nullable|url|max:500',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo_partenaire')) {
            // Supprimer l'ancien logo si il existe
            if ($partner->logo_partenaire) {
                $oldFilePath = public_path('storage/assets/logo/' . $partner->logo_partenaire);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('logo_partenaire');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/logo');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['logo_partenaire' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['logo_partenaire'] = $fileName;
        } else {
            // Garder l'ancien logo si aucun nouveau fichier n'est fourni
            unset($data['logo_partenaire']);
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire modifié avec succès');
    }

    public function partnersDestroy($id)
    {
        $partner = AIRID_Partenaire::findOrFail($id);

        if ($partner->logo_partenaire) {
            $filePath = public_path('storage/assets/logo/' . $partner->logo_partenaire);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire supprimé avec succès');
    }

    // PROJECTS CRUD
    public function projectsIndex()
    {
        $projects = AIRID_Project::with(['category', 'sponsor', 'studyDirector', 'projectManager'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function projectsCreate()
    {
        $categories = AIRID_ProjetCategory::all();
        $sponsors = AIRID_Partenaire::all();
        $personnels = AIRID_Personnel::all();
        return view('admin.projects.create', compact('categories', 'sponsors', 'personnels'));
    }

    public function projectsStore(Request $request)
    {
        $request->validate([
            'short_title_project' => 'required|string|max:255',
            'long_title_project' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seconde_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creator_id' => 'required|integer',
            'date_debut_project' => 'nullable|date',
            'date_fin_project' => 'nullable|date|after_or_equal:date_debut_project',
            'study_director' => 'nullable|integer',
            'project_manager' => 'nullable|integer',
            'sponsor_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'etat_projet' => 'required|in:ongoing,ended,abandoned',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_couverture')) {
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/projects');
            
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_couverture'] = $fileName;
        }

        if ($request->hasFile('seconde_photo')) {
            $file = $request->file('seconde_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/projects');
            
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['seconde_photo' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['seconde_photo'] = $fileName;
        }

        AIRID_Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet ajouté avec succès');
    }

    public function projectsShow($id)
    {
        $project = AIRID_Project::with(['category', 'sponsor', 'studyDirector', 'projectManager', 'personnelsTeam'])->findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    public function projectsEdit($id)
    {
        $project = AIRID_Project::findOrFail($id);
        $categories = AIRID_ProjetCategory::all();
        $sponsors = AIRID_Partenaire::all();
        $personnels = AIRID_Personnel::all();
        return view('admin.projects.edit', compact('project', 'categories', 'sponsors', 'personnels'));
    }

    public function projectsUpdate(Request $request, $id)
    {
        $project = AIRID_Project::findOrFail($id);

        $request->validate([
            'short_title_project' => 'required|string|max:255',
            'long_title_project' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seconde_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creator_id' => 'required|integer',
            'date_debut_project' => 'nullable|date',
            'date_fin_project' => 'nullable|date|after_or_equal:date_debut_project',
            'study_director' => 'nullable|integer',
            'project_manager' => 'nullable|integer',
            'sponsor_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'etat_projet' => 'required|in:ongoing,ended,abandoned',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_couverture')) {
            if ($project->photo_couverture) {
                $oldFilePath = public_path('storage/assets/projects/' . $project->photo_couverture);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/projects');
            
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_couverture'] = $fileName;
        }

        if ($request->hasFile('seconde_photo')) {
            if ($project->seconde_photo) {
                $oldFilePath = public_path('storage/assets/projects/' . $project->seconde_photo);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('seconde_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('storage/assets/projects');
            
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['seconde_photo' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            $file->move($destinationPath, $fileName);
            $data['seconde_photo'] = $fileName;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet modifié avec succès');
    }

    public function projectsDestroy($id)
    {
        $project = AIRID_Project::findOrFail($id);

        if ($project->photo_couverture) {
            $filePath = public_path('storage/assets/projects/' . $project->photo_couverture);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($project->seconde_photo) {
            $filePath = public_path('storage/assets/projects/' . $project->seconde_photo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès');
    }

    /**
     * Créer un dossier de manière sécurisée avec gestion d'erreurs
     * Crée récursivement tous les dossiers parents nécessaires
     *
     * @param string $path Chemin du dossier à créer
     * @return bool|string True si le dossier existe ou a été créé, message d'erreur sinon
     */
    private function ensureDirectoryExists($path)
    {
        // Normaliser le chemin (supprimer les slashes en fin)
        $path = rtrim($path, DIRECTORY_SEPARATOR . '/\\');
        
        // Si le dossier existe déjà, vérifier qu'il est accessible en écriture
        if (File::exists($path)) {
            if (!is_dir($path)) {
                \Log::error('Le chemin existe mais n\'est pas un dossier', ['path' => $path]);
                return 'Le chemin spécifié existe mais n\'est pas un dossier.';
            }
            if (!is_writable($path)) {
                $perms = substr(sprintf('%o', fileperms($path)), -4);
                \Log::error('Le dossier existe mais n\'est pas accessible en écriture', [
                    'path' => $path,
                    'permissions' => $perms
                ]);
                return 'Le dossier existe mais n\'a pas les permissions d\'écriture nécessaires (permissions actuelles: ' . $perms . ').';
            }
            return true;
        }

        // Obtenir le dossier parent
        $parentPath = dirname($path);
        
        // Si le dossier parent n'existe pas, le créer récursivement
        if (!File::exists($parentPath)) {
            $parentResult = $this->ensureDirectoryExists($parentPath);
            if ($parentResult !== true) {
                \Log::error('Impossible de créer le dossier parent', [
                    'parent' => $parentPath,
                    'target' => $path,
                    'error' => $parentResult
                ]);
                return $parentResult;
            }
        }
        
        // Vérifier que le dossier parent est accessible en écriture
        if (!is_writable($parentPath)) {
            $parentPerms = File::exists($parentPath) ? substr(sprintf('%o', fileperms($parentPath)), -4) : 'N/A';
            \Log::error('Le dossier parent n\'est pas accessible en écriture', [
                'parent' => $parentPath,
                'target' => $path,
                'permissions' => $parentPerms
            ]);
            return 'Le dossier parent "' . basename($parentPath) . '" n\'a pas les permissions d\'écriture nécessaires (permissions: ' . $parentPerms . '). Veuillez contacter l\'administrateur pour configurer les permissions.';
        }
        
        // Créer le dossier final
        try {
            // Essayer d'abord avec File::makeDirectory (création récursive)
            File::makeDirectory($path, 0755, true);
            
            // Vérifier que le dossier a bien été créé
            if (!File::exists($path) || !is_dir($path)) {
                throw new \Exception("Le dossier n'a pas été créé correctement après File::makeDirectory");
            }
            
            // Essayer de définir les permissions (peut échouer sur certains hébergeurs)
            @chmod($path, 0755);
            
            // Vérifier que le dossier est accessible en écriture
            if (!is_writable($path)) {
                // Essayer avec des permissions plus permissives
                @chmod($path, 0777);
                if (!is_writable($path)) {
                    $perms = substr(sprintf('%o', fileperms($path)), -4);
                    \Log::warning('Le dossier créé n\'est pas accessible en écriture', [
                        'path' => $path,
                        'permissions' => $perms
                    ]);
                    throw new \Exception("Le dossier créé n'est pas accessible en écriture (permissions: $perms)");
                }
            }
            
            \Log::info('Dossier créé avec succès', [
                'path' => $path,
                'permissions' => substr(sprintf('%o', fileperms($path)), -4)
            ]);
            
            return true;
            
        } catch (\Exception $e) {
            // Si File::makeDirectory échoue, essayer avec mkdir natif
            try {
                // Utiliser mkdir avec création récursive
                if (!@mkdir($path, 0755, true)) {
                    $error = error_get_last();
                    throw new \Exception($error['message'] ?? 'Erreur inconnue lors de la création du dossier avec mkdir');
                }
                
                // Vérifier que le dossier a bien été créé
                if (!is_dir($path)) {
                    throw new \Exception("Le dossier n'a pas été créé correctement après mkdir");
                }
                
                // Essayer de définir les permissions
                @chmod($path, 0755);
                
                // Vérifier que le dossier est accessible en écriture
                if (!is_writable($path)) {
                    // Essayer avec des permissions plus permissives
                    @chmod($path, 0777);
                    if (!is_writable($path)) {
                        $perms = substr(sprintf('%o', fileperms($path)), -4);
                        \Log::warning('Le dossier créé n\'est pas accessible en écriture (mkdir)', [
                            'path' => $path,
                            'permissions' => $perms
                        ]);
                        throw new \Exception("Le dossier créé n'est pas accessible en écriture après mkdir (permissions: $perms)");
                    }
                }
                
                \Log::info('Dossier créé avec succès (mkdir)', [
                    'path' => $path,
                    'permissions' => substr(sprintf('%o', fileperms($path)), -4)
                ]);
                
                return true;
                
            } catch (\Exception $e2) {
                // Logs détaillés pour le débogage
                $parentExists = File::exists($parentPath);
                $parentWritable = $parentExists ? is_writable($parentPath) : false;
                $parentPerms = $parentExists ? substr(sprintf('%o', fileperms($parentPath)), -4) : 'N/A';
                $publicPath = public_path();
                $publicExists = File::exists($publicPath);
                $publicWritable = $publicExists ? is_writable($publicPath) : false;
                $publicPerms = $publicExists ? substr(sprintf('%o', fileperms($publicPath)), -4) : 'N/A';
                
                // Vérifier si le dossier assets existe
                $assetsPath = public_path('assets');
                $assetsExists = File::exists($assetsPath);
                $assetsWritable = $assetsExists ? is_writable($assetsPath) : false;
                $assetsPerms = $assetsExists ? substr(sprintf('%o', fileperms($assetsPath)), -4) : 'N/A';
                
                \Log::error('Impossible de créer le dossier - détails complets', [
                    'path' => $path,
                    'parent' => $parentPath,
                    'parent_exists' => $parentExists,
                    'parent_writable' => $parentWritable,
                    'parent_permissions' => $parentPerms,
                    'assets_path' => $assetsPath,
                    'assets_exists' => $assetsExists,
                    'assets_writable' => $assetsWritable,
                    'assets_permissions' => $assetsPerms,
                    'public_path' => $publicPath,
                    'public_exists' => $publicExists,
                    'public_writable' => $publicWritable,
                    'public_permissions' => $publicPerms,
                    'user' => function_exists('get_current_user') ? @get_current_user() : 'N/A',
                    'umask' => sprintf('%o', umask()),
                    'error_file' => $e->getMessage(),
                    'error_mkdir' => $e2->getMessage(),
                    'php_version' => PHP_VERSION,
                    'os' => PHP_OS
                ]);
                
                // Message d'erreur plus informatif pour l'utilisateur
                return 'Impossible de créer le dossier "' . basename($path) . '". Le serveur n\'a pas les permissions nécessaires. Solution: Exécutez la commande "php artisan assets:create-directories" sur le serveur, ou créez manuellement le dossier ' . $path . ' avec les permissions 755 ou 777 via FTP/cPanel. Détails dans les logs Laravel.';
            }
        }
    }

    // NEWS CRUD
    public function newsIndex()
    {
        $news = AIRID_News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function newsCreate()
    {
        $personnel = Auth::guard('personnel')->user();
        return view('admin.news.create', compact('personnel'));
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'titre_news' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seconde_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_news' => 'nullable|date',
        ]);

        $data = $request->only(['titre_news', 'resume', 'description_sans_html', 'description_riche', 'date_news']);
        
        // Ajouter le créateur (admin connecté)
        $personnel = Auth::guard('personnel')->user();
        if ($personnel) {
            $data['creator_id'] = $personnel->id;
        }

        // Si date_news n'est pas fournie, utiliser la date actuelle
        if (empty($data['date_news'])) {
            $data['date_news'] = now()->format('Y-m-d');
        }

        if ($request->hasFile('photo_couverture')) {
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/news');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['photo_couverture'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier news: ' . $e->getMessage());
                return back()->withErrors(['photo_couverture' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        if ($request->hasFile('seconde_photo')) {
            $file = $request->file('seconde_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/news');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['seconde_photo' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['seconde_photo'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier seconde_photo: ' . $e->getMessage());
                return back()->withErrors(['seconde_photo' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        AIRID_News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News ajoutée avec succès');
    }

    public function newsShow($id)
    {
        $news = AIRID_News::with('creatorNews')->findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    public function newsEdit($id)
    {
        $news = AIRID_News::findOrFail($id);
        $personnel = Auth::guard('personnel')->user();
        return view('admin.news.edit', compact('news', 'personnel'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $news = AIRID_News::findOrFail($id);

        $request->validate([
            'titre_news' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seconde_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_news' => 'nullable|date',
        ]);

        $data = $request->only(['titre_news', 'resume', 'description_sans_html', 'description_riche', 'date_news']);

        // Si date_news n'est pas fournie, utiliser la date actuelle
        if (empty($data['date_news'])) {
            $data['date_news'] = now()->format('Y-m-d');
        }

        if ($request->hasFile('photo_couverture')) {
            // Supprimer l'ancienne photo si elle existe
            if ($news->photo_couverture) {
                $oldFilePath = public_path('assets/news/' . $news->photo_couverture);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('photo_couverture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/news');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['photo_couverture'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier news: ' . $e->getMessage());
                return back()->withErrors(['photo_couverture' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        if ($request->hasFile('seconde_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($news->seconde_photo) {
                $oldFilePath = public_path('assets/news/' . $news->seconde_photo);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('seconde_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/news');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['seconde_photo' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['seconde_photo'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier seconde_photo: ' . $e->getMessage());
                return back()->withErrors(['seconde_photo' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News modifiée avec succès');
    }

    public function newsDestroy($id)
    {
        $news = AIRID_News::findOrFail($id);

        if ($news->photo_couverture) {
            $filePath = public_path('assets/news/' . $news->photo_couverture);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        if ($news->seconde_photo) {
            $filePath = public_path('assets/news/' . $news->seconde_photo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News supprimée avec succès');
    }

    // BLOGS CRUD
    public function blogsIndex()
    {
        $blogs = AIRID_Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function blogsCreate()
    {
        $personnel = Auth::guard('personnel')->user();
        return view('admin.blogs.create', compact('personnel'));
    }

    public function blogsStore(Request $request)
    {
        $request->validate([
            'titre_blog' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture_blog' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_blog' => 'nullable|date',
        ]);

        $data = $request->only(['titre_blog', 'resume', 'description_sans_html', 'description_riche', 'date_blog']);
        
        // Ajouter le créateur (admin connecté)
        $personnel = Auth::guard('personnel')->user();
        if ($personnel) {
            $data['creator_id'] = $personnel->id;
        }

        if ($request->hasFile('photo_couverture_blog')) {
            $file = $request->file('photo_couverture_blog');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/blogs');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture_blog' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['photo_couverture_blog'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier blog: ' . $e->getMessage());
                return back()->withErrors(['photo_couverture_blog' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        AIRID_Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog ajouté avec succès');
    }

    public function blogsShow($id)
    {
        $blog = AIRID_Blog::with('creatorBlog')->findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function blogsEdit($id)
    {
        $blog = AIRID_Blog::findOrFail($id);
        $personnel = Auth::guard('personnel')->user();
        return view('admin.blogs.edit', compact('blog', 'personnel'));
    }

    public function blogsUpdate(Request $request, $id)
    {
        $blog = AIRID_Blog::findOrFail($id);

        $request->validate([
            'titre_blog' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description_sans_html' => 'nullable|string',
            'description_riche' => 'nullable|string',
            'photo_couverture_blog' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_blog' => 'nullable|date',
        ]);

        $data = $request->only(['titre_blog', 'resume', 'description_sans_html', 'description_riche', 'date_blog']);

        if ($request->hasFile('photo_couverture_blog')) {
            // Supprimer l'ancienne photo si elle existe
            if ($blog->photo_couverture_blog) {
                $oldFilePath = public_path('assets/blogs/' . $blog->photo_couverture_blog);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            $file = $request->file('photo_couverture_blog');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/blogs');
            
            // Créer le dossier s'il n'existe pas
            if (!$this->ensureDirectoryExists($destinationPath)) {
                return back()->withErrors(['photo_couverture_blog' => 'Impossible de créer le dossier de destination. Veuillez contacter l\'administrateur.'])->withInput();
            }
            
            // Déplacer le fichier
            try {
                $file->move($destinationPath, $fileName);
                $data['photo_couverture_blog'] = $fileName; // Stocker uniquement le nom du fichier
            } catch (\Exception $e) {
                \Log::error('Erreur lors du déplacement du fichier blog: ' . $e->getMessage());
                return back()->withErrors(['photo_couverture_blog' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()])->withInput();
            }
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog modifié avec succès');
    }

    public function blogsDestroy($id)
    {
        $blog = AIRID_Blog::findOrFail($id);

        if ($blog->photo_couverture_blog) {
            $filePath = public_path('assets/blogs/' . $blog->photo_couverture_blog);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog supprimé avec succès');
    }
}
