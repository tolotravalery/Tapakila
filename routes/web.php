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

/* Admin route */

/* authentification */
Route::get('admin', 'Auth\LoginController@showLoginAdminForm')->name('admin');
Route::post('admin', 'Auth\LoginController@loginAdmin');
/* end authentification */

/* action */
Route::group(['middleware' => ['auth', 'activated', 'role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/clear-alert','AlertController@clearAll');

    Route::resource('/shopping', 'AdminAchatController', [
    ]);

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
    Route::put('frais', 'EventController@update_frais')->name('frais');

    /*----slideshow------*/
    Route::get('slide', 'SlideController@showSlideForm')->name('slide');
    Route::get('slides', 'SlideController@index')->name('slides');
    $this->post('slide', 'SlideController@store');
    Route::post('updateActive', 'SlideController@updateActive')->name('updateActive');
    Route::resource('slides', 'SlideController', [
        'names' => [
            'index' => 'slides',
            'destroy' => 'slide.destroy'
        ],
        'except' => [
            'deleted'
        ]
    ]);
    /*----slideshow------*/

    Route::get('frais', 'EventController@afficher_frais')->name('frais');

    Route::get('menu', 'MenuController@showMenuForm')->name('menu');
    Route::get('/menus', 'MenuController@index')->name('menus');
    $this->post('menu', 'MenuController@store');

    Route::get('sousmenu', 'SousmenuController@showSousmenuForm')->name('sousmenu');
    Route::get('/sousmenus', 'SousmenuController@index')->name('sousmenus');
    Route::post('sousmenu', 'SousmenuController@store');

    Route::get('events/past', 'EventController@listEvent')->name('listevent');
    Route::get('events/en-cours', 'EventController@encours')->name('encours');
    Route::get('events/repport/{event_id}', 'EventController@report')->name('report');
    Route::get('ajouterTicket/{id}', 'EventController@showAjouterTicket')->name('ajouterTicket');
    Route::post('updatePublie', 'EventController@updatePublie')->name('updatePublie');
    Route::get('updatePublieAll', 'EventController@updatePublieAll')->name('updatePublieAll');

    
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

    Route::get('message', 'AdminDetailsController@message');
    Route::get('message/read/{message_id}', 'AdminDetailsController@read_message');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('php', 'AdminDetailsController@listPHPInfo');
    Route::get('routes', 'AdminDetailsController@listRoutes');
    Route::resource('payment','PayeventController');

});

/* end action */

/* organisateur */

Route::group(['middleware' => ['auth', 'activated'], 'prefix' => 'organisateur'], function () {
    Route::get('evenement/ajouter', 'EventController@showEventForm')->name('event');
    Route::post('event', 'EventController@store')->name('event');
    Route::post('event_siteweb', 'EventController@update_website')->name('event_siteweb');
    Route::resource('ticket', 'TicketController');
    Route::resource(
        'evenement',
        'EventController', [
            'only' => [
                'edit'
            ]
        ]
    );
    Route::post('question', 'EventController@question_secret')->name('question');
    Route::put('event', 'EventController@update')->name('event');
    Route::get('evenement/ticket/delete/{id}/{event_id}', 'TicketController@delete');
    Route::get('evenement/rapport/{id}', 'EventController@rapport_vue');
});

/* end organisateur */

/* service */

Route::group(['middleware' => ['service'], 'prefix' => 'service'], function () {
    Route::get('login', 'Services\LoginController@index');
    Route::get('event', 'Services\EventController@index');
    Route::get('ticket', 'Services\TicketController@index');
    Route::get('tapakila', 'Services\TapakilaController@scan');
    Route::get('tapakila/load', 'Services\TapakilaController@load');
    Route::get('tapakila/export', 'Services\TapakilaController@getDataFromMobile');
});

/* end service */

/* payment */

/* notification */
Route::group(['prefix' => 'payments/notify'], function () {
    Route::any('orange', 'Shopping\CheckoutController@NotifyOrange');
    Route::any('telma', 'Shopping\CheckoutController@NotifyTelma');
});
/*end notification */

/* proxy */
Route::any('payment/pay_token', 'Shopping\CheckoutController@proxyOrange');
Route::any('/mpgw/v2/transaction', 'Shopping\CheckoutController@proxyTelma');
/* end proxy */

/* end payment */


/* public routes */
Route::group(['middleware' => 'web'], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);
    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::post('/register/facebook/post-data','Auth\FacebookController@postData');
    
    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);

    /* evenement */
    Route::group(['prefix' => 'evenement'],function () {
        Route::get('{categorie_name}/{event_title}', 'DetailEventController@show')->name('detail-event');
        Route::get('{menu}', 'DetailEventController@listEventMenu');
        //Route::get('{event_name}', 'DetailEventController@show_par_name'); 
    });
    Route::get('tags/{sous_menu}', 'DetailEventController@listEventSousMenu'); 
    Route::group(['prefix' => 'find'], function () {
        Route::get('q', 'RechercheController@find');
        Route::get('filtered', 'RechercheController@filtered');
    });
    /* end evenement */


	Route::group([],function () {
        Route::get('faq', 'AproposController@faq');
        Route::get('about-us', 'AproposController@apropos');
        Route::get('contact-us', 'AproposController@contact');
        Route::post('contact', 'AproposController@contactAction');
        Route::get('conditions-generales', 'AproposController@term');
        Route::get('infos-billets', 'AproposController@achat');
        Route::get('vie-prive', 'AproposController@vieprive');
        Route::get('achat-ticket', 'AproposController@achatBillet');
        Route::post('newsletter', 'NewsLetterUserController@store');
    });

    // qr code generator
    Route::get('code/pdf/{text}/{event_id}', 'QRCodeController@getPdf');
    // error handler
    Route::get('errors/{from}/{code}', 'ErrorsController@show');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/accueil', ['as' => 'public.home', 'uses' => 'UserController@index']);

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

    /* achat */
    Route::group(['prefix' => 'shopping'], function () {
        Route::post('checkout', 'Shopping\CheckoutController@index')->name('checkout_index');
        Route::get('checkout', 'Shopping\CheckoutController@index')->name('checkout_index');
        Route::any('checkout/orange', 'Shopping\CheckoutController@saveOrange');
        Route::any('checkout/telma', 'Shopping\CheckoutController@saveTelma');
        Route::any('checkout/pay/orange', 'Shopping\CheckoutController@savePaymentOrange');
        Route::get('pay/{users_id}/{id}', 'Shopping\CheckoutController@pay');
        Route::post('pay/one-ticket', 'Shopping\CheckoutController@checkoutOnePayment');
        Route::get('quiz', 'Shopping\CheckoutController@quiz');
        Route::get('cancel/{users_id}/{id}', 'UserController@annulerCommande');
        Route::resource('cart', 'Shopping\CartController', [
            'as' => 'cart'
        ]);
        Route::delete('emptyCart', 'Shopping\CartController@emptyCart');
    });
    Route::any('checkout/telma', 'Shopping\CheckoutController@saveTelma');
    /* end achat */
    

});

/* end public routes */


/* site map generator */
Route::get('sitemap', 'SitemapController@generate_sitemap');
/* end sitemap */

// Homepage Route;
Route::get('/', 'WelcomeController@welcome')->name('welcome');

// Authentication Routes
Auth::routes();