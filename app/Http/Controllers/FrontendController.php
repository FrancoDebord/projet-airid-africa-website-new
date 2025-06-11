<?php

namespace App\Http\Controllers;

use App\Models\AIRID_Contact;
use App\Models\AIRID_Departement;
use App\Models\AIRID_Personnel;
use App\Models\AIRID_Photo;
use App\Models\AIRID_Project;
use App\Models\AIRID_ProjetCategory;
use App\Models\AIRID_Publication;
use App\Models\AIRID_Sub_Departement;
use App\Models\AIRID_Video;
use App\Models\Departement;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    function __construct() {}


    function index()
    {

        $all_recents_projects = AIRID_Project::orderBy("date_debut_project", "desc")->get();
        $all_projects_categories = AIRID_ProjetCategory::all();

        return view("accueil", compact("all_recents_projects", "all_projects_categories"));
    }

    /**
     * 
     */
    function detailDepartement($id_departement, $slug, Request $request)
    {

        try {

            $departement = AIRID_Departement::findOrFail($id_departement);
            $others_departements = AIRID_Departement::where("id", "<>", $id_departement)->get();

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

            $all_departements = AIRID_Departement::all();

            return view("all-departements", compact("all_departements"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function MissionVisionPage()
    {

        $all_departements = AIRID_Departement::all();
        return view("vision-mission",compact("all_departements"));
    }

    function staffAirid()
    {

        $executive_director = AIRID_Personnel::where("niveau_poste", 1)->get();
        $other_staffs = AIRID_Personnel::where("niveau_poste", "<>", 1)->get();

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

    function aboutPage(){

        $all_departements = AIRID_Departement::all();

        return view("about",compact("all_departements"));
    }

    function allProjectsPage(){

        $all_projects = AIRID_Project::all();

        return view("all-projects",compact("all_projects"));
    }

    function detailProject($id, $slug, Request $request)
    {

        try {

            $projet = AIRID_Project::findOrFail($id);
            $others_projects = AIRID_Project::where("id","<>",$id)->get();

            return view("project-detail", compact("projet","others_projects"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function allPublicationsPage(){

        $all_publications = AIRID_Publication::orderBy("date_publication","desc")->simplePaginate(6);
        return view("all-publications",compact("all_publications"));
    }

    function detailPublication($id, $slug, Request $request){

        try {

            $publication = AIRID_Publication::findOrFail($id);

            $others_publications = AIRID_Publication::where("id","<>",$id)
            ->orderBy("date_publication","desc")
            ->simplePaginate(10);

        return view("detail-publication",compact("publication","others_publications"));
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    function videoPage(Request $request){

        $all_videos = AIRID_Video::orderBy("date_video","desc")->get();

     

        return view("videos",compact("all_videos"));
    }

    function photosPage(Request $request){

        $all_photos = AIRID_Photo::orderBy("date_event","desc")->get();
        $all_photos_categories = AIRID_Photo::select("categorie_photo")->distinct()->get();

        return view("photos",compact("all_photos","all_photos_categories"));
    }


    function photoDetailPage($tag, Request $request){

        $all_photos = AIRID_Photo::orderBy("date_event","desc")
        ->where("tag",$tag)
        ->get();

        return view("detail-photo",compact("all_photos"));
    }

    function partnersPage(Request $request){

        return view("partenaires-page");
    }


    function bioAssayLab(Request $request){

        return view("bioassay-lab-page");
    }
    function molecularLabPage(Request $request){

        return view("molecular-lab-page");
    }

    function analyticalCheminstryLabPage(Request $request){

        return view("analytical-chemistry-lab-page");
    }
    function fieldStationPage(Request $request){

        return view("filed-station-page");
    }
    function insectaryPage(Request $request){

        return view("insectary-page");
    }
    function animalHousePage(Request $request){

        return view("animal-house-page");
    }

    function experimentalHutStationPage(Request $request){

        return view("experimental-hut-station-page");
    }
    function contactPage(Request $request){

        return view("contact");
    }

    function postContactMessage(Request $request){

        $rules = [
            "full_name"=>"required",
            "adresse_mail"=>"required|email",
            "subject"=>"required",
            "detailed_message"=>"required",
        ];

        $request->validate($rules);

        $create = AIRID_Contact::create($request->all());

        return redirect()->route("contactPage")->with("message","Contact message successfully sent. We'll get back to you via your mail address.");
    }
}
