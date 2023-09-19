<?php

use App\Models\Pessoa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pessoas', function () {
    return DB::select('SELECT * FROM pessoas');
});

Route::post('/pessoas', function () {
    $data = request()->toArray();

    $data['uuid'] = Str::uuid()->__toString();
    $data['created_at'] = now();
    $data['updated_at'] = now();

    return DB::table('pessoas')->insert($data);
});

Route::get('/contagem-pessoas', function () {
    return Pessoa::count();
});
