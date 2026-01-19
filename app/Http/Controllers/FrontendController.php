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
use App\Models\AIRID_Sub_Departement;
use App\Models\AIRID_Vacancies;
use App\Models\AIRID_Video;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

        return view("accueil", compact("all_recents_projects", "all_projects_categories", "all_partenaires", "all_news", "recent_vacancy", "recent_publication"));
    }

    /**
     * 
     */
    function detailDepartement($id_departement, $slug, Request $request)
    {

        try {

            $departement = AIRID_Departement::findOrFail($id_departement);
            $others_departements = AIRID_Departement::where("afficher_menu", "<>", 0)
                ->where("id", "<>", $id_departement)
                ->get();

            return view("departements", compact("departement", "others_departements"));
        } catch (\Throwable $th) {
        }
    }

    function detailSubDepartement($id_sub_departement, $slug, Request $request)
    {

        try {

            $sub_departement = AIRID_Sub_Departement::findOrFail($id_sub_departement);
            $others_sub_departements = AIRID_Sub_Departement::where("id", "<>", $id_sub_departement)
                ->where("departement_id", $sub_departement->departement_id)
                ->get();

            return view("sub-departements", compact("sub_departement", "others_sub_departements"));
        } catch (\Throwable $th) {
        }
    }


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

    function staffAirid()
    {

        $executive_director = AIRID_Personnel::where("niveau_poste", 1)
            ->orderBy("poids_personnel", "desc")
            ->get();
        $other_staffs = AIRID_Personnel::where("niveau_poste", "<>", 1)
            ->orderBy("poids_personnel", "desc")
            ->get();

        return view("staff", compact("executive_director", "other_staffs"));
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
    function fieldStationPage(Request $request)
    {

        return view("filed-station-page");
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

        $all_vacancies = AIRID_Vacancies::orderBy("application_deadline", "desc")->get();

        return view("vacancies", compact("all_vacancies"));
    }

    function newsPage(Request $request)
    {
        $all_projects = AIRID_Project::orderBy("date_debut_project", "desc")->get();
        
        // Vérifier si la colonne 'active' existe avant de l'utiliser
        $vacancyQuery = AIRID_Vacancies::orderBy("application_deadline", "desc");
        if (Schema::hasColumn('airid_vacancies', 'active')) {
            $vacancyQuery->where("active", 1);
        }
        $all_vacancies = $vacancyQuery->get();
        
        $all_publications = AIRID_Publication::orderBy("annee_publication", "desc")->get();
        $all_videos = AIRID_Video::orderBy("date_video", "desc")->get();
        $all_photos = AIRID_Photo::orderBy("date_event", "desc")->get();
        $all_news = AIRID_News::orderBy("created_at", "desc")->get();
        $all_blogs = AIRID_Blog::orderBy("created_at", "desc")->get();

        return view("news", compact("all_projects", "all_vacancies", "all_publications", "all_videos", "all_photos", "all_news", "all_blogs"));
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
}
