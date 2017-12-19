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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

Route::get('admin', 'Auth\LoginController@showLoginAdminForm')->name('admin');
Route::post('admin', 'Auth\LoginController@loginAdmin');

// Homepage Route;
Route::get('/', 'WelcomeController@welcome')->name('welcome');

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => 'web'], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);

    Route::group(['prefix' => 'event'], function () {
        Route::get('show/{events_id}', 'DetailEventController@show');
        Route::get('list/categorie/{menu}', 'DetailEventController@listEventMenu');
        Route::get('list/categorie/{sous_menu_name}/{sous_menu}', 'DetailEventController@listEventSousMenu');
        Route::get('{event_name}', 'DetailEventController@show_par_name');


    });
    Route::group(['prefix' => 'find'], function () {
        Route::get('q', 'RechercheController@find');
        Route::get('filtered', 'RechercheController@filtered');
    });
    Route::group(['prefix' => 'leguichet'], function () {
        Route::get('faq', 'AproposController@faq');
        Route::get('about', 'AproposController@apropos');
        Route::get('contact', 'AproposController@contact');
        Route::post('contact', 'AproposController@contactAction');
        Route::get('conditions-generales', 'AproposController@term');
        Route::get('shop', 'AproposController@achat');
        Route::get('vie-prive', 'AproposController@vieprive');
        Route::get('shop/ticket', 'AproposController@achatBillet');
    });

//    Route::get('code/qr/{text}', ['as' => 'qr_code', 'uses' => 'QRCodeController@generate']);
    Route::get('code/pdf/{text}/{event_id}', 'QRCodeController@getPdf');

    Route::get('errors/{from}/{code}', 'ErrorsController@show');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as' => '{username}',
        'uses' => 'ProfilesController@show'
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create'
            ]
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserAccount'
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as' => '{username}',
        'uses' => 'ProfilesController@updateUserPassword'
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as' => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount'
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar'
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);

    Route::group(['prefix' => 'shopping'], function () {
        Route::post('checkout', 'Shopping\CheckoutController@index')->name('checkout_index');
        Route::get('checkout', 'Shopping\CheckoutController@index')->name('checkout_index');
        Route::post('checkout/store', 'Shopping\CheckoutController@store');
        Route::post('checkout/save', 'Shopping\CheckoutController@save');
        Route::post('checkout/payment', 'Shopping\CheckoutController@savePayment');
        Route::get('payment/{users_id}/{id}', 'Shopping\CheckoutController@pay');
        Route::get('quiz', 'Shopping\CheckoutController@quiz');
        Route::get('annuler/{users_id}/{id}', 'UserController@annulerCommande');

        Route::resource('cart', 'Shopping\CartController');
        Route::delete('emptyCart', 'Shopping\CartController@emptyCart');


    });
    Route::post('newsletter', 'NewsLetterUserController@store');

});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin'], 'prefix' => 'admin'], function () {


    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ]
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index' => 'users',
            'destroy' => 'user.destroy'
        ],
        'except' => [
            'deleted'
        ]
    ]);

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index' => 'themes',
            'destroy' => 'themes.destroy'
        ]
    ]);


    Route::get('home', 'UserController@index')->name('/admin/home');
    Route::put('events', 'EventController@updateadmin')->name('event');

    /*-------------------*/
    /*----slideshow------*/
    Route::get('slide', 'SlideController@showSlideForm')->name('slide');
    Route::get('slides', 'SlideController@index')->name('slides');
    $this->post('slide', 'SlideController@store');
    Route::post('updateActive', 'SlideController@updateActive')->name('updateActive');
    /*----slideshow------*/

    Route::get('menu', 'MenuController@showMenuForm')->name('menu');
    Route::get('/menus', 'MenuController@index')->name('menus');
    $this->post('menu', 'MenuController@store');

    Route::get('sousmenu', 'SousmenuController@showSousmenuForm')->name('sousmenu');
    Route::get('/sousmenus', 'SousmenuController@index')->name('sousmenus');
    Route::post('sousmenu', 'SousmenuController@store');

    Route::get('listevent', 'EventController@listEvent')->name('listevent');
    Route::get('ajouterTicket/{id}', 'EventController@showAjouterTicket')->name('ajouterTicket');
    Route::post('updatePublie', 'EventController@updatePublie')->name('updatePublie');
    Route::get('updatePublieAll', 'EventController@updatePublieAll')->name('updatePublieAll');

    Route::resource('slides', 'SlideController', [
        'names' => [
            'index' => 'slides',
            'destroy' => 'slide.destroy'
        ],
        'except' => [
            'deleted'
        ]
    ]);
    Route::resource('menus', 'MenuController', [
        'names' => [
            'index' => 'menus',
            'destroy' => 'menu.destroy'
        ],
        'except' => [
            'deleted'
        ]
    ]);

    Route::resource('sousmenus', 'SousmenuController', [
        'names' => [
            'index' => 'sousmenus',
            'destroy' => 'sousmenu.destroy'
        ],
        'except' => [
            'deleted'
        ]
    ]);
    Route::resource(
        'events',
        'EventController', [
        'names' => [
            'destroy' => 'event.destroy',
            'edit' => 'event.edit_admin',
        ],
        'except' => [
            'deleted'
        ]
    ]);

    Route::delete('ticket/delete/{id}/{event_id}', 'TicketController@delete_admin')->name('ticket/delete');
    Route::get('tickets/update/{id}/{event_id}', 'TicketController@edit_admin');
    Route::put('tickets', 'TicketController@update_admin')->name('ticket');
    Route::get('events/update/{id}', 'EventController@edit_admin');
    Route::get('events/create', 'EventController@create_admin');
    Route::post('events/create', 'EventController@stroreAdmin')->name('admin_event_create');
    Route::post('events/create_ticket', 'TicketController@storeTicket')->name('admin_ticket_create');

    /*-------------------*/
    Route::get('message', 'AdminDetailsController@message');
    Route::get('message/read/{message_id}', 'AdminDetailsController@read_message');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('php', 'AdminDetailsController@listPHPInfo');
    Route::get('routes', 'AdminDetailsController@listRoutes');

});// Organisateur
Route::group(['middleware' => ['auth', 'activated'], 'prefix' => 'organisateur'], function () {
    Route::get('event', 'EventController@showEventForm')->name('event');
    Route::post('event', 'EventController@store')->name('event');
    Route::post('event_siteweb', 'EventController@update_website')->name('event_siteweb');
//    Route::get('index', 'OrganisateurController@index');
    Route::resource('ticket', 'TicketController');
    Route::resource(
        'event',
        'EventController', [
            'only' => [
                'edit'
            ]
        ]
    );
    Route::post('question', 'EventController@question_secret')->name('question');
    Route::put('event', 'EventController@update')->name('event');
    Route::get('event/ticket/delete/{id}/{event_id}', 'TicketController@delete');
    Route::get('rapport/{id}', 'EventController@rapport_vue');
});

Route::group(['middleware' => ['service'], 'prefix' => 'service'], function () {
    Route::get('login', 'Services\LoginController@index');
    Route::get('event', 'Services\EventController@index');
    Route::get('ticket', 'Services\TicketController@index');
    Route::get('tapakila', 'Services\TapakilaController@scan');
    Route::get('tapakila/load', 'Services\TapakilaController@load');
    Route::get('tapakila/export', 'Services\TapakilaController@getDataFromMobile');
});