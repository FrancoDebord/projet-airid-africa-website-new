<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,"index"])->name("index");
Route::get("/detail-department/{id}-{slug}",[FrontendController::class,"detailDepartement"])->name("detailDepartementPage");
Route::get("/detail-sub-department/{id}-{slug}",[FrontendController::class,"detailSubDepartement"])->name("detailSubDepartement");
Route::get('/all-departements', [FrontendController::class,"allServicesPage"])->name("allServicesPage");
Route::get('/our-mission', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage");
Route::get('/our-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage1");
Route::get('/mission-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage2");
Route::get('/our-team', [FrontendController::class,"staffAirid"])->name("staffAirid");
Route::get('/detail-staff/{id}-{slug}', [FrontendController::class,"detailStaffAirid"])->name("detail-staff");
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
Route::get('/mosquito-plasmodium-laboratory', [FrontendController::class,"mosquitoPlasmodiumLaboratoryPage"])->name("mosquitoPlasmodiumLaboratoryPage");
Route::get('/contact', [FrontendController::class,"contactPage"])->name("contactPage");
Route::post('/post-contact', [FrontendController::class,"postContactMessage"])->name("postContactMessage");
Route::get('/crec-lshtm-project', [FrontendController::class,"pageCRECLSHTM"])->name("pageCRECLSHTM");


Route::get('/vacancies-at-airid', [FrontendController::class,"vacanciesPage"])->name("vacanciesPage");
Route::get('/vacancies-chimiste-analytique', [FrontendController::class,"vacanciesChimisteAnalytiquePage"])->name("vacanciesChimisteAnalytiquePage");
Route::get('/vacancies-agents-terrain-gavi', [FrontendController::class,"vacanciesAgentTerrainGavi"])->name("vacanciesAgentTerrainGavi");


Route::get('/directors-message', [FrontendController::class,"motDirecteur"])->name("motDirecteur");
Route::get('/board-directors-message', [FrontendController::class,"motBoardOfDirectors"])->name("motBoardOfDirectors");
Route::get('/research-activities', [FrontendController::class,"researchActivitiesPage"])->name("researchActivitiesPage");
Route::get('/education-training', [FrontendController::class,"educationTrainingPage"])->name("educationTrainingPage");
Route::get('/gavi-siri-project', [FrontendController::class,"projetGaviSiriPage"])->name("projetGaviSiriPage");
Route::get('/optimvec-project', [FrontendController::class,"projetOptimvecPage"])->name("projetOptimvecPage");
Route::get('/duranet-project', [FrontendController::class,"projetDuranetPage"])->name("projetDuranetPage");
Route::get('/atsb-project', [FrontendController::class,"projetATSBPage"])->name("projetATSBPage");
Route::get('/vesterguaard-itn-testing-project', [FrontendController::class,"projetVesterguaardITNPage"])->name("projetVesterguaardITNPage");
Route::get('/spatial-repellents-project', [FrontendController::class,"projetSpatialRepellentsPage"])->name("projetSpatialRepellentsPage");
Route::get('/interceptor-product-development', [FrontendController::class,"interceptorProductDevelopmentPage"])->name("interceptorProductDevelopmentPage");
Route::get('/duranet-product-development', [FrontendController::class,"duranetProductDevelopmentPage"])->name("duranetProductDevelopmentPage");
Route::get('/yorkool-product-development', [FrontendController::class,"yorkoolProductDevelopmentPage"])->name("yorkoolProductDevelopmentPage");
Route::get('/health-pulse-product-development', [FrontendController::class,"healthPulseProductDevelopmentPage"])->name("healthPulseProductDevelopmentPage");
Route::get('/yorkool-g4-product-development', [FrontendController::class,"yorkoolG4ProductDevelopmentPage"])->name("yorkoolG4ProductDevelopmentPage");
Route::get('/pamverc-benin', [FrontendController::class,"pamvercBeninPage"])->name("pamvercBeninPage");
Route::get('/newsletter-airid', [FrontendController::class,"newsletterPage"])->name("newsletterPage");
Route::post('/add-email-to-newsletter-airid-list', [FrontendController::class,"subscribeNewsLetter"])->name("subscribeNewsLetter");

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Staff routes
        Route::get('/staff', [AdminController::class, 'staffIndex'])->name('staff.index');
        Route::get('/staff/create', [AdminController::class, 'staffCreate'])->name('staff.create');
        Route::post('/staff', [AdminController::class, 'staffStore'])->name('staff.store');
        Route::get('/staff/{id}/edit', [AdminController::class, 'staffEdit'])->name('staff.edit');
        Route::put('/staff/{id}', [AdminController::class, 'staffUpdate'])->name('staff.update');
        Route::delete('/staff/{id}', [AdminController::class, 'staffDestroy'])->name('staff.destroy');

        // Publications routes
        Route::get('/publications', [AdminController::class, 'publicationsIndex'])->name('publications.index');
        Route::get('/publications/create', [AdminController::class, 'publicationsCreate'])->name('publications.create');
        Route::post('/publications', [AdminController::class, 'publicationsStore'])->name('publications.store');
        Route::get('/publications/{id}/edit', [AdminController::class, 'publicationsEdit'])->name('publications.edit');
        Route::put('/publications/{id}', [AdminController::class, 'publicationsUpdate'])->name('publications.update');
        Route::delete('/publications/{id}', [AdminController::class, 'publicationsDestroy'])->name('publications.destroy');

        // Vacancies routes
        Route::get('/vacancies', [AdminController::class, 'vacanciesIndex'])->name('vacancies.index');
        Route::get('/vacancies/create', [AdminController::class, 'vacanciesCreate'])->name('vacancies.create');
        Route::post('/vacancies', [AdminController::class, 'vacanciesStore'])->name('vacancies.store');
        Route::get('/vacancies/{id}/edit', [AdminController::class, 'vacanciesEdit'])->name('vacancies.edit');
        Route::put('/vacancies/{id}', [AdminController::class, 'vacanciesUpdate'])->name('vacancies.update');
        Route::delete('/vacancies/{id}', [AdminController::class, 'vacanciesDestroy'])->name('vacancies.destroy');
    });
});
