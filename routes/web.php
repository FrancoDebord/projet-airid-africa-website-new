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
