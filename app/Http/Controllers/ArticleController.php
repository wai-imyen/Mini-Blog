<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest; //驗證資料
use App\Article;
use Auth;
use DB;

class ArticleController extends Controller
{
    public function index(){


            $query = DB::table('articles')
                ->orderBy('created_at', 'desc')
                ->paginate(7);
            $recent_data = DB::table('articles')
                ->orderBy('created_at', 'desc')
                ->limit(7)
                ->get();
        

        return view('article.index', compact('query','recent_data'))->with('title',"Here Is Yen！－Blog");
        
    }


    public function create(){

        if(Auth::guest()){
            return redirect('/');
        }
        return view('article.create')->with('title',"Here Is Yen！－Blog");
    }

    public function store(ArticleRequest $request){

        Article::create($request->all());
        return redirect('article');
    }

    public function edit($id){

        if(Auth::guest()){
            return redirect('/');
        }

        $query = Article::find($id);
        return view('article.edit', compact('query'))->with('title',"Here Is Yen！－Blog");
    }

    public function update(Request $request,$id){

        Article::where('id',$id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content')
            ]);
        return redirect('article');
    }

    public function destroy($id){

        Article::destroy($id);
        return redirect('article');
    }   

    public function show($id){

        $query = Article::find($id);
        return view('article.show', compact('query'))->with('title',"Here Is Yen！－Blog");
    }

    public function ArticleAdmin(){

        if(Auth::guest()){
            return redirect('/');
        }

            $query = DB::table('articles')
                ->where('hidden', '=', NULL)
                ->get();

        return view('article.admin', compact('query'))->with('title',"Here Is Yen！－Admin");
        //return "test";
    }
}
