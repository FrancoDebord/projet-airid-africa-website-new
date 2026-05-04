<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,"index"])->name("index");
Route::get('/all-departements', [FrontendController::class,"allServicesPage"])->name("allServicesPage");
Route::get('/our-mission', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage");
Route::get('/our-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage1");
Route::get('/mission-vision', [FrontendController::class,"MissionVisionPage"])->name("MissionVisionPage2");
Route::get('/our-team', [FrontendController::class,"staffAirid"])->name("staffAirid");
Route::get('/detail-staff/{id}-{slug}', [FrontendController::class,"detailStaffAirid"])->name("detail-staff");
Route::get('/about-us', [FrontendController::class,"aboutPage"])->name("aboutPage");
Route::get('/our-projects', [FrontendController::class,"allProjectsPage"])->name("allProjectsPage");
Route::get('/all-projects/detail/{id}-{slug}', [FrontendController::class,"detailProject"])->name("detailProject");
Route::get('/our-publications', [FrontendController::class,"allPublicationsPage"])->name("allPublicationsPage");
Route::get('/all-publications/{id}-{slug}', [FrontendController::class,"detailPublication"])->name("detailPublication");
Route::get('/our-videos', [FrontendController::class,"videoPage"])->name("videoPage");
Route::get('/our-photos', [FrontendController::class,"photosPage"])->name("photosPage");
Route::get('/our-photos/detail/{tag}', [FrontendController::class,"photoDetailPage"])->name("photoDetailPage");
Route::get('/our-partners', [FrontendController::class,"partnersPage"])->name("partnersPage");
Route::get('/our-labs', [FrontendController::class,"bioAssayLab"])->name("bioAssayLab");
Route::get('/molecular-lab', [FrontendController::class,"molecularLabPage"])->name("molecularLabPage");
Route::get('/analytical-chemistry-lab', [FrontendController::class,"analyticalCheminstryLabPage"])->name("analyticalCheminstryLabPage");
Route::get('/field-research-platforms', [FrontendController::class, 'fieldResearchPlatformsLanding'])->name('fieldResearchPlatformsLanding');
Route::get('/field-station', [FrontendController::class,"fieldStationPage"])->name("fieldStationPage");
Route::get('/field-station-lab', [FrontendController::class, 'fieldStationLabPage'])->name('fieldStationLabPage');
Route::get('/our-insectary', [FrontendController::class,"insectaryPage"])->name("insectaryPage");
Route::get('/our-animal-house', [FrontendController::class,"animalHousePage"])->name("animalHousePage");
Route::get('/our-experimental-huts', [FrontendController::class,"experimentalHutStationPage"])->name("experimentalHutStationPage");
Route::get('/mosquito-plasmodium-laboratory', [FrontendController::class,"mosquitoPlasmodiumLaboratoryPage"])->name("mosquitoPlasmodiumLaboratoryPage");
Route::get('/contact', [FrontendController::class,"contactPage"])->name("contactPage");
Route::post('/post-contact', [FrontendController::class,"postContactMessage"])->name("postContactMessage");
Route::get('/get-involved', [FrontendController::class,"getInvolvedPage"])->name("getInvolvedPage");
Route::get('/philanthropy', [FrontendController::class,"philanthropyPage"])->name("philanthropyPage");
Route::get('/philanthropy/hardship-fund/apply', fn () => redirect()->route('philanthropy.apply.form', ['slug' => 'hardship-fund-women-stem'], 301))->name("hardshipFund.apply");
Route::post('/philanthropy/hardship-fund/apply', function (Illuminate\Http\Request $r) {
    return app(FrontendController::class)->philanthropyApplyStore($r, 'hardship-fund-women-stem');
})->name("hardshipFund.apply.store");
Route::get('/philanthropy/{slug}/apply', [FrontendController::class,"philanthropyApplyForm"])->name("philanthropy.apply.form")->where('slug', '[a-z0-9\-]+');
Route::post('/philanthropy/{slug}/apply', [FrontendController::class,"philanthropyApplyStore"])->name("philanthropy.apply.store")->where('slug', '[a-z0-9\-]+');
Route::get('/philanthropy/{slug}', [FrontendController::class,"philanthropyDetail"])->name("philanthropyDetail")->where('slug', '[a-z0-9\-]+');
Route::get('/crec-lshtm-project', [FrontendController::class,"pageCRECLSHTM"])->name("pageCRECLSHTM");


Route::get('/vacancies-at-airid', [FrontendController::class,"vacanciesPage"])->name("vacanciesPage");
Route::get('/vacancies-at-airid/{id}-{slug}', [FrontendController::class,"vacancyDetail"])->name("vacancyDetail")->where(['id' => '[0-9]+', 'slug' => '[a-z0-9\-]+']);
Route::get('/vacancies-at-airid/{id}/document/{lang}', [FrontendController::class, 'vacancyDocument'])->name('vacancy.document')->where(['id' => '[0-9]+', 'lang' => 'fr|en']);
Route::get('/vacancies-chimiste-analytique', [FrontendController::class,"vacanciesChimisteAnalytiquePage"])->name("vacanciesChimisteAnalytiquePage");
Route::get('/vacancies-agents-terrain-gavi', [FrontendController::class,"vacanciesAgentTerrainGavi"])->name("vacanciesAgentTerrainGavi");


Route::get('/directors-message', [FrontendController::class,"motDirecteur"])->name("motDirecteur");
Route::get('/board-directors-message', [FrontendController::class,"motBoardOfDirectors"])->name("motBoardOfDirectors");
Route::get('/research-activities', [FrontendController::class,"researchActivitiesPage"])->name("researchActivitiesPage");
Route::get('/research-policy-practice', [FrontendController::class,"researchPolicyPracticePage"])->name("researchPolicyPracticePage");
Route::get('/research-centre-policy-practice', [FrontendController::class,"researchCentrePolicyPracticePage"])->name("researchCentrePolicyPracticePage");
Route::get('/research-centre-vector-biology', [FrontendController::class,"researchCentreVectorBiologyPage"])->name("researchCentreVectorBiologyPage");
Route::get('/research-centre-data-science', [FrontendController::class,"researchCentreDataSciencePage"])->name("researchCentreDataSciencePage");
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
Route::get('/news', [FrontendController::class,"newsPage"])->name("newsPage");
Route::get('/news/{id}-{slug}', [FrontendController::class, 'newsDetail'])->name('news-detail')->where(['id' => '[0-9]+', 'slug' => '[a-z0-9\-]+']);
Route::get('/blog/{id}-{slug}', [FrontendController::class, 'blogDetail'])->name('blog-detail')->where(['id' => '[0-9]+', 'slug' => '[a-z0-9\-]+']);

// About sub-pages (Vision, History, Strategy, Governance, Code of Conduct, etc.)
Route::get('/about/{slug}', [FrontendController::class, 'showAboutPage'])->name('pageAbout')->where('slug', '[a-z0-9\-]+');

// Code of Conduct PDF download (served from disk, no storage symlink needed)
Route::get('/documents/code-of-conduct', [FrontendController::class, 'downloadCodeOfConduct'])->name('codeOfConduct.download');

// Facilities landing & sub-pages
Route::get('/facilities', [FrontendController::class, 'facilitiesLanding'])->name('facilitiesLanding');
Route::get('/facilities/{slug}', [FrontendController::class, 'showFacilityPage'])->name('pageFacility')->where('slug', '[a-z0-9\-]+');

// GLP Testing Services (certificate image: served only with Referer from our site)
Route::get('/glp/certificate-image', [FrontendController::class, 'glpCertificateImage'])->name('glp.certificate.image');
Route::get('/glp/faq-download', [FrontendController::class, 'glpFaqDownload'])->name('glp.faq.download');
Route::get('/glp/{slug}', [FrontendController::class, 'showGlpPage'])->name('glpPage')->where('slug', '[a-z0-9\-]+');

// Training & Partnerships sub-pages
Route::get('/training/{slug}', [FrontendController::class, 'showTrainingPage'])->name('pageTraining')->where('slug', '[a-z0-9\-]+');

// Policies
Route::get('/policies/{slug}', [FrontendController::class, 'showPolicyPage'])->name('policyPage')->where('slug', '[a-z0-9\-]+');

Route::get('/conflict-access', [FrontendController::class, 'showConflictAccessForm'])->name('conflict.access.form');
Route::post('/conflict-access', [FrontendController::class, 'submitConflictAccess'])->name('conflict.access.submit');
Route::view('/conflict', 'conflict_finterest')->name('conflictOfInterest')->middleware(\App\Http\Middleware\ConflictAccess::class);
Route::post('/conflict', [FrontendController::class, 'storeConflict'])->name('conflict.store')->middleware(\App\Http\Middleware\ConflictAccess::class);
Route::get('/conflict/change-access-code', [FrontendController::class, 'showConflictChangeAccessCodeForm'])->name('conflict.change.access.code')->middleware(\App\Http\Middleware\ConflictAccess::class);
Route::post('/conflict/change-access-code', [FrontendController::class, 'updateConflictAccessCode'])->name('conflict.change.access.code.update')->middleware(\App\Http\Middleware\ConflictAccess::class);

// My AIRID – portail personnel (tous les sites / logiciels AIRID)
Route::get('/my-airid', [FrontendController::class, 'myAiridPortal'])->name('myAiridPortal');

// Staff Platforms Portal
Route::get('/staff-platforms', [FrontendController::class, 'staffPlatformsAuth'])->name('staffPlatforms.auth');
Route::post('/staff-platforms/check', [FrontendController::class, 'staffPlatformsCheck'])->name('staffPlatforms.check');
Route::get('/staff-platforms/access', [FrontendController::class, 'staffPlatformsAccess'])->name('staffPlatforms.access');
Route::post('/staff-platforms/logout', [FrontendController::class, 'staffPlatformsLogout'])->name('staffPlatforms.logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Statistiques visiteurs (analytics)
        Route::get('/analytics', [AdminController::class, 'analyticsIndex'])->name('analytics.index');
        Route::get('/analytics/export-pdf', [AdminController::class, 'analyticsExportPdf'])->name('analytics.export-pdf');

        // Staff routes
        Route::get('/staff', [AdminController::class, 'staffIndex'])->name('staff.index');
        Route::get('/staff/create', [AdminController::class, 'staffCreate'])->name('staff.create');
        Route::post('/staff', [AdminController::class, 'staffStore'])->name('staff.store');
        Route::get('/staff/{id}', [AdminController::class, 'staffShow'])->name('staff.show');
        Route::get('/staff/{id}/edit', [AdminController::class, 'staffEdit'])->name('staff.edit');
        Route::put('/staff/{id}', [AdminController::class, 'staffUpdate'])->name('staff.update');
        Route::delete('/staff/{id}', [AdminController::class, 'staffDestroy'])->name('staff.destroy');

        // Publications routes
        Route::get('/publications', [AdminController::class, 'publicationsIndex'])->name('publications.index');
        Route::get('/publications/create', [AdminController::class, 'publicationsCreate'])->name('publications.create');
        Route::post('/publications', [AdminController::class, 'publicationsStore'])->name('publications.store');
        Route::get('/publications/{id}', [AdminController::class, 'publicationsShow'])->name('publications.show');
        Route::get('/publications/{id}/edit', [AdminController::class, 'publicationsEdit'])->name('publications.edit');
        Route::put('/publications/{id}', [AdminController::class, 'publicationsUpdate'])->name('publications.update');
        Route::delete('/publications/{id}', [AdminController::class, 'publicationsDestroy'])->name('publications.destroy');

        // Vacancies routes
        Route::get('/vacancies', [AdminController::class, 'vacanciesIndex'])->name('vacancies.index');
        Route::get('/vacancies/create', [AdminController::class, 'vacanciesCreate'])->name('vacancies.create');
        Route::post('/vacancies', [AdminController::class, 'vacanciesStore'])->name('vacancies.store');
        Route::get('/vacancies/{id}', [AdminController::class, 'vacanciesShow'])->name('vacancies.show');
        Route::get('/vacancies/{id}/edit', [AdminController::class, 'vacanciesEdit'])->name('vacancies.edit');
        Route::put('/vacancies/{id}', [AdminController::class, 'vacanciesUpdate'])->name('vacancies.update');
        Route::delete('/vacancies/{id}', [AdminController::class, 'vacanciesDestroy'])->name('vacancies.destroy');

        // Partners routes
        Route::get('/partners', [AdminController::class, 'partnersIndex'])->name('partners.index');
        Route::get('/partners/create', [AdminController::class, 'partnersCreate'])->name('partners.create');
        Route::post('/partners', [AdminController::class, 'partnersStore'])->name('partners.store');
        Route::get('/partners/{id}', [AdminController::class, 'partnersShow'])->name('partners.show');
        Route::get('/partners/{id}/edit', [AdminController::class, 'partnersEdit'])->name('partners.edit');
        Route::put('/partners/{id}', [AdminController::class, 'partnersUpdate'])->name('partners.update');
        Route::delete('/partners/{id}', [AdminController::class, 'partnersDestroy'])->name('partners.destroy');

        // Projects routes
        Route::get('/projects', [AdminController::class, 'projectsIndex'])->name('projects.index');
        Route::get('/projects/create', [AdminController::class, 'projectsCreate'])->name('projects.create');
        Route::post('/projects', [AdminController::class, 'projectsStore'])->name('projects.store');
        Route::get('/projects/{id}', [AdminController::class, 'projectsShow'])->name('projects.show');
        Route::get('/projects/{id}/edit', [AdminController::class, 'projectsEdit'])->name('projects.edit');
        Route::put('/projects/{id}', [AdminController::class, 'projectsUpdate'])->name('projects.update');
        Route::delete('/projects/{id}', [AdminController::class, 'projectsDestroy'])->name('projects.destroy');

        // News routes
        Route::get('/news', [AdminController::class, 'newsIndex'])->name('news.index');
        Route::get('/news/create', [AdminController::class, 'newsCreate'])->name('news.create');
        Route::post('/news', [AdminController::class, 'newsStore'])->name('news.store');
        Route::get('/news/{id}', [AdminController::class, 'newsShow'])->name('news.show');
        Route::get('/news/{id}/edit', [AdminController::class, 'newsEdit'])->name('news.edit');
        Route::put('/news/{id}', [AdminController::class, 'newsUpdate'])->name('news.update');
        Route::delete('/news/{id}', [AdminController::class, 'newsDestroy'])->name('news.destroy');

        // Blogs routes
        Route::get('/blogs', [AdminController::class, 'blogsIndex'])->name('blogs.index');
        Route::get('/blogs/create', [AdminController::class, 'blogsCreate'])->name('blogs.create');
        Route::post('/blogs', [AdminController::class, 'blogsStore'])->name('blogs.store');
        Route::get('/blogs/{id}', [AdminController::class, 'blogsShow'])->name('blogs.show');
        Route::get('/blogs/{id}/edit', [AdminController::class, 'blogsEdit'])->name('blogs.edit');
        Route::put('/blogs/{id}', [AdminController::class, 'blogsUpdate'])->name('blogs.update');
        Route::delete('/blogs/{id}', [AdminController::class, 'blogsDestroy'])->name('blogs.destroy');

        // Philanthropy content (pages shown on /philanthropy)
        Route::get('/philanthropy', [AdminController::class, 'philanthropyIndex'])->name('philanthropy.index');
        Route::get('/philanthropy/create', [AdminController::class, 'philanthropyCreate'])->name('philanthropy.create');
        Route::post('/philanthropy', [AdminController::class, 'philanthropyStore'])->name('philanthropy.store');
        Route::get('/philanthropy/{id}', [AdminController::class, 'philanthropyShow'])->name('philanthropy.show');
        Route::get('/philanthropy/{id}/edit', [AdminController::class, 'philanthropyEdit'])->name('philanthropy.edit');
        Route::put('/philanthropy/{id}', [AdminController::class, 'philanthropyUpdate'])->name('philanthropy.update');
        Route::delete('/philanthropy/{id}', [AdminController::class, 'philanthropyDestroy'])->name('philanthropy.destroy');

        // Hardship Fund (Women in STEM) applications
        Route::get('/hardship-fund', [AdminController::class, 'hardshipFundIndex'])->name('hardship-fund.index');
        Route::get('/hardship-fund/export/excel', [AdminController::class, 'hardshipFundExportExcel'])->name('hardship-fund.export.excel');
        Route::get('/hardship-fund/export/pdf', [AdminController::class, 'hardshipFundExportPdf'])->name('hardship-fund.export.pdf');
        Route::get('/hardship-fund/{id}', [AdminController::class, 'hardshipFundShow'])->name('hardship-fund.show');
        Route::get('/hardship-fund/{id}/edit', [AdminController::class, 'hardshipFundEdit'])->name('hardship-fund.edit');
        Route::put('/hardship-fund/{id}', [AdminController::class, 'hardshipFundUpdate'])->name('hardship-fund.update');
        Route::delete('/hardship-fund/{id}', [AdminController::class, 'hardshipFundDestroy'])->name('hardship-fund.destroy');

        // Conflict of Interest Register + change password (COI user only)
        Route::middleware(\App\Http\Middleware\ConflictRegisterAccess::class)->group(function () {
            Route::get('/conflicts', [AdminController::class, 'conflictIndex'])->name('conflicts.index');
            Route::get('/conflicts/export/pdf', [AdminController::class, 'conflictExportPdf'])->name('conflicts.export.pdf');
            Route::get('/conflicts/access-code/form', [AdminController::class, 'showConflictAccessCodeForm'])->name('conflicts.access-code.form');
            Route::post('/conflicts/access-code', [AdminController::class, 'updateConflictAccessCode'])->name('conflicts.access-code.update');
            Route::get('/conflicts/{conflict}', [AdminController::class, 'conflictShow'])->name('conflicts.show');
            Route::patch('/conflicts/{conflict}', [AdminController::class, 'conflictUpdate'])->name('conflicts.update');
            Route::get('/profile/password', [AdminController::class, 'showChangePasswordForm'])->name('password.form');
            Route::post('/profile/password', [AdminController::class, 'updatePassword'])->name('password.update');
        });
    });
});
