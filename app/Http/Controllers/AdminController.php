<?php

namespace App\Http\Controllers;

use App\Models\AIRID_Personnel;
use App\Models\AIRID_Publication;
use App\Models\AIRID_Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'nom' => 'required|string',
            'poste' => 'required|string',
        ]);

        // Check if personnel exists with matching nom and poste
        $personnel = AIRID_Personnel::where('nom_personnel', $request->nom)
            ->whereHas('posteOccupe', function($query) use ($request) {
                $query->where('intitule_poste', $request->poste);
            })
            ->first();

        if ($personnel) {
            // Create a session for the admin
            session(['admin_personnel' => $personnel]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->forget('admin_personnel');
        return redirect()->route('admin.login');
    }

    // Dashboard
    public function dashboard()
    {
        $staffCount = AIRID_Personnel::count();
        $publicationsCount = AIRID_Publication::count();
        $vacanciesCount = AIRID_Vacancies::count();

        return view('admin.dashboard', compact('staffCount', 'publicationsCount', 'vacanciesCount'));
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
            
            // Créer le dossier s'il n'existe pas
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_personnel'] = $fileName; // Stocker uniquement le nom du fichier
        }

        AIRID_Personnel::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff ajouté avec succès');
    }

    public function staffEdit($id)
    {
        $staff = AIRID_Personnel::findOrFail($id);
        $departements = \App\Models\AIRID_Departement::all();
        $postes = \App\Models\AIRID_Poste::all();
        return view('admin.staff.edit', compact('staff', 'departements', 'postes'));
    }

    public function staffUpdate(Request $request, $id)
    {
        $staff = AIRID_Personnel::findOrFail($id);

        $request->validate([
            'titre' => 'required|string',
            'prenom_personnel' => 'required|string',
            'nom_personnel' => 'required|string',
            'photo_personnel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'departement_id' => 'required|integer',
            'poste_id' => 'required|integer',
            'niveau_poste' => 'required|integer',
            'poids_personnel' => 'required|integer',
        ]);

        $data = $request->all();

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
            
            // Créer le dossier s'il n'existe pas
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_personnel'] = $fileName; // Stocker uniquement le nom du fichier
        }

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
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['photo_couverture'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('fichier_publication')) {
            $file = $request->file('fichier_publication');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/publications/pdf');
            
            // Créer le dossier s'il n'existe pas
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['fichier_publication'] = $fileName; // Stocker uniquement le nom du fichier
        }

        AIRID_Publication::create($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication ajoutée avec succès');
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
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
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
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
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

        if ($request->hasFile('application_file_fr')) {
            $file = $request->file('application_file_fr');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_fr'] = $fileName; // Stocker uniquement le nom du fichier
        }

        if ($request->hasFile('application_file_en')) {
            $file = $request->file('application_file_en');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/vacancies');
            
            // Créer le dossier s'il n'existe pas
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $fileName);
            $data['application_file_en'] = $fileName; // Stocker uniquement le nom du fichier
        }

        AIRID_Vacancies::create($data);

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy ajoutée avec succès');
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
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
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
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
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
}
