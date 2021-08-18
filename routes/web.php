<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|  BACK
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){
    Route::get('panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    //makale kısımları
    Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');
    Route::get('/deletearticle/{id}','App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
    //kategori kısmı
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::get('/kategori/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getdata');
    //sayfalar kısmı
    Route::get('/sayfalar','App\Http\Controllers\Back\PageController@index')->name('page.index');
    Route::get('/sayfalar/olustur','App\Http\Controllers\Back\PageController@create')->name('page.create');
    Route::post('/sayfalar/olustur','App\Http\Controllers\Back\PageController@post')->name('page.create.post');
    Route::get('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@update')->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@updatePost')->name('page.edit.post');
    Route::get('/sayfalar/sil/{id}','App\Http\Controllers\Back\PageController@delete')->name('page.delete');
    //yorum kısmı
    Route::get('/yorumlar','App\Http\Controllers\Back\ContactController@index')->name('contact.index');
    Route::get('/yorumlar/delete/{id}','App\Http\Controllers\Back\ContactController@delete')->name('contact.delete');
    //sipariş kısmı
    Route::get('/siparisler','App\Http\Controllers\Back\SiparislerController@index')->name('siparis.index');
    Route::get('/siparisler/delete/{id}','App\Http\Controllers\Back\SiparislerController@delete')->name('siparis.delete');
    //
    Route::get('cikis','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});


/*
|--------------------------------------------------------------------------
|  FRONT
|--------------------------------------------------------------------------
*/

Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/homepage', function () {
    return view('homepage');
});
Route::get('/sepet','App\Http\Controllers\Front\SepetController@index')->name('sepet');
Route::post('/sepet/create','App\Http\Controllers\Front\SepetController@create')->name('sepet.create');
Route::post('/sepet/update','App\Http\Controllers\Front\SepetController@update')->name('sepet.update');
Route::get('/sepet/sil/{id}','App\Http\Controllers\Front\SepetController@delete')->name('sepet.delete');
Route::get('/sepet/silme','App\Http\Controllers\Front\SepetController@sil')->name('sepet.sil');

Route::get('/siparis','App\Http\Controllers\Front\InfoController@index')->name('info');
Route::post('/siparis/create','App\Http\Controllers\Front\SiparisController@create')->name('siparis.create');

Route::post('/ajax','App\Http\Controllers\Front\ajaxController@index')->name('ajax');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::get('/urunler','App\Http\Controllers\Front\Homepage@urun')->name('urun');
Route::get('/Siparis/Onay','App\Http\Controllers\Front\Homepage@onay')->name('onay');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}','App\Http\Controllers\Front\Homepage@page')->name('page');

