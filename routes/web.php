<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Article;

Route::get('/', function () {

            $query = DB::table('articles')
                ->orderBy('created_at', 'desc')
                ->paginate(7);
            $recent_data = DB::table('articles')
                ->orderBy('created_at', 'desc')
                ->limit(7)
                ->get();
        

        return view('article.index', compact('query','recent_data'))->with('title',"Here Is Yen！－Blog");
});


Route::resource('article','ArticleController');

Route::resource('music','MusicController');

Route::resource('video','VideoController');

Route::resource('video_category','Video_CategoryController');

Route::get('articleAdmin', 'ArticleController@ArticleAdmin');

Route::get('musicAdmin', 'MusicController@MusicAdmin');

Route::get('videoAdmin', 'VideoController@VideoAdmin');

Route::get('/video/resource/{id}/{title}', 'VideoController@resource');

// Route::get('/login', 'Auth\LoginController@getLogin');

// Route::post('/login', 'Auth\LoginController@postLogin');


Auth::routes();

Route::get('/home', 'HomeController@index');
