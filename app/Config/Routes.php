<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/**
 * --------------------------------------------------------------------
 * Routes for Auth
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');
// $routes->get('/forgot-password', 'Auth::forgotPassword');
// $routes->post('/forgot-password', 'Auth::attemptForgotPassword');

/**
 * --------------------------------------------------------------------
 * Routes for Dashboard
 * --------------------------------------------------------------------
 */
$routes->get('/dashboard', 'Dashboard::dashboard', ['filter' => 'auth']);


/**
 * --------------------------------------------------------------------
 * Routes for Event
 * --------------------------------------------------------------------
 */
$routes->get('/event', 'Event::index', ['filter' => 'auth', 'as' => 'event']);
$routes->get('/event/create', 'Event::create', ['filter' => 'auth', 'as' => 'event.create']);
$routes->post('/event/create', 'Event::insert', ['filter' => 'auth', 'as' => 'event.store']);
$routes->get('/event/detail/(:num)', 'Event::detail/$1', ['filter' => 'auth', 'as' => 'event.detail']);
$routes->get('/event/edit/(:num)', 'Event::edit/$1', ['filter' => 'auth', 'as' => 'event.edit']);
$routes->post('/event/edit/(:num)', 'Event::update/$1', ['filter' => 'auth', 'as' => 'event.update']);
$routes->delete('/event/delete/(:any)', 'Event::delete/$1', ['filter' => 'auth', 'as' => 'event.delete']);
$routes->get('/event/retrieve/', 'Event::retrieve', ['filter' => 'auth', 'as' => 'event.retrieve']);
$routes->get('/event/restore/(:any)', 'Event::restore/$1', ['filter' => 'auth', 'as' => 'event.restore']);

/**
 * --------------------------------------------------------------------
 * Routes for Registrant
 * --------------------------------------------------------------------
 */
$routes->get('/registrant', 'Registrant::index', ['filter' => 'auth', 'as' => 'registrant']);
$routes->get('/registrant/detail/(:num)', 'Registrant::detail/$1', ['filter' => 'auth', 'as' => 'registrant.detail']);
/**
 * --------------------------------------------------------------------
 * Routes for User
 * --------------------------------------------------------------------
 */
$routes->get('/user', 'User::index', ['filter' => 'auth']);
$routes->post('/user', 'User::insert', ['filter' => 'auth']);
$routes->post('/user/(:num)', 'User::updatedetail/$1', ['filter' => 'auth']);
$routes->post('/user/status/(:num)', 'User::updatestat/$1', ['filter' => 'auth']);

/**
 * --------------------------------------------------------------------
 * Routes for Event Listing
 * --------------------------------------------------------------------
 */
$routes->get('/event/listing', 'Listing::index');
$routes->post('/event/listing', 'Listing::index');
// $routes->get('/event/listing/(:any)', 'Listing::index/$1');
$routes->get('/event/listing/search/(:any)', 'Listing::filter/$1');
$routes->get('/event/listing/detail/(:any)', 'Listing::detail/$1'); 
$routes->get('/event/listing/register/(:any)', 'Listing::register/$1');
$routes->post('/event/listing/register/(:any)/step1', 'Listing::register2/$1');
$routes->post('/event/listing/register/(:any)/step2', 'Listing::register3/$1');
$routes->post('/event/listing/register/(:any)/step3/(:any)/(:any)', 'Listing::attemptRegister/$1/$2/$3', ['as' => 'event.register.attempt']);
$routes->post('/event/listing/register/thankyou', 'Listing::thankyou');
$routes->post('/student/store/(:num)', 'Listing::storestudent/$1', ['as' => 'student.store']);

/**
 * --------------------------------------------------------------------
 * Routes for Track Program
 * --------------------------------------------------------------------
 */
$routes->get('/event/track', 'Track::index');
$routes->post('/event/track', 'Track::show');

/**
 * --------------------------------------------------------------------
 * Routes for Track Program
 * --------------------------------------------------------------------
 */
$routes->get('/program/search/(:any)', 'Listing::findcollege/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
