<?php

namespace App\Http\Controllers;

use App\Models\AIRID_Departement;
use App\Models\AIRID_Personnel;
use App\Models\AIRID_Project;
use App\Models\AIRID_ProjetCategory;
use App\Models\AIRID_Sub_Departement;
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

        return view("vision-mission");
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
}
