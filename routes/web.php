<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,"index"])->name("index");
Route::get("/detail-department/{id}-{slug}",[FrontendController::class,"detailDepartement"])->name("detailDepartementPage");
Route::get("/detail-sub-department/{id}-{slug}",[FrontendController::class,"detailSubDepartement"])->name("detailSubDepartement");
Route::get('/all-departements', [FrontendController::class,"allServicesPage"])->name("allServicesPage");
Route::get('/our-mission', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage");
Route::get('/our-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage");
Route::get('/our-team', [FrontendController::class,"staffAirid"])->name("staffAirid");
Route::get('/about-us', [FrontendController::class,"aboutPage"])->name("aboutPage");
Route::get('/our-projects', [FrontendController::class,"allProjectsPage"])->name("allProjectsPage");
Route::get('/all-projects/detail/{id}-{slug}"', [FrontendController::class,"detailProject"])->name("detailProject");
Route::get('/our-publications', [FrontendController::class,"allPublicationsPage"])->name("allPublicationsPage");
Route::get('/all-publications/{id}-{slug}"', [FrontendController::class,"detailPublication"])->name("detailPublication");
Route::get('/our-videos', [FrontendController::class,"videoPage"])->name("videoPage");
Route::get('/our-photos', [FrontendController::class,"photosPage"])->name("photosPage");
Route::get('/our-photos/detail/{tag}', [FrontendController::class,"photoDetailPage"])->name("photoDetailPage");
Route::get('/our-partners', [FrontendController::class,"partnersPage"])->name("partnersPage");
Route::get('/our-labs', [FrontendController::class,"bioAssayLab"])->name("bioAssayLab");
Route::get('/molecular-lab', [FrontendController::class,"molecularLabPage"])->name("molecularLabPage");
Route::get('/analytical-chemistry-lab', [FrontendController::class,"analyticalCheminstryLabPage"])->name("analyticalCheminstryLabPage");
Route::get('/field-station', [FrontendController::class,"fieldStationPage"])->name("fieldStationPage");
Route::get('/our-insectary', [FrontendController::class,"insectaryPage"])->name("insectaryPage");
Route::get('/our-animal-house', [FrontendController::class,"animalHousePage"])->name("animalHousePage");
Route::get('/our-experimental-huts', [FrontendController::class,"experimentalHutStationPage"])->name("experimentalHutStationPage");
Route::get('/contact', [FrontendController::class,"contactPage"])->name("contactPage");
Route::post('/post-contact', [FrontendController::class,"postContactMessage"])->name("postContactMessage");
Route::get('/crec-lshtm-project', [FrontendController::class,"pageCRECLSHTM"])->name("pageCRECLSHTM");
Route::get('/vacancies-at-airid', [FrontendController::class,"vacanciesPage"])->name("vacanciesPage");
