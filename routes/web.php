<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Models\Form;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 127.0.0.1:8000/file-upload

Route::get('/file-upload', function (){
    return view('form');
})->name('file-upload');

Route::post('/file-save', function(Request $request){
    $data=new Form;
    if($files=$request->file('image')){
    $name=$files->getClientOriginalName();
    $files->move('upload',$name);
    $data->path=$name;
    }
    $data->save();
    return redirect('file-upload');
})->name('file-save');

