<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('anime', ['filter' => 'auth'], function ($routes) {
	$routes->get('all', 'Animes::index');
	$routes->get('(:num)', 'Animes::find/$1');
	$routes->post('', 'Animes::store');
	$routes->put('(:num)', 'Animes::update/$1');
	$routes->delete('(:num)', 'Animes::delete/$1');


	$routes->get('(:num)/episodios', 'Episodios::getEpisodios/$1');
	$routes->get('(:num)/episodio/(:num)', 'Episodios::getEpisodiosById/$1/$2');
	$routes->post('(:num)/episodio', 'Episodios::store/$1');
	$routes->put('(:num)/episodio/(:num)', 'Episodios::update/$1/$2');
	$routes->delete('(:num)/episodio/(:num)', 'Episodios::delete/$1/$2');
	
});
$routes->get('', 'Animes::index');
$routes->post('/login', 'Usuarios::login');
$routes->post('/cadastro', 'Usuarios::store');
$routes->put('/usuario/(:num)', 'Usuarios::update/$1');
$routes->delete('/usuario/(:num)', 'Usuarios::delete/$1');
















/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
