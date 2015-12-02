<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PhotoRequest;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Project;
use Image;
use Input;

class PhotoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('pages.index-photo',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $project_list = Project::all()->lists('name','id')->toArray();
        return view('pages.add-photo',compact('project_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
        $project_id = $request->input('project_id');
        $featured = Input::file('featured');
        $photos = Input::file('photo');
        $destination = 'images';
        if($featured->isValid()){
            $extension = $featured->getClientOriginalExtension();
            $fileName = 'featured-'.$project_id.'.'.$extension;
            $photo = new Photo(['name'=>$fileName]);
            Project::find($project_id)->photo()->save($photo);
            $featured->move($destination, $fileName);
        }

        $uploadcount = 1;
        foreach($photos as $photo) {
          if($photo->isValid()){
            $extension = $photo->getClientOriginalExtension();
            $fileName = 'photo'.$uploadcount.'-'.$project_id.'.'.$extension;
            $img = new Photo(['name'=>$fileName]);
            Project::find($project_id)->photo()->save($img);
            $photo->move($destination, $fileName);

            $uploadcount ++;
          }
        }

        flash()->success('Photos Successfully Uploaded!');
        return redirect('/admin/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
