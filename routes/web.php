<?php

use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


//--------------------------ACARA3---------------------------
Route::get('coba', function () {
    return view ('coba');
});

Route::view('/coba', 'coba');

Route::get('/coba', function () {
    return view('coba', ['data' => 'saya programmer pemula']);
});

Route::view('/coba', 'coba', ['data' => 'saya programmer pemula'] );

// Route::get('/coba', function (){
//     $profile = 'aku programmer';
//     return view('coba', ['data' => $profile]);
// });

//route parameter
// Route::get('/coba/{id}', function ($id){
//     return 'ini adalah '.$id;
// });

// Route::get('/coba/{id}', function (Request $request){
//     return 'ini adalah '.$request->id;
// });

// Route untuk menampilkan halaman form
Route::get('/form', function () {
    return view('form'); // Menampilkan form di `resources/views/form.blade.php`
});  
// Route untuk menangani GET dan POST di /submit
Route::match(['get', 'post'], '/submit',function (Request $request) {
    if ($request->isMethod('get')) {
        return redirect('/form');
    }
    return "Form submitted successsfully!";
});

// Redirect dari /here ke /there secara permanen (301)
Route::redirect('/here', '/there', 301);

// Route untuk /there agar bisa diakses
Route::get('/there', function () {
    return "Anda telah dialihkan ke halaman /there";
});

// Parameter Opsional
Route::get('/user/{name?}', function ($name = "Guest") {
    return "Hello, " . ucfirst($name);
});

//Regular Expression Constraints
Route::get('user/{name}', function ($name) {
    return "Hello, " . ucfirst($name);
})->where('name', '[A-Za-z]+');
Route::get('user/{id}', function ($id) {
    return "User ID: " . $id;
})->where('id', '[0-9]+');
Route::get('user/{id}/{name}', function ($id, $name) {
    return "User ID: " . $id . ", Name: " . ucfirst($name);
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


// Global Constraints (Tambahkan di `app/Providers/RouteServiceProvider.php`)
Route::get('/post/{slug}', function ($slug) {
    return "Post: $slug";
});

// Encoded Forward Slashes
Route::get('/search/{query}', function ($query) {
    return "Search query: " . urldecode($query);
})->where('query', '.*'); // Mengizinkan `/` dalam parameter



//--------------ACARA 4----------------------

//General URL ke Route Bernama
// Route dengan nama
// Route::get('/dashboard', function () {
//     return "Welcome to the Dashboard";
// })->name('dashboard');

// // Membuat URL berdasarkan nama route
// Route::get('/generate-url', function () {
//     $url = route('dashboard'); // Menghasilkan URL dari route bernama
//     return "URL Dashboard: " . $url;
// });

//Generating URLs...
$url = route('profil');
//Generating Redirects...
return redirect()->route('profile');

Route::get('user/{id}/profile', function ($id){
})->name('profile');
$url = route('profile',['id'=>1]);

Route::get('user/{id}/profile', function ($id){
})->name('profile');
$url = route('profile', ['id' => 1, 'photos' => 'yes']);