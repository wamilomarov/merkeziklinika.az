<?php

use Illuminate\Routing\Router;

\Illuminate\Support\Facades\App::setLocale('az');

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('branches', BranchController::class);
    $router->resource('carousel', CarouselItemController::class);
    $router->resource('departments', DepartmentController::class);
    $router->resource('services', ServiceController::class);
    $router->resource('settings', SettingsController::class);
    $router->resource('positions', PositionController::class);
    $router->resource('majors', MajorController::class);
    $router->resource('languages', LanguageController::class);
    $router->resource('subscribers', SubscriberController::class);
    $router->resource('news', NewsController::class);
    $router->resource('doctors', DoctorController::class);
    $router->resource('directors', DirectorController::class);
    $router->resource('pages', PageController::class);
    $router->resource('social_news', SocialNewsController::class);
    $router->resource('vacancies', VacancyController::class);
    $router->resource('resumes', ResumeController::class);
    $router->resource('document_forms', DocumentFormController::class);
    $router->resource('partners', PartnerController::class);
    $router->resource('photo_gallery', PhotoGalleryController::class);
    $router->resource('video_gallery', VideoGalleryController::class);
    $router->resource('appointments', AppointmentController::class);
    $router->resource('wishes', WishController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('survey_results', SurveyResultController::class);
    $router->resource('medical_devices', MedicalDeviceCategoryController::class);
    $router->resource('patient_rights', PatientRightController::class);
    $router->resource('educational_materials', EducationalMaterialController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('medical_articles', MedicalArticleController::class);
    $router->resource('campaigns', CampaignController::class);
    $router->resource('contact_form_messages', ContactFormMessageController::class);
    $router->resource('files', FileController::class);

});
