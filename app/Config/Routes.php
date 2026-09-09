<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#login
$routes->get('/', 'login::loginn');
$routes->post('/login', 'login::loginproses');

#log-out
$routes->get('/logout', 'login::logout');

#untuk menampilkan data pasien
$routes->get('/dashboard', 'Homedashboard::dashboard');
$routes->get('/daftar', 'daftarpasien::daftar');
$routes->get('/lihat/(:segment)', 'daftarpasien::lihat/$1');

#back up data
$routes->get('/backup', 'backup::index', ['filter' => 'role:admin']);

#impor data
$routes->get('import-sql', 'backup::importForm');
$routes->post('import-sql', 'backup::importExecute');

#untuk menampilkan data users
$routes->get('/manaj', 'manajemen::manaj', ['filter' => 'role:admin']);

#untuk cari pasien
$routes->post('/cari', 'daftarpasien::daftar');
#untuk menampilkan gambar
$routes->get('gambar-general-consent/(:num)/(:segment)', 'daftarpasien::tampilkanGambar_gen/$1/$2');
$routes->get('gambar-informed-consent/(:num)/(:segment)', 'daftarpasien::tampilkanGambar_inf/$1/$2');

#untuk menampilkan form tambah
$routes->get('/Kartu', 'KartuIbu::kartuibu', ['filter' => 'role:admin,bidan']);
$routes->get('/tambahkarlain', 'KartuIbu::kartuibulain', ['filter' => 'role:admin,bidan']);
$routes->get('/informed', 'informedconsent::informed', ['filter' => 'role:admin,bidan']);
$routes->get('/general', 'generalconsent::general', ['filter' => 'role:admin,staf admisi']);
$routes->get('/kunjungan', 'registerkunjungan::pengunjung', ['filter' => 'role:admin,staf admisi']);
$routes->get('/persalinan', 'registerpersalinan::persalinan', ['filter' => 'role:admin,bidan']);
$routes->get('/bayi', 'registerbayi::bayi', ['filter' => 'role:admin,staf admisi']);
$routes->get('/balita', 'registerbalita::balita', ['filter' => 'role:admin,staf admisi']);
$routes->get('/KB', 'pelayananKBB::KB', ['filter' => 'role:admin,bidan']);
$routes->get('/tambahuser', 'manajemen::tambah', ['filter' => 'role:admin']);
$routes->get('/pasien', 'pasienn::pasiennn', ['filter' => 'role:admin,staf admisi']);
$routes->get('/getRekamMedis/(:segment)', 'registerkunjungan::getRekamMedis/$1');
$routes->get('/getRekamMedis_g/(:segment)', 'generalconsent::getRekamMedis_g/$1');
$routes->get('/getRekamMedis_b/(:segment)', 'registerbayi::getRekamMedis_b/$1');
$routes->get('/getRekamMedis_ba/(:segment)', 'registerbalita::getRekamMedis_ba/$1');
$routes->get('/getRekamMedis_per/(:segment)', 'registerpersalinan::getRekamMedis_per/$1');
$routes->get('/getRekamMedis_kb/(:segment)', 'pelayananKBB::getRekamMedis_kb/$1');
$routes->get('/getRekamMedis_inf/(:segment)', 'informedconsent::getRekamMedis_inf/$1');
$routes->get('/getRekamMedis_ibu/(:segment)', 'KartuIbu::getRekamMedis_ibu/$1');


#untuk tambah
$routes->post('/kunjungan', 'registerkunjungan::save');
$routes->post('/general', 'generalconsent::save');
$routes->post('/bayi', 'registerbayi::save');
$routes->post('/balita', 'registerbalita::save');
$routes->post('/persalinan', 'registerpersalinan::save');
$routes->post('/pelayanankb', 'pelayananKBB::save');
$routes->post('/informed', 'informedconsent::save');
$routes->post('/kartuibu', 'KartuIbu::save');
$routes->post('/kartuibulain', 'KartuIbu::savekarp_r');
$routes->post('/ptambahuser', 'manajemen::save');
$routes->post('/ppasien', 'pasienn::save');

#untuk tampilan edit
$routes->get('/ebayi/(:segment)', 'registerbayi::tedit/$1', ['filter' => 'role:admin, staf admisi']);
$routes->get('/ekunjungan/(:segment)', 'registerkunjungan::tedit/$1', ['filter' => 'role:admin, staf admisi']);
$routes->get('/ebalita/(:segment)', 'registerbalita::tedit/$1', ['filter' => 'role:admin, staf admisi']);
$routes->get('/epersalinan/(:segment)', 'registerpersalinan::tedit/$1', ['filter' => 'role:admin, bidan']);
$routes->get('/egeneral/(:segment)', 'generalconsent::tedit/$1', ['filter' => 'role:admin, staf admisi']);
$routes->get('/epelayanan/(:segment)', 'pelayananKBB::tedit/$1', ['filter' => 'role:admin, bidan']);
$routes->get('/einformed/(:segment)', 'informedconsent::tedit/$1', ['filter' => 'role:admin, bidan']);
$routes->get('/ekartu/(:segment)', 'KartuIbu::tedit/$1', ['filter' => 'role:admin, bidan']);
$routes->get('/editus/(:segment)', 'manajemen::tedit/$1', ['filter' => 'role:admin']);


#untuk edit
$routes->post('/ebayi/(:segment)', 'registerbayi::update/$1');
$routes->post('/ekunjungan/(:segment)', 'registerkunjungan::update/$1');
$routes->post('/ebalita/(:segment)', 'registerbalita::update/$1');
$routes->post('/epersalinan/(:segment)', 'registerpersalinan::update/$1');
$routes->post('/epelayanan/(:segment)', 'pelayananKBB::update/$1');
$routes->post('/ekartu/(:segment)', 'KartuIbu::update/$1');
$routes->post('/egeneral/(:segment)', 'generalconsent::update/$1');
$routes->post('/einformed/(:segment)', 'informedconsent::update/$1');
$routes->post('/pedituser/(:segment)', 'manajemen::update/$1');

#delete
$routes->delete('/delete_kun/(:segment)', 'registerkunjungan::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_gen/(:segment)', 'generalconsent::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_bay/(:segment)', 'registerbayi::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_bal/(:segment)', 'registerbalita::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_kar/(:segment)', 'KartuIbu::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_inf/(:segment)', 'informedconsent::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_kb/(:segment)', 'pelayananKBB::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_per/(:segment)', 'registerpersalinan::delete/$1', ['filter' => 'role:admin']);
$routes->delete('/delete_us/(:segment)', 'manajemen::delete/$1', ['filter' => 'role:admin']);

#resume
$routes->get('/resume/(:segment)', 'daftarpasien::resume/$1', ['filter' => 'role:admin, bidan']);
