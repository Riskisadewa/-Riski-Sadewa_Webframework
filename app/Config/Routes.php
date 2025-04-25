<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::about');
$routes->get('/Recipes', 'Recipes::index');
$routes->get('/portofolio', 'Portofolio::index');
$routes->get('/contact', 'Contact::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/create', 'Admin::create');
$routes->post('/admin/save', 'Admin::save');
$routes->get('/admin/detail/(:segment)', 'Admin::detail/$1');
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');
$routes->post('/admin/delete/(:num)', 'Admin::delete/$1');

