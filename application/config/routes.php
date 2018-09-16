<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['webmin'] = 'webminBerita';
$route['webmin/login'] = 'auth/login';
$route['webmin/logout'] = 'auth/logout';
$route['webmin/auth/cek/login']['post'] = 'auth/ceklogin';

$route['webmin/berita']['get'] = 'webminBerita';
$route['webmin/berita/data/ajax'] = 'webminBerita/ajax';
$route['webmin/berita/edit/:num'] = 'webminBerita/edit';
$route['webmin/berita/save']['post'] = 'webminBerita/store';
$route['webmin/berita/update']['post'] = 'webminBerita/update';
$route['webmin/berita/add'] = 'webminBerita/add';
$route['webmin/berita/destroy/:num'] = 'webminBerita/destroy';
$route['webmin/berita/image/:num'] = 'webminBerita/subImage';
$route['webmin/berita/get/sub/:num'] = 'webminBerita/getSub';
$route['webmin/berita/data/image/ajax'] = 'webminBerita/imageAjax';
$route['webmin/berita/image/edit/:num'] = 'webminBerita/editImage';
$route['webmin/berita/image/put']['post'] = 'webminBerita/putImage';
$route['webmin/berita/image/store']['post'] = 'webminBerita/storeImage';
$route['webmin/berita/image/destroy/:num/:num'] = 'webminBerita/destroyImage';

$route['webmin/fokus'] = 'webminFokus';
$route['webmin/fokus/data/ajax'] = 'webminFokus/ajax';
$route['webmin/fokus/edit/:num'] = 'webminFokus/edit';
$route['webmin/fokus/put']['post'] = 'webminFokus/put';
$route['webmin/fokus/store']['post'] = 'webminFokus/store';
$route['webmin/subfokus/destroy/:num'] = 'webminFokus/deleteSubFokus';
$route['webmin/fokus/get/sub/:num'] = 'webminFokus/getSub';
$route['webmin/fokus/sub/store']['post'] = 'webminFokus/storeSub';

$route['webmin/account'] = 'webminAccount';
$route['webmin/account/data/ajax'] = 'webminAccount/ajax';
$route['webmin/account/edit/:num'] = 'webminAccount/edit';
$route['webmin/account/put']['post'] = 'webminAccount/put';
$route['webmin/account/store']['post'] = 'webminAccount/store';

$route['webmin/penulis'] = 'webminPenulis';
$route['webmin/penulis/data/ajax'] = 'webminPenulis/ajax';
$route['webmin/penulis/edit/:num'] = 'webminPenulis/edit';
$route['webmin/penulis/put']['post'] = 'webminPenulis/put';
$route['webmin/penulis/store']['post'] = 'webminPenulis/store';

$route['webmin/kanal'] = 'webminKanal';
$route['webmin/kanal/data/ajax'] = 'webminKanal/ajax';
$route['webmin/kanal/edit/:num'] = 'webminKanal/edit';
$route['webmin/kanal/put']['post'] = 'webminKanal/put';
$route['webmin/kanal/store']['post'] = 'webminKanal/store';

$route['webmin/subKanal'] = 'webminSubKanal';
$route['webmin/subKanal/data/ajax'] = 'webminSubKanal/ajax';
$route['webmin/subKanal/edit/:num'] = 'webminSubKanal/edit';
$route['webmin/subKanal/put']['post'] = 'webminSubKanal/put';
$route['webmin/subKanal/store']['post'] = 'webminSubKanal/store';
$route['webmin/subKanal/destroy/:num'] = 'webminSubKanal/destroy';

$route['webmin/static'] = 'webminStatic';
$route['webmin/static/data/ajax'] = 'webminStatic/ajax';
$route['webmin/static/edit/:num'] = 'webminStatic/edit';
$route['webmin/static/put']['post'] = 'webminStatic/put';
$route['webmin/static/store']['post'] = 'webminStatic/store';

$route['webmin/indikator'] = 'WebminIndikator';
$route['webmin/indikator/data/ajax'] = 'WebminIndikator/ajax';
$route['webmin/indikator/edit/:num'] = 'WebminIndikator/edit';
$route['webmin/indikator/put']['post'] = 'WebminIndikator/put';
$route['webmin/indikator/store']['post'] = 'WebminIndikator/store';

$route['webmin/indikator_detail'] = 'WebminIndikatorDetail';
$route['webmin/indikator_detail/data/ajax'] = 'WebminIndikatorDetail/ajax';
$route['webmin/indikator_detail/edit/:num'] = 'WebminIndikatorDetail/edit';
$route['webmin/indikator_detail/put']['post'] = 'WebminIndikatorDetail/put';
$route['webmin/indikator_detail/store']['post'] = 'WebminIndikatorDetail/store';

$route['webmin/banner'] = 'WebminBanner';
$route['webmin/banner/data/ajax'] = 'webminBanner/ajax';
$route['webmin/banner/edit/:num'] = 'webminBanner/edit';
$route['webmin/banner/put']['post'] = 'webminBanner/put';
$route['webmin/banner/store']['post'] = 'webminBanner/store';
$route['webmin/banner/destroy/:num'] = 'webminBanner/destroy';

$route['webmin/quiz'] = 'WebminQuiz';
$route['webmin/quiz/data/ajax'] = 'WebminQuiz/ajax';
$route['webmin/quiz/edit/:num'] = 'WebminQuiz/edit';
$route['webmin/quiz/put']['post'] = 'WebminQuiz/put';
$route['webmin/quiz/store']['post'] = 'WebminQuiz/store';
$route['webmin/quiz/answer/:num'] = 'WebminQuiz/answer';
$route['webmin/quiz/data/answer/ajax'] = 'WebminQuiz/answerAjax';

$route['webmin/subcriber'] = 'WebminSubcriber';
$route['webmin/subcriber/data/ajax'] = 'WebminSubcriber/ajax';
$route['webmin/subcriber/view'] = 'WebminSubcriber/viewdata';

$route['webmin/lomba'] = 'WebminLomba';
$route['webmin/lomba/data/ajax'] = 'WebminLomba/ajax';
$route['webmin/lomba/view'] = 'WebminLomba/viewdata';
$route['webmin/lomba/destroy/:num'] = 'WebminLomba/destroy';

$route['webmin/publikasi'] = 'WebminPublikasi';
$route['webmin/publikasi/data/ajax'] = 'WebminPublikasi/ajax';
$route['webmin/publikasi/edit/:num'] = 'WebminPublikasi/edit';
$route['webmin/publikasi/put']['post'] = 'WebminPublikasi/put';
$route['webmin/publikasi/store']['post'] = 'WebminPublikasi/store';

$route['webmin/popup'] = 'WebminPopUp';
$route['webmin/popup/data/ajax'] = 'WebminPopUp/ajax';
$route['webmin/popup/edit/:num'] = 'WebminPopUp/edit';
$route['webmin/popup/put']['post'] = 'WebminPopUp/put';
$route['webmin/popup/store']['post'] = 'WebminPopUp/store';
$route['webmin/popup/destroy/:num'] = 'WebminPopUp/destroy';

$route['webmin/config'] = 'WebminConfig';
$route['webmin/config/store']['post'] = 'WebminConfig/store';

$route['berita'] = 'berita/index';
$route['review'] = 'review/index';
$route['fokus'] = 'fokus/index';
$route['literasi'] = 'literasi/index';
$route['data_alat'] = 'data_alat/index';
$route['komunitas'] = 'komunitas/index';
$route['peraturan'] = 'peraturan/index';
$route['search'] = 'search/index';
$route['indikator'] = 'indikator/index';
$route['kalkulator'] = 'kalkulator/index';
$route['quiz/sent'] = 'quiz/sent';
$route['artikel/(:any)/(:any)'] = 'artikel/detail/$1/$2';
$route['rss'] = 'rss/index';
$route['unduh-kajian-akademis-dan-dim-ruu-konsultan-pajak'] = 'other_page/unduh_kajian';

$route['profil'] = 'profil/index';
$route['profil/(:any)'] = 'profil/sub/$1';
$route['layanan_informasi'] = 'layanan_informasi/index';
$route['layanan_informasi/(:any)'] = 'layanan_informasi/sub/$1';
$route['daftar_informasi'] = 'daftar_informasi/index';
$route['daftar_informasi/(:any)'] = 'daftar_informasi/sub/$1';
$route['gallery'] = 'gallery/index';
$route['gallery/(:any)'] = 'gallery/sub/$1';

$route['berita/(:any)'] = 'berita/sub/$1';
$route['review/(:any)'] = 'review/sub/$1';
$route['fokus/(:any)'] = 'fokus/sub/$1';
$route['literasi/(:any)'] = 'literasi/sub/$1';
$route['data_alat/(:any)'] = 'data_alat/sub/$1';
$route['komunitas/(:any)'] = 'komunitas/sub/$1';
$route['peraturan/(:any)'] = 'peraturan/sub/$1';
$route['page/(:any)'] = 'page/detail/$1';
$route['indeks/(:any)'] = 'indeks/sub/$1';
$route['tag/(:any)'] = 'tag/sub/$1';
$route['quiz/(:any)'] = 'quiz/detail/$1';
$route['preview/(:any)'] = 'news/preview/$1';
$route['lomba/tax-competition-2018'] = 'lomba/tax_competition_2018';

$route['(:any)'] = 'news/news_detail/$1';
