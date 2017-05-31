<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Video;
use App\VideoCategory;
use DB;
use Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = VideoCategory::all();
        
        return view('video.index', compact('query'))->with('title',"Here Is Yen！－Video");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $query = VideoCategory::all();
        return view('video.create', compact('query'))->with('title',"Here Is Yen！－Video");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Video::create($request->all());
        return redirect('video');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = VideoCategory::find($id);

        
        $query_video = DB::table('videos')
                ->where('category', $query->name)
                ->get();


        return view('video.show', compact('query','query_video'))->with('title',$query->name);
    }

    public function resource($id,$title){

        $query = Video::find($id);
        return view('video.resource', compact('query'))->with('title',$query->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Video::find($id);
        $query_ca = VideoCategory::all();
        return view('video.edit', compact('query','query_ca'))->with('title',"Here Is Yen！－Video");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Video::where('id',$id)->update([
            'title' => $request->get('title'),
            'category' => $request->get('category'),
            'path' => $request->get('path'),
            'web_path' => $request->get('web_path'),
            'others' => $request->get('others'),
            'content' => $request->get('content')
            ]);
        return redirect('video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);
        return view('video.admin')->with('title',"Here Is Yen！－Admin");
    }

    public function VideoAdmin(){

        if(Auth::guest()){
            return redirect('/');
        }

        $vc_query = VideoCategory::all();
        $v_query = Video::all();
            return view('video.admin', compact('vc_query','v_query'))->with('title',"Here Is Yen！－Admin");
    }
}
