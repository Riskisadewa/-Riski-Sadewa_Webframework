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

$routes->get('/portofolio', 'Portofolio::index'); // Menangani tampilan portofolio
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/create', 'Admin::create'); // Form tambah portofolio
$routes->post('/admin/save', 'Admin::save'); // Simpan portofolio
$routes->get('/admin/detail/(:segment)', 'Admin::detail/$1'); // Detail portofolio
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1'); // Form edit portofolio
$routes->post('/admin/update/(:num)', 'Admin::update/$1'); // Update portofolio
$routes->post('/admin/delete/(:num)', 'Admin::delete/$1'); // Hapus portofolio
$routes->setAutoRoute(true);



