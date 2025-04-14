<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,"index"])->name("index");
Route::get("/detail-department/{id}-{slug}",[FrontendController::class,"detailDepartement"])->name("detailDepartementPage");
Route::get("/detail-sub-department/{id}-{slug}",[FrontendController::class,"detailSubDepartement"])->name("detailSubDepartement");
Route::get('/all-departements', [FrontendController::class,"allServicesPage"])->name("allServicesPage");
Route::get('/mission-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage");
Route::get('/staff', [FrontendController::class,"staffAirid"])->name("staffAirid");
Route::get('/about-us', [FrontendController::class,"aboutPage"])->name("aboutPage");
Route::get('/all-projects', [FrontendController::class,"allProjectsPage"])->name("allProjectsPage");
Route::get('/all-projects/detail/{id}-{slug}"', [FrontendController::class,"detailProject"])->name("detailProject");
