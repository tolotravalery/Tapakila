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
Route::get('event', 'EventController@showEventForm')->name('event');
Route::post('event', 'EventController@store')->name('event');

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

    Route::group(['prefix' => 'events'], function () {
        Route::get('show/{events_id}', 'DetailEventController@show');
        Route::get('list/categorie/{menu}', 'DetailEventController@listEventMenu');
        Route::get('list/categorie/sous_categorie/{sous_menu}', 'DetailEventController@listEventSousMenu');
    });

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

        Route::resource('shop', 'Shopping\ProductController', ['only' => ['index', 'show']]);

        Route::resource('cart', 'Shopping\CartController');
        Route::delete('emptyCart', 'Shopping\CartController@emptyCart');
        Route::post('switchToWishlist/{id}', 'Shopping\CartController@switchToWishlist');

        Route::resource('wishlist', 'Shopping\WishlistController');
        Route::delete('emptyWishlist', 'Shopping\WishlistController@emptyWishlist');
        Route::post('switchToCart/{id}', 'Shopping\WishlistController@switchToCart');
        Route::get('checkout', 'Shopping\CheckoutController@index');
        Route::post('checkout/store', 'Shopping\CheckoutController@store');
        Route::post('checkout/save/{checkout}', 'Shopping\CheckoutController@save');
    });

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

    /*-------------------*/
    Route::get('menu', 'MenuController@showMenuForm')->name('menu');
    Route::get('/menus', 'MenuController@index')->name('menus');
    $this->post('menu', 'MenuController@store');

    Route::get('sousmenu', 'SousmenuController@showSousmenuForm')->name('sousmenu');
    Route::get('/sousmenus', 'SousmenuController@index')->name('sousmenus');
    Route::post('sousmenu', 'SousmenuController@store');

    Route::get('listevent', 'EventController@listEvent')->name('listevent');
    Route::post('updatePublie', 'EventController@updatePublie')->name('updatePublie');

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
    /*-------------------*/


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('php', 'AdminDetailsController@listPHPInfo');
    Route::get('routes', 'AdminDetailsController@listRoutes');


});


