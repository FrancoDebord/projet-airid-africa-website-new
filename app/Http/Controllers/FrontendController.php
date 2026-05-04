<?php

namespace App\Http\Controllers;

use App\Models\AIRID_Contact;
use App\Models\AIRID_Departement;
use App\Models\Airid_NewsLetterEmail;
use App\Models\AIRID_News;
use App\Models\AIRID_Blog;
use App\Models\AIRID_Partenaire;
use App\Models\AIRID_Personnel;
use App\Models\AIRID_Photo;
use App\Models\AIRID_Project;
use App\Models\AIRID_ProjetCategory;
use App\Models\AIRID_Publication;
use App\Models\AIRID_Vacancies;
use App\Models\AIRID_Video;
use App\Models\HardshipFundApplication;
use App\Models\PhilanthropyItem;
use App\Mail\ConflictDeclarationThankYou;
use App\Mail\StaffPlatformsLoginNotification;
use Illuminate\Support\Facades\File;
use App\Models\Conflict;
use App\Models\Departement;
use App\Models\LoginConflict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    //

    function __construct() {}


    function index()
    {

        $all_recents_projects = AIRID_Project::orderBy("date_debut_project", "desc")->get();
        $all_projects_categories = AIRID_ProjetCategory::all();
        $all_partenaires = AIRID_Partenaire::all();
        $all_news = AIRID_News::orderBy("created_at", "desc")->get();

        // Vérifier si la colonne 'active' existe avant de l'utiliser
        $vacancyQuery = AIRID_Vacancies::orderBy('application_deadline', 'desc');
        if (Schema::hasColumn('airid_vacancies', 'active')) {
            $vacancyQuery->where('active', 1);
        }
        $recent_vacancy = $vacancyQuery->first();

        $recent_publication = AIRID_Publication::orderBy('annee_publication', 'desc')->first();

        $recent_news = $all_news->first();

        return view("accueil", compact("all_recents_projects", "all_projects_categories", "all_partenaires", "all_news", "recent_news", "recent_vacancy", "recent_publication"));
    }

    /**
     *
     */


    function allServicesPage(Request $request)
    {

        try {

            $all_departements = AIRID_Departement::where("afficher_menu", "<>", 0)->get();

            return view("all-departements", compact("all_departements"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function MissionVisionPage()
    {

        $all_partenaires = AIRID_Partenaire::all();
        $all_departements = AIRID_Departement::where("afficher_menu", "<>", 0)->get();
        return view("vision-mission", compact("all_departements", "all_partenaires"));
    }

    function staffAirid(Request $request)
    {
        $categoryFilter = $request->get('category', 'all');
        $staffCategories = AIRID_Personnel::categorySlugs();

        // Seuls les membres ayant au moins une catégorie Our Team sont affichés
        $executive_director = AIRID_Personnel::with('posteOccupe')
            ->where('niveau_poste', 1)
            ->whereNotNull('staff_category')
            ->where('staff_category', '<>', '')
            ->orderBy('poids_personnel', 'desc')
            ->orderBy('nom_personnel', 'asc')
            ->get();

        $query = AIRID_Personnel::with('posteOccupe')
            ->where('niveau_poste', '<>', 1)
            ->whereNotNull('staff_category')
            ->where('staff_category', '<>', '')
            ->orderBy('niveau_poste', 'asc')
            ->orderBy('poids_personnel', 'desc')
            ->orderBy('nom_personnel', 'asc');

        if ($categoryFilter !== 'all' && array_key_exists($categoryFilter, $staffCategories)) {
            $query->inStaffCategory($categoryFilter);
        }

        $other_staffs = $query->get();

        return view('staff', compact('executive_director', 'other_staffs', 'staffCategories', 'categoryFilter'));
    }

    /**
     * Download Code of Conduct PDF (from storage or public/documents).
     * Avoids 404 from storage symlink; serves file directly.
     */
    public function downloadCodeOfConduct()
    {
        $paths = [
            public_path('documents/AIRID_Code_of_Conduct.pdf'),
            public_path('documents/code-of-conduct.pdf'),
            public_path('documents/AIRID_CODE OF CONDUCT FRANCAISE.pdf'),
            storage_path('app/public/documents_recrutement/AIRID_CODE OF CONDUCT FRANCAISE.pdf'),
            storage_path('app/public/documents_recrutementAIRID_CODE OF CONDUCT FRANCAISE.pdf'),
        ];
        foreach ($paths as $path) {
            if (file_exists($path) && is_readable($path)) {
                return response()->download($path, 'AIRID_Code_of_Conduct.pdf', [
                    'Content-Type' => 'application/pdf',
                ]);
            }
        }
        abort(404, 'Document not found.');
    }

    function detailStaffAirid($id, $slug, Request $request)
    {

        try {

            $staff = AIRID_Personnel::findOrFail($id);

            return view("detail-staff", compact("staff"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function aboutPage()
    {

        $all_departements = AIRID_Departement::where("afficher_menu", "<>", 0)->get();

        return view("about", compact("all_departements"));
    }

    function allProjectsPage()
    {

        $all_projects = AIRID_Project::orderBy("date_debut_project", "desc")->simplePaginate(9);

        return view("all-projects", compact("all_projects"));
    }

    function detailProject($id, $slug, Request $request)
    {

        try {

            $projet = AIRID_Project::findOrFail($id);
            $others_projects = AIRID_Project::where("id", "<>", $id)
                ->orderBy("date_debut_project", "desc")
                ->get();

            return view("project-detail", compact("projet", "others_projects"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function allPublicationsPage()
    {

        $all_publications = AIRID_Publication::orderBy("annee_publication", "desc")->simplePaginate(20);
        return view("all-publications", compact("all_publications"));
    }

    function detailPublication($id, $slug, Request $request)
    {

        try {

            $publication = AIRID_Publication::findOrFail($id);

            $others_publications = AIRID_Publication::where("id", "<>", $id)
                ->orderBy("date_publication", "desc")
                ->simplePaginate(10);

            return view("detail-publication", compact("publication", "others_publications"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    function videoPage(Request $request)
    {

        $all_videos = AIRID_Video::orderBy("date_video", "desc")->get();

        $all_partenaires = AIRID_Partenaire::all();

        return view("videos", compact("all_videos", "all_partenaires"));
    }

    function photosPage(Request $request)
    {

        $all_photos = AIRID_Photo::orderBy("date_event", "desc")->get();
        $all_photos_categories = AIRID_Photo::select("categorie_photo")->distinct()->get();

        $all_partenaires = AIRID_Partenaire::all();

        return view("photos", compact("all_photos", "all_photos_categories", "all_partenaires"));
    }

    public function storeConflict(Request $request)
    {
        try {
            $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'position_role' => 'nullable|string|max:255',
            'department_unit' => 'nullable|string|max:255',
            'engagement_type' => 'nullable|string|max:255',
            'engagement_other_text' => 'nullable|string|max:255',
            'email_address' => 'required|email|max:255',
            'declaration_date_personal' => 'nullable|date',
            'objective_of_declaration' => 'nullable|in:Meeting,Recruitment,Board Meeting,Contract Awarding,Partnerships and Collaborations,Others',
            'objective_other_text' => 'nullable|string|max:255|required_if:objective_of_declaration,Others',
            'objective_meeting_date' => 'nullable|date|required_if:objective_of_declaration,Others,Meeting',
            'financial_interest' => 'nullable|in:Yes,No',
            'financial_details' => 'nullable|string',
            'professional_interest' => 'nullable|in:Yes,No',
            'professional_details' => 'nullable|string',
            'personal_interest' => 'nullable|in:Yes,No',
            'personal_details' => 'nullable|string',
            'research_interest' => 'nullable|in:Yes,No',
            'research_details' => 'nullable|string',
            'other_information' => 'nullable|string',
            'declaration_agree' => 'accepted',
            'declaration_name' => 'nullable|string|max:255',
            'declaration_signature' => 'required|string',
            'declaration_date_sign' => 'nullable|date',
        ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Conflict form validation failed', ['errors' => $e->errors()]);
            throw $e;
        }

        $natureParts = [];
        if (($validated['financial_interest'] ?? null) === 'Yes') {
            $natureParts[] = 'Financial';
        }
        if (($validated['professional_interest'] ?? null) === 'Yes') {
            $natureParts[] = 'Professional/Institutional';
        }
        if (($validated['personal_interest'] ?? null) === 'Yes') {
            $natureParts[] = 'Personal Relationship';
        }
        if (($validated['research_interest'] ?? null) === 'Yes') {
            $natureParts[] = 'Research-Related';
        }
        if (!empty($validated['other_information'] ?? null)) {
            $natureParts[] = 'Other';
        }

        $descriptionLines = [];
        if (!empty($validated['financial_details'] ?? null)) {
            $descriptionLines[] = 'Financial: ' . $validated['financial_details'];
        }
        if (!empty($validated['professional_details'] ?? null)) {
            $descriptionLines[] = 'Professional/Institutional: ' . $validated['professional_details'];
        }
        if (!empty($validated['personal_details'] ?? null)) {
            $descriptionLines[] = 'Personal Relationship: ' . $validated['personal_details'];
        }
        if (!empty($validated['research_details'] ?? null)) {
            $descriptionLines[] = 'Research-Related: ' . $validated['research_details'];
        }
        if (!empty($validated['other_information'] ?? null)) {
            $descriptionLines[] = 'Other: ' . $validated['other_information'];
        }

        $financialInterest = ($validated['financial_interest'] ?? null) === 'Yes';
        $professionalInterest = ($validated['professional_interest'] ?? null) === 'Yes';
        $personalInterest = ($validated['personal_interest'] ?? null) === 'Yes';
        $researchInterest = ($validated['research_interest'] ?? null) === 'Yes';
        $objective = $validated['objective_of_declaration'] ?? null;
        $objectiveOtherText = $objective === 'Others' ? ($validated['objective_other_text'] ?? null) : null;
        $objectiveMeetingDate = in_array($objective, ['Meeting', 'Others'], true)
            ? ($validated['objective_meeting_date'] ?? null)
            : null;

        $refNo = null;
        try {
            $refNo = DB::transaction(function () use ($validated, $natureParts, $descriptionLines, $financialInterest, $professionalInterest, $personalInterest, $researchInterest, $objective, $objectiveOtherText, $objectiveMeetingDate) {
                $nextSequence = (int) Conflict::max('ref_sequence') + 1;
                $refNo = 'COI-' . str_pad((string) $nextSequence, 3, '0', STR_PAD_LEFT);

                Conflict::create([
                    'ref_sequence' => $nextSequence,
                    'ref_no' => $refNo,
                    'full_name' => $validated['full_name'],
                    'position_role' => $validated['position_role'] ?? null,
                    'department_unit' => $validated['department_unit'] ?? null,
                    'engagement_type' => $validated['engagement_type'] ?? null,
                    'engagement_other_text' => $validated['engagement_other_text'] ?? null,
                    'nature_of_conflict' => $natureParts ? implode(', ', $natureParts) : null,
                    'conflict_description' => $descriptionLines ? implode("\n", $descriptionLines) : null,
                    'date_declared' => $validated['declaration_date_personal'] ?? now()->toDateString(),
                    'email_address' => $validated['email_address'] ?? null,
                    'declaration_date_personal' => $validated['declaration_date_personal'] ?? null,
                    'objective_of_declaration' => $objective,
                    'objective_other_text' => $objectiveOtherText,
                    'objective_meeting_date' => $objectiveMeetingDate,
                    'financial_interest' => $financialInterest,
                    'financial_details' => $validated['financial_details'] ?? null,
                    'professional_interest' => $professionalInterest,
                    'professional_details' => $validated['professional_details'] ?? null,
                    'personal_interest' => $personalInterest,
                    'personal_details' => $validated['personal_details'] ?? null,
                    'research_interest' => $researchInterest,
                    'research_details' => $validated['research_details'] ?? null,
                    'other_information' => $validated['other_information'] ?? null,
                    'declaration_agree' => true,
                    'declaration_name' => $validated['declaration_name'] ?? null,
                    'declaration_signature' => $validated['declaration_signature'] ?? null,
                    'declaration_date_sign' => $validated['declaration_date_sign'] ?? null,
                    'status' => 'Open',
                ]);

                return $refNo;
            });
        } catch (\Throwable $e) {
            Log::error('Conflict declaration save failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()
                ->withInput()
                ->with('error', 'Unable to save your declaration. Error: ' . $e->getMessage());
        }

        if (!empty($validated['email_address'])) {
            try {
                Mail::to($validated['email_address'])->send(new ConflictDeclarationThankYou($validated, $refNo));
                Log::info('Conflict confirmation email sent', ['to' => $validated['email_address'], 'ref' => $refNo]);
            } catch (\Throwable $e) {
                Log::error('Conflict confirmation email failed', [
                    'to' => $validated['email_address'],
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $request->session()->put('conflict_access_success', true);
        return back()->with('success', 'Your declaration has been successfully recorded.');
    }

    public function showConflictAccessForm()
    {
        return view('conflict_access');
    }

    public function submitConflictAccess(Request $request)
    {
        $validated = $request->validate([
            'access_code' => 'required|string|max:255',
        ]);

        $code = trim($validated['access_code']);
        $loginConflict = LoginConflict::where('access_code', $code)->where('active', true)->first();

        if (!$loginConflict) {
            return back()->with('error', 'Code invalide ou inactif.');
        }

        $request->session()->put('conflict_access_granted', true);
        $request->session()->put('conflict_access_used', false);
        $request->session()->put('conflict_login_id', $loginConflict->id);

        return redirect()->route('conflictOfInterest');
    }

    /**
     * Affiche le formulaire pour changer le code d'accès (login_conflicts).
     * Affiche d'abord les informations existantes.
     */
    public function showConflictChangeAccessCodeForm(Request $request)
    {
        $loginConflictId = $request->session()->get('conflict_login_id');
        if (!$loginConflictId) {
            return redirect()->route('conflict.access.form')->with('error', 'Accès non autorisé.');
        }
        $loginConflict = LoginConflict::find($loginConflictId);
        if (!$loginConflict) {
            $request->session()->forget('conflict_login_id');
            return redirect()->route('conflict.access.form')->with('error', 'Compte introuvable.');
        }
        return view('conflict_change_access_code', compact('loginConflict'));
    }

    public function updateConflictAccessCode(Request $request)
    {
        $loginConflictId = $request->session()->get('conflict_login_id');
        if (!$loginConflictId) {
            return redirect()->route('conflict.access.form')->with('error', 'Accès non autorisé.');
        }
        $loginConflict = LoginConflict::findOrFail($loginConflictId);

        $validated = $request->validate([
            'current_access_code' => 'required|string|max:255',
            'access_code' => 'required|string|max:255|confirmed',
        ], [
            'access_code.confirmed' => 'La confirmation du code d\'accès ne correspond pas.',
        ]);

        if (trim($validated['current_access_code']) !== $loginConflict->access_code) {
            return back()->withErrors(['current_access_code' => 'Le code d\'accès actuel est incorrect.'])->withInput();
        }

        $loginConflict->access_code = trim($validated['access_code']);
        $loginConflict->save();

        return redirect()->route('conflict.change.access.code')->with('success', 'Le code d\'accès a été modifié avec succès.');
    }


    function photoDetailPage($tag, Request $request)
    {

        $all_photos = AIRID_Photo::orderBy("date_event", "desc")
            ->where("tag", $tag)
            ->get();

        return view("detail-photo", compact("all_photos"));
    }


    function partnersPage(Request $request)
    {


        $all_partenaires = AIRID_Partenaire::all();
        return view("partenaires-page", compact("all_partenaires"));
    }


    function bioAssayLab(Request $request)
    {

        return view("bioassay-lab-page");
    }
    function molecularLabPage(Request $request)
    {

        return view("molecular-lab-page");
    }

    function analyticalCheminstryLabPage(Request $request)
    {

        return view("analytical-chemistry-lab-page");
    }
    /**
     * Field Research Platforms landing page (3 clickable cards: Experimental Hut, Field Site Lab, Community Evaluation).
     */
    public function fieldResearchPlatformsLanding(Request $request)
    {
        return view('field-research-platforms-landing');
    }

    /**
     * Field Site Laboratory detail page (field station content).
     */
    public function fieldStationLabPage(Request $request)
    {
        return view('filed-station-page');
    }

    public function fieldStationPage(Request $request)
    {
        return view('field-research-platforms-landing');
    }
    function insectaryPage(Request $request)
    {

        return view("insectary-page");
    }
    function animalHousePage(Request $request)
    {

        return view("animal-house-page");
    }

    function experimentalHutStationPage(Request $request)
    {

        return view("experimental-hut-station-page");
    }

    function mosquitoPlasmodiumLaboratoryPage(Request $request)
    {

        return view("mosquito-plasmodium-laboratory");
    }

    function contactPage(Request $request)
    {
        // Toujours générer une nouvelle question mathématique aléatoire pour l'anti-bot
        // La question change à chaque chargement de page (actualisation ou après soumission)
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $answer = $num1 + $num2;

        // Stocker la réponse dans la session
        session(['math_answer' => $answer]);
        session(['math_question' => "$num1 + $num2"]);

        return view("contact", [
            'math_question' => "$num1 + $num2"
        ]);
    }

    function postContactMessage(Request $request)
    {
        // Vérifier d'abord le honeypot field (must be empty)
        if (!empty($request->robot_trap)) { // Si le champ honeypot est rempli, c'est un bot
            return redirect()->route("contactPage")->with("message", "Anti-robot control failed.");
        }

        $rules = [
            "full_name" => "required",
            "adresse_mail" => "required|email",
            "subject" => "required",
            "detailed_message" => "required",
            "math_answer" => "required|numeric",
        ];

        $request->validate($rules);

        // Vérifier la réponse mathématique depuis la session
        $correctAnswer = session('math_answer');

        // Si la session a expiré ou n'existe pas, régénérer une nouvelle question
        if ($correctAnswer === null) {
            return redirect()->route("contactPage")
                ->withErrors(['math_answer' => 'Session expired. Please refresh the page and try again.'])
                ->withInput();
        }


        // Vérifier si la réponse est correcte
        if ((int)$request->math_answer !== (int)$correctAnswer) {
            // Nettoyer la session pour générer une nouvelle question après l'erreur
            session()->forget(['math_answer', 'math_question']);

            return redirect()->route("contactPage")
                ->withErrors(['math_answer' => 'The mathematical answer is incorrect. Please try again.'])
                ->withInput();
        }

        if ($request->fill_robot != "") { //COntrol anti robot

            $create = AIRID_Contact::create($request->all());
            return redirect()->route("contactPage")->with("message", "Contact message successfully sent. We'll get back to you via your mail address.");
        }

        // Nettoyer la session après validation réussie
        // Une nouvelle question sera générée automatiquement par contactPage()
        session()->forget(['math_answer', 'math_question']);

        $create = AIRID_Contact::create($request->all());
        return redirect()->route("contactPage")->with("message", "Contact message successfully sent. We'll get back to you via your mail address.");
    }


    function pageCRECLSHTM(Request $request)
    {

        $all_partenaires = AIRID_Partenaire::where("partenaire_crec_lshtm", 1)->get();

        return view("crec-lshtm-project", compact("all_partenaires"));
    }

    function vacanciesPage(Request $request)
    {
        $vacancyQuery = AIRID_Vacancies::orderBy("application_deadline", "desc")
            ->whereRaw('UPPER(TRIM(job_title)) != ?', ['AVIS AUX FOURNISSEURS']);
        if (Schema::hasColumn('airid_vacancies', 'active')) {
            $vacancyQuery->where('active', 1);
        }
        $all_vacancies = $vacancyQuery->get();
        return view("vacancies", compact("all_vacancies"));
    }

    /**
     * Détail d'une offre d'emploi (vacancy).
     */
    function vacancyDetail(Request $request, $id, $slug)
    {
        $vacancy = AIRID_Vacancies::findOrFail($id);
        $expectedSlug = \Illuminate\Support\Str::slug($vacancy->job_title ?? 'vacancy');
        if ($slug !== $expectedSlug) {
            return redirect()->route('vacancyDetail', ['id' => $vacancy->id, 'slug' => $expectedSlug], 301);
        }
        if (!View::exists('vacancy-detail')) {
            return redirect()->route('vacanciesPage')
                ->with('warning', 'Vacancy detail page is temporarily unavailable. Please try again later.');
        }
        return view('vacancy-detail', compact('vacancy'));
    }

    function newsPage(Request $request)
    {
        $all_projects = AIRID_Project::orderBy("date_debut_project", "desc")->get();

        // Vérifier si la colonne 'active' existe avant de l'utiliser
        $vacancyQuery = AIRID_Vacancies::orderBy("application_deadline", "desc");
        if (Schema::hasColumn('airid_vacancies', 'active')) {
            $vacancyQuery->where("active", 1);
        }
        // Filter to show only open vacancies (deadline not passed)
        $vacancyQuery->where(function($q) {
            $q->whereNull('application_deadline')
              ->orWhere('application_deadline', '>=', date('Y-m-d'));
        });
        $all_vacancies = $vacancyQuery->get();

        $all_publications = AIRID_Publication::orderBy("annee_publication", "desc")->get();
        $all_videos = Schema::hasTable('videos')
            ? AIRID_Video::orderBy("date_video", "desc")->get()
            : collect();
        $all_photos = AIRID_Photo::orderBy("date_event", "desc")->get();
        $all_news = AIRID_News::orderBy("created_at", "desc")->get();
        $all_blogs = AIRID_Blog::orderBy("created_at", "desc")->get();

        return view("news", compact("all_projects", "all_vacancies", "all_publications", "all_videos", "all_photos", "all_news", "all_blogs"));
    }

    /**
     * Détail d'une actualité (news).
     */
    public function newsDetail(int $id, string $slug)
    {
        $news = AIRID_News::with('creatorNews', 'photosGallery')->findOrFail($id);
        return view('news-detail', compact('news'));
    }

    /**
     * Détail d'un article de blog.
     */
    public function blogDetail(int $id, string $slug)
    {
        $blog = AIRID_Blog::with('creatorBlog')->findOrFail($id);

        $expectedSlug = \Illuminate\Support\Str::slug($blog->titre_blog ?? 'blog');
        if ($slug !== $expectedSlug) {
            return redirect()->route('blog-detail', ['id' => $blog->id, 'slug' => $expectedSlug], 301);
        }

        return view('blog-detail', compact('blog'));
    }

    function vacanciesChimisteAnalytiquePage(Request $request)
    {

        return view("vacancies-chimiste-analytique");
    }

    function vacanciesAgentTerrainGavi(Request $request)
    {

        return view("vacancies-agents-terrain-gavi");
    }


    function motDirecteur(Request $request)
    {

        return view("mot_directeur");
    }
    function motBoardOfDirectors(Request $request)
    {

        return view("message_board_of_directors");
    }
    function researchActivitiesPage(Request $request)
    {

        return view("research-activities");
    }

    /**
     * Research that informs policy and practice – page dédiée.
     */
    /** Research Centres overview (landing page) */
    function researchPolicyPracticePage(Request $request)
    {
        return view("research-policy-practice");
    }

    /** Centre for Policy, Systems and Implementation Research (detail page) */
    function researchCentrePolicyPracticePage(Request $request)
    {
        return view("research-centre-policy-practice");
    }

    /** Centre for Vector Biology and Intervention Research */
    function researchCentreVectorBiologyPage(Request $request)
    {
        return view("research-centre-vector-biology");
    }

    /** Centre for Data Science, Analytics and Modelling */
    function researchCentreDataSciencePage(Request $request)
    {
        return view("research-centre-data-science");
    }

    function educationTrainingPage(Request $request)
    {

        return view("education-training");
    }

    function projetGaviSiriPage(Request $request)
    {


        return view("gavi-siri-project");
    }
    function projetOptimvecPage(Request $request)
    {


        return view("projet-optimvec");
    }

    function projetDuranetPage(Request $request)
    {


        return view("duranet-project");
    }
    function projetATSBPage(Request $request)
    {


        return view("atsb-project");
    }
    function projetVesterguaardITNPage(Request $request)
    {


        return view("vesterguard-itn-project");
    }
    function projetSpatialRepellentsPage(Request $request)
    {


        return view("spatial-repellents-project");
    }


    function interceptorProductDevelopmentPage(Request $request)
    {


        return view("interceptor-development");
    }
    function duranetProductDevelopmentPage(Request $request)
    {


        return view("duranet-product-development");
    }

    function yorkoolProductDevelopmentPage(Request $request)
    {


        return view("yorkool-product-development");
    }
    function healthPulseProductDevelopmentPage(Request $request)
    {


        return view("health-pulse-product-development");
    }

    function yorkoolG4ProductDevelopmentPage(Request $request)
    {


        return view("yorkool-g4-product-development");
    }
    function pamvercBeninPage(Request $request)
    {


        return view("pamverc-benin");
    }
    function newsletterPage(Request $request)
    {


        return view("newsletter");
    }

    function subscribeNewsLetter(Request $request)
    {

        $rules = [
            "email_newsletter" => "email|required"
        ];

        $request->validate($rules);

        $data_subscription = [
            "email_subscribe" => $request->email_newsletter,
            "date_start_subscribe" => now(),
        ];

        $check = Airid_NewsLetterEmail::where("email_subscribe", $request->email_newsletter)->first();
        if ($check) {
            return redirect()->to(route("index") . "#newsletter-section-message")->with(["message" => "This address is already added to our list. No need again"]);
        }

        if (!$request->fill_robot) { //COntrol anti robot

            $create = Airid_NewsLetterEmail::create($data_subscription);
            return redirect()->to(route("index") . "#newsletter-section-message")->with(["message" => "Your mail address successfully added to our newsletter list"]);
        }

        return redirect()->to(route("index") . "#newsletter-section-message");
    }

    function getInvolvedPage(Request $request)
    {
        return view("get-involved");
    }

    /**
     * Données statiques des thématiques Philanthropy (liste + détail).
     */
    private function philanthropyItems(): array
    {
        $banner = asset('storage/assets_vendor/images/banner/banner2_new.png');
        return [
            'our-impact' => [
                'title' => 'Our Impact',
                'excerpt' => 'Your support helps AIRID advance African-led research in infectious diseases, strengthen health systems, and train the next generation of scientists.',
                'image' => $banner,
                'content' => '<p>By supporting AIRID, you are investing in African-led science, stronger health systems, and long-term solutions to infectious diseases. Our work spans vector control evaluation, malaria and neglected tropical diseases, capacity strengthening, and policy-relevant research.</p><p>Donations help us maintain state-of-the-art facilities, support early-career researchers, and respond to public health priorities in the region. Every contribution directly supports our mission: <strong>Bold Science. African-Led. Impact-Driven.</strong></p><p>We use funds transparently and report on outcomes so you can see the difference your generosity makes.</p>',
                'images' => [$banner],
            ],
            'how-to-give' => [
                'title' => 'How to Give',
                'excerpt' => 'Donate by email, phone, or through our contact form. We welcome one-time gifts and ongoing partnerships.',
                'image' => $banner,
                'content' => '<p>You can support AIRID in several ways:</p><ul><li><strong>Email:</strong> Reach our partnerships team at <a href="mailto:partnerships@airid-africa.com">partnerships@airid-africa.com</a> to discuss a donation or partnership.</li><li><strong>Phone:</strong> Contact us at +229 01 67 16 44 99 for donations and partnership enquiries.</li><li><strong>Contact form:</strong> Use our website contact form to send a message; we will get back to you promptly.</li></ul><p>We accept one-time gifts and can discuss structured giving, corporate partnerships, or funding for specific programmes. All donations are used in line with our mission and reported with transparency.</p>',
                'images' => [$banner],
            ],
            'funding-priorities' => [
                'title' => 'Funding Priorities',
                'excerpt' => 'Research and facilities, capacity strengthening, and community engagement are among our key funding priorities.',
                'image' => $banner,
                'content' => '<p>AIRID directs philanthropic support toward high-impact areas:</p><ul><li><strong>Research and facilities:</strong> Upgrading laboratories, insectaries, and field platforms to maintain world-class standards.</li><li><strong>Capacity strengthening:</strong> Training and mentoring for African researchers and technical staff.</li><li><strong>Community engagement:</strong> Ensuring research benefits communities and supports national health priorities.</li><li><strong>Equipment and innovation:</strong> Enabling new lines of research and more efficient data collection and analysis.</li></ul><p>We align all funded activities with our strategy and report on progress to donors and partners.</p>',
                'images' => [$banner],
            ],
        ];
    }



    function philanthropyPage(Request $request)
    {
        $banner = asset('storage/assets_vendor/images/banner/banner2_new.png');
        $rows = PhilanthropyItem::where('active', true)->orderBy('sort_order')->orderBy('title')->get();
        $philanthropyItems = [];
        foreach ($rows as $row) {
            $img = $row->image_path ? ('/assets/philanthropy/' . $row->image_path) : $banner;
            $philanthropyItems[$row->slug] = [
                'title' => $row->title,
                'excerpt' => $row->excerpt ?? '',
                'image' => $img,
                'content' => $row->content ?? '',
                'images' => [$img],
            ];
        }
        if ($philanthropyItems === [] && \Illuminate\Support\Facades\Schema::hasTable('philanthropy_items')) {
            $philanthropyItems = $this->philanthropyItems();
        }
        return view('philanthropy', compact('philanthropyItems'));
    }

    function philanthropyDetail(string $slug)
    {
        $row = PhilanthropyItem::where('slug', $slug)->where('active', true)->first();
        if ($row) {
            $banner = asset('storage/assets_vendor/images/banner/banner2_new.png');
            $img = $row->image_path ? ('/assets/philanthropy/' . $row->image_path) : $banner;
            $images = [$img];
            if ($row->image_paths && is_array($row->image_paths)) {
                foreach ($row->image_paths as $path) {
                    $images[] = '/assets/philanthropy/' . $path;
                }
            }
            $item = [
                'slug' => $row->slug,
                'title' => $row->title,
                'content' => $row->content ?? '',
                'images' => $images,
                'status' => $row->status ?? 'ongoing',
                'document_url' => $row->document_path ? ('/assets/philanthropy/' . $row->document_path) : null,
                'has_apply_form' => $row->hasApplyForm(),
            ];
            return view('philanthropy-detail', compact('item'));
        }
        $items = $this->philanthropyItems();
        if (!isset($items[$slug])) {
            abort(404);
        }
        $item = $items[$slug];
        $item['slug'] = $slug;
        $item['has_apply_form'] = false;
        return view('philanthropy-detail', compact('item'));
    }

    /**
     * Page Apply dynamique : contenu et formulaire selon l’item Philanthropy (slug).
     */
    public function philanthropyApplyForm(string $slug)
    {
        $item = PhilanthropyItem::where('slug', $slug)->where('active', true)->first();
        if (!$item || !$item->apply_form_type) {
            abort(404);
        }
        return view('philanthropy-apply', compact('item'));
    }

    /**
     * Soumission du formulaire Apply (type selon item : hardship_fund, etc.).
     */
    public function philanthropyApplyStore(Request $request, string $slug)
    {
        $item = PhilanthropyItem::where('slug', $slug)->where('active', true)->first();
        if (!$item || !$item->apply_form_type) {
            abort(404);
        }
        if ($item->apply_form_type === PhilanthropyItem::APPLY_FORM_HARDSHIP_FUND) {
            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:30',
                'date_of_birth' => 'required|date|before_or_equal:today',
                'nationality' => 'required|string|max:100',
                'university' => 'required|string|max:255',
                'programme' => 'required|string|max:255',
                'level' => 'required|string|in:undergraduate,masters',
                'proof_enrolment' => 'required|file|mimes:pdf|max:10240',
                'transcript' => 'required|file|mimes:pdf|max:10240',
                'support_letter' => 'required|file|mimes:pdf|max:10240',
                'id_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'personal_statement' => 'nullable|string|max:2000',
            ]);
            $dir = public_path('assets/hardship_fund');
            if (!File::isDirectory($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            $data = $request->only([
                'first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'nationality',
                'university', 'programme', 'level', 'personal_statement'
            ]);
            $data['status'] = HardshipFundApplication::STATUS_PENDING;
            foreach (['proof_enrolment' => 'proof_enrolment_path', 'transcript' => 'transcript_path', 'support_letter' => 'support_letter_path', 'id_document' => 'id_document_path'] as $input => $col) {
                if ($request->hasFile($input)) {
                    $file = $request->file($input);
                    $name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
                    $file->move($dir, $name);
                    $data[$col] = $name;
                }
            }
            HardshipFundApplication::create($data);
            return redirect()->route('philanthropy.apply.form', $slug)->with('success', 'Your application has been submitted successfully. We will contact you by email.');
        }
        abort(404);
    }

    /**
     * Portail personnel My AIRID – affiche tous les sites / logiciels AIRID en cartes cliquables.
     */
    function myAiridPortal(Request $request)
    {
        $portal_external = config('portal.external', []);
        return view("my-airid-portal", compact('portal_external'));
    }

    /**
     * Staff Platforms Portal – email-gated access
     */
    public function staffPlatformsAuth()
    {
        if (session('staff_platforms_access')) {
            return redirect()->route('staffPlatforms.access');
        }
        return view('staff-platforms-auth');
    }

    public function staffPlatformsCheck(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email = strtolower(trim($request->input('email')));

        $staff = \App\Models\StaffPlatformsAccess::whereRaw('LOWER(TRIM(email)) = ?', [$email])->first();

        if (!$staff) {
            return back()->withErrors(['email' => 'This email address is not recognised.'])->withInput();
        }

        $staffName = trim($staff->prenom . ' ' . $staff->nom);

        session([
            'staff_platforms_access' => true,
            'staff_platforms_name'   => $staffName,
            'staff_platforms_email'  => $email,
        ]);

        try {
            Mail::to($email)->send(new StaffPlatformsLoginNotification(
                $staffName,
                $email,
                $request->ip()
            ));
        } catch (\Exception $e) {
            Log::error('Staff platform login notification failed: ' . $e->getMessage());
        }

        return redirect()->route('staffPlatforms.access');
    }

    public function staffPlatformsAccess()
    {
        if (!session('staff_platforms_access')) {
            return redirect()->route('staffPlatforms.auth')->withErrors(['email' => 'Please verify your email to access this page.']);
        }
        return view('staff-platforms');
    }

    public function staffPlatformsLogout(Request $request)
    {
        $request->session()->forget(['staff_platforms_access', 'staff_platforms_name', 'staff_platforms_email']);
        return redirect()->route('staffPlatforms.auth');
    }

    /**
     * About sub-pages: history, strategy, scientific-advisory-board, organisational-structure, code-of-conduct
     */
    public function showAboutPage(string $slug)
    {
        $pages = [
            'history' => ['title' => ' Our History '],
            'strategy' => ['title' => ' Our Strategy'],
            'scientific-advisory-board' => ['title' => 'Scientific Advisory Board', 'lead' => 'Our scientific advisory board.'],
            'organisational-structure' => ['title' => 'Organisational Structure', 'lead' => 'AIRID organisational chart and structure.'],
            'code-of-conduct' => ['title' => 'Code of Conduct', 'lead' => 'Code of conduct and ethical standards.'],
            'management-operations' => ['title' => 'Management & Operations', 'lead' => 'Leadership, administration and support functions.'],
            'unit-supervisors' => ['title' => 'Unit Supervisors', 'lead' => 'Heads of laboratories, units and operational teams.'],
            'research-team' => ['title' => 'Research Team', 'lead' => 'Scientists, project staff and research personnel.'],
        ];
        $data = $pages[$slug] ?? ['title' => ucfirst(str_replace('-', ' ', $slug)), 'lead' => ''];

        // Staff data for About sub-pages
        $staffForView = null;
        if ($slug === 'organisational-structure') {
            // Organigramme : tout le personnel, ordonné par niveau hiérarchique puis poids
            $staffForView = AIRID_Personnel::with(['departement', 'posteOccupe'])
                ->orderBy('niveau_poste')
                ->orderBy('poids_personnel', 'desc')
                ->get();
        }
        $slugToCategory = [
            'management-operations' => AIRID_Personnel::CATEGORY_MANAGEMENT,
            'unit-supervisors'      => AIRID_Personnel::CATEGORY_FACILITY,
            'research-team'        => AIRID_Personnel::CATEGORY_RESEARCH,
        ];
        if (isset($slugToCategory[$slug])) {
            $staffForView = AIRID_Personnel::with('posteOccupe')
                ->inStaffCategory($slugToCategory[$slug])
                ->orderBy('niveau_poste')
                ->orderBy('poids_personnel', 'desc')
                ->orderBy('nom_personnel', 'asc')
                ->get();
        }

        $viewName = 'about.' . $slug;
        if (View::exists($viewName)) {
            $data['content'] = view($viewName, ['staff' => $staffForView ?? collect()])->render();
        }

        return view('static-page', [
            'pageTitle' => $data['title'],
            'pageLead' => $data['lead'] ?? '',
            'pageContent' => $data['content'] ?? null,
            'breadcrumbParent' => ['label' => 'About AIRID', 'url' => route('aboutPage')],
        ]);
    }

    /**
     * Facilities landing page
     */
    public function facilitiesLanding(Request $request)
    {
        return view('facilities-research-platforms');
    }

    /**
     * Facility sub-pages
     */
    public function showFacilityPage(string $slug)
    {
        $pages = [
            'chemical-storage' => ['title' => 'Chemical Storage'],
            'irs-block-treatment' => ['title' => 'IRS Block Treatment Room'],
            'itn-washing' => ['title' => 'ITN Washing Room'],
            'arm-in-cage' => ['title' => 'Arm-in-Cage Tests'],
            'flight-rooms' => ['title' => 'Mosquito Release Chambers (Flight Rooms)'],
            'release-recapture' => ['title' => 'Release–Recapture Chambers'],
            'community-evaluation' => ['title' => 'Community Evaluation Platforms'],
            'data-it' => ['title' => 'Data Management & IT Platforms'],
        ];
        $data = $pages[$slug] ?? ['title' => ucfirst(str_replace('-', ' ', $slug))];

        // Contenu spécifique éventuel dans resources/views/facilities/{slug}.blade.php
        $viewName = 'facilities.' . $slug;
        if (View::exists($viewName)) {
            $data['content'] = view($viewName)->render();
        }

        return view('static-page', [
            'pageTitle' => $data['title'],
            'pageLead' => $data['lead'] ?? '',
            'pageContent' => $data['content'] ?? null,
            'breadcrumbParent' => ['label' => 'Facilities', 'url' => route('facilitiesLanding')],
        ]);
    }

    /**
     * Serve GLP certificate image only when request comes from our site (Referer check).
     * Direct access to the URL returns 403. Prevents hotlinking and viewing the image in a new tab by copy-paste.
     */
    public function glpCertificateImage()
    {
        $referer = request()->header('Referer');
        $requestHost = request()->getHost();
        $refererHost = $referer ? parse_url($referer, PHP_URL_HOST) : null;
        // Allow only when the request comes from the same site (same host: 127.0.0.1, localhost or airid-africa.com)
        $allowed = $refererHost && strcasecmp($refererHost, $requestHost) === 0;
        if (!$allowed) {
            abort(403, 'Access denied.');
        }
        $path = storage_path('app/glp/Certificats.png');
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->file($path, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'private, no-store',
        ]);
    }

    public function glpFaqDownload()
    {
        $path = storage_path('app/glp/Frequently-Asked-Questions-AIRID.pdf');
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->download($path, 'AIRID-GLP-FAQs.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * GLP Testing Services sub-pages
     */
    public function showGlpPage(string $slug)
    {
        if ($slug === 'who-pq-products-tested-at-airid') {
            return redirect()->route('glpPage', 'who-pq-products-tested-at-our-facility');
        }

        $pages = [
            'why-glp' => ['title' => 'Why GLP', 'lead' => 'Regulatory-grade product evaluation.'],
            'services' => ['title' => 'GLP  Services', 'lead' => 'Regulatory-grade product evaluation for vector control and public health interventions.'],
            'quality-assurance' => ['title' => 'Quality Assurance'],
            'certification-sanas' => ['title' => 'GLP Certification'],
            'organogram' => ['title' => 'GLP Testing Plan'],
            'who-pq-products-tested-at-our-facility' => ['title' => 'WHO PQ Products Tested at our Facility'],
            'clients' => ['title' => 'GLP Clients'],
            'faq' => ['title' => 'Frequently Asked Questions (FAQs) about Good Laboratory Practice at the African Institute for Research in Infectious Diseases (AIRID), Cotonou, Benin'],
        ];
        $data = $pages[$slug] ?? ['title' => ucfirst(str_replace('-', ' ', $slug))];

        // Keep the existing view file while exposing the new public URL slug.
        $viewSlug = $slug === 'who-pq-products-tested-at-our-facility'
            ? 'who-pq-products-tested-at-airid'
            : $slug;

        // Contenu spécifique éventuel dans resources/views/glp/{slug}.blade.php
        $viewName = 'glp.' . $viewSlug;
        if (View::exists($viewName)) {
            $data['content'] = view($viewName)->render();
        }

        return view('static-page', [
            'pageTitle'       => $data['title'],
            'pageLead'        => $data['lead'] ?? '',
            'pageContent'     => $data['content'] ?? null,
            'breadcrumbParent'=> ['label' => 'GLP Testing Services', 'url' => route('glpPage', 'why-glp')],
            'hideBreadcrumb'  => ($slug === 'faq'),
            'hideTitle'       => ($slug === 'faq'),
        ]);
    }

    /**
     * Training & Partnerships sub-pages
     */
    public function showTrainingPage(string $slug)
    {
        // Page with dynamic data — render directly with its own layout
        if ($slug === 'procurements-tenders') {
            $vacancyQuery = AIRID_Vacancies::orderBy('application_deadline', 'desc');
            if (Schema::hasColumn('airid_vacancies', 'active')) {
                $vacancyQuery->where('active', 1);
            }
            $all_vacancies = $vacancyQuery->get();
            return view('training.procurements-tenders', compact('all_vacancies'));
        }

        $pages = [
            'graduate-programmes' => ['title' => 'Graduate Programmes', 'lead' => 'Under development.'],
            'short-courses' => ['title' => 'Short Courses', 'lead' => 'Catalogue & how to apply.'],
            'short-courses-cpd' => ['title' => 'Short Courses & Continuing Professional Development', 'lead' => 'Targeted, applied training for infectious disease control and public health practice.'],
        ];
        $data = $pages[$slug] ?? ['title' => ucfirst(str_replace('-', ' ', $slug))];

        // Contenu spécifique éventuel dans resources/views/training/{slug}.blade.php
        $viewName = 'training.' . $slug;
        if (View::exists($viewName)) {
            $data['content'] = view($viewName)->render();
        }

        return view('static-page', [
            'pageTitle' => $data['title'],
            'pageLead' => $data['lead'] ?? '',
            'pageContent' => $data['content'] ?? null,
            'breadcrumbParent' => ['label' => 'Training & Partnerships', 'url' => route('educationTrainingPage')],
        ]);
    }

    /**
     * Policy pages
     */
    public function showPolicyPage(string $slug)
    {
        $pages = [
            'data-protection' => ['title' => 'Data Protection & Privacy'],
            'safeguarding' => ['title' => 'Safeguarding'],
            'whistleblowing' => ['title' => 'Whistleblowing'],
            'equality-diversity' => ['title' => 'Equality, Diversity & Inclusion'],
            'research-integrity' => ['title' => 'Research Integrity'],
            'copyright' => ['title' => 'Copyright & Disclaimer'],
        ];
        $data = $pages[$slug] ?? ['title' => ucfirst(str_replace('-', ' ', $slug))];

        // Contenu spécifique éventuel dans resources/views/policies/{slug}.blade.php
        $viewName = 'policies.' . $slug;
        if (View::exists($viewName)) {
            $data['content'] = view($viewName)->render();
        }

        return view('static-page', [
            'pageTitle' => $data['title'],
            'pageLead' => $data['lead'] ?? '',
            'pageContent' => $data['content'] ?? null,
            'breadcrumbParent' => ['label' => 'Policies', 'url' => route('index')],
        ]);
    }
}
