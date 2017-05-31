<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MusicRequest;

use App\Music;

use Auth;

use DB;

class MusicController extends Controller
{
    public function index(){
        $query = DB::table('musics')
                ->orderBy('category', 'desc')
                ->paginate(5)
                ;

        // $query = Music::paginate(10);
        return view('music.index', compact('query'))->with('title',"Here Is Yen！－Music");
    }

    public function show($id){

        $query = Music::find($id);
        return view('music.show', compact('query'))->with('title',$query->performer." - ".$query->title);
    }

    public function create(){

        if(Auth::guest()){
            return redirect('/');
        }

        return view('music.create')->with('title',"Here Is Yen！－Music");;
    }

    public function store(MusicRequest $request){

        Music::create($request->all());
        return redirect('/musicAdmin');
    }

     public function edit($id){

        if(Auth::guest()){
            return redirect('/');
        }
        $query = Music::find($id);
        return view('music.edit', compact('query'))->with('title',"Here Is Yen！－Music");;
    }

    public function update(Request $request,$id){

        if(Auth::guest()){
            return redirect('/');
        }

        Music::where('id',$id)->update([
            'performer' => $request->get('performer'),
            'title' => $request->get('title'),
            'path' => $request->get('path'),
            'category' => $request->get('category'),
            'lyrics' => $request->get('lyrics')
            ]);
        $query = Music::find($id);
        return view('music.show', compact('query'))->with('title',$query->performer." - ".$query->title);
    }

    public function destroy($id){

        Music::destroy($id);
        // echo"<script>history.go(-1);location.reload(); </script>";  


        $query = Music::all();
        return view('music.admin', compact('query'))->with('title',"Here Is Yen！－Admin");
    }   

    public function MusicAdmin(){

        if(Auth::guest()){
            return redirect('/');
        }

        $query = Music::all();
        return view('music.admin', compact('query'))->with('title',"Here Is Yen！－Admin");
        //return "test";
    }

    public function test(){
        $query = Music::all();
        return view('music.admin', compact('query'))->with('title',"Here Is Yen！－Admin");

    }
}
