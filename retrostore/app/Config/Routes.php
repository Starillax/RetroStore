<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true); 

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('insert_user_form', 'Home::showInsertUser');
$routes->add('insert_user', 'Home::insertUser');
$routes->add('select_user', 'Home::selectUser');
$routes->add('edit_user_form/(:num)', 'Home::showEditUser/$1');
$routes->add('edit_user/(:num)', 'Home::editUser/$1');
$routes->add('delete_user/(:num)', 'Home::deleteUser/$1');
$routes->add('insert_produto_form', 'Home::showInsertProduto');
$routes->add('insert_produto', 'Home::insertProduto');
$routes->add('select_produto', 'Home::selectProduto');
$routes->add('edit_produto_form/(:num)', 'Home::showEditProduto/$1');
$routes->add('edit_produto/(:num)', 'Home::editProduto/$1');
$routes->add('delete_produto/(:num)', 'Home::deleteProduto/$1');
$routes->add('pag_produto/(:num)', 'Home::showProduto/$1');
$routes->add('insert_categoria_form', 'Home::showInsertCategoria');
$routes->add('insert_categoria', 'Home::insertCategoria');
$routes->add('select_categoria', 'Home::selectCategoria');
$routes->add('edit_categoria_form/(:num)', 'Home::showEditCategoria/$1');
$routes->add('edit_categoria/(:num)', 'Home::editCategoria/$1');
$routes->add('delete_categoria/(:num)', 'Home::deleteCategoria/$1');
$routes->add('comprar_produto/(:num)', 'Home::comprarProduto/$1');
$routes->add('compras_user/(:num)', 'Home::comprasUser/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
