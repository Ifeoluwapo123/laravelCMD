<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $array = array('posts' => $user->posts,
                        'pics' => $user->profile_pics,
                          'id' => $user->id);
        return view('home')->with($array);
    }

    public function uploadpage()
    {
       
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {

    }
    
    public function show($id)
    {
        $user_id = auth()->user()->id;
        return view('uploadpics')->with('post',$user_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $this->validate($request,[
            'cover_image' => 'image|max:1999'
        ]);

        if(!$request->hasFile('cover_image')){
            return redirect('/home/$id?null%upload');
        }

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename."_".time().".".$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        $post = User::find($id);
        if($request->hasFile('cover_image')){
            $post->profile_pics = $fileNameToStore;
        }
        $post->save();

        return redirect('/home')->with('success','Profile Pics was Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
