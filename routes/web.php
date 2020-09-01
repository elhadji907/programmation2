<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    });

/* Auth::routes(); */
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
    ], function()
    { 
        Route::get('/recues.selectdirection', function() { return view('recues.selectdirection'); })->name('recues.selectdirection');
        Route::get('/directions.selectresponsable', function() { return view('directions.selectresponsable'); })->name('directions.selectresponsable');
        Route::get('/services.selectresponsable', function() { return view('services.selectresponsable'); })->name('services.selectresponsable');
        Route::get('/internes.selectdirection', function() { return view('internes.selectdirection'); })->name('internes.selectdirection');
        Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles.show');
        Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
        Route::patch('/profiles/{user}', 'ProfilesController@update')->name('profiles.update');
        Route::get('/administrateurs/list', 'AdministrateursController@list')->name('administrateurs.list');
        Route::get('/personnels/list', 'PersonnelsController@list')->name('personnels.list');
        Route::get('/gestionnaires/list', 'GestionnairesController@list')->name('gestionnaires.list');
        Route::get('/directions/list', 'DirectionsController@list')->name('directions.list');
        Route::get('/services/list', 'ServicesController@list')->name('services.list');
        Route::get('/demandeurs/list', 'DemandeursController@list')->name('demandeurs.list');
        Route::get('/beneficiaires/list', 'BeneficiairesController@list')->name('beneficiaires.list');
        Route::get('/domaines/list', 'DomainesController@list')->name('domaines.list');
        Route::get('/diplomes/list', 'DiplomesController@list')->name('diplomes.list');
        Route::get('/modules/list', 'ModulesController@list')->name('modules.list');
        Route::get('/secteurs/list', 'SecteursController@list')->name('secteurs.list');
        Route::get('/options/list', 'OptionsController@list')->name('options.list');
        Route::get('/villages/list', 'VillagesController@list')->name('villages.list');
        Route::get('/operateurs/list', 'OperateursController@list')->name('operateurs.list');
        Route::get('/programmes/list', 'ProgrammesController@list')->name('programmes.list');


        Route::get('/courriers/list', 'CourriersController@list')->name('courriers.list');
        Route::get('/presentations/list', 'PresentationsController@list')->name('presentations.list');
        Route::get('/recues/list', 'RecuesController@list')->name('recues.list');
        Route::get('/departs/list', 'DepartsController@list')->name('departs.list');
        Route::get('/internes/list', 'InternesController@list')->name('internes.list');

        Route::get('postes/create', 'PostesController@create')->name('postes.create');
        Route::post('postes', 'PostesController@store')->name('postes.store');
        Route::get('postes/{poste}', 'PostesController@show')->name('postes.show');
        Route::get('showFromNotification/{courrier}/{notification}', 'CourriersController@showFromNotification')->name('courriers.showFromNotification');

        Route::post('comments/{courrier}', 'CommentsController@store')->name('comments.store');
        Route::post('commentReply/{comment}', 'CommentsController@storeCommentReply')->name('comments.storeReply');


        Route::resource('/administrateurs', 'AdministrateursController');
        Route::resource('/personnels', 'PersonnelsController');
        Route::resource('/gestionnaires', 'GestionnairesController');
        Route::resource('/courriers', 'CourriersController');
        Route::resource('/presentations', 'PresentationsController');
        Route::resource('/recues', 'RecuesController');
        Route::resource('/departs', 'DepartsController');
        Route::resource('/internes', 'InternesController');
        Route::resource('/directions', 'DirectionsController');
        Route::resource('/services', 'ServicesController');
        Route::resource('/demandeurs', 'DemandeursController');
        Route::resource('/beneficiaires', 'BeneficiairesController');
        Route::resource('/domaines', 'DomainesController');
        Route::resource('/diplomes', 'DiplomesController');
        Route::resource('/modules', 'ModulesController');
        Route::resource('/secteurs', 'SecteursController');
        Route::resource('/options', 'OptionsController');
        Route::resource('/villages', 'VillagesController');
        Route::resource('/operateurs', 'OperateursController');
        Route::resource('/programmes', 'ProgrammesController');

    }         
);

//gestion des roles par niveau d'autorisation
Route::get('loginfor/{rolename?}',function($rolename=null){
if(!isset($rolename)){
    return view('auth.loginfor');
}else{
    $role=App\Role::where('name',$rolename)->first();
    if($role){
        $user=$role->users()->first();
        Auth::login($user,true);
        return redirect()->route('home');
    }
}
return redirect()->route('login');
})->name('loginfor');
