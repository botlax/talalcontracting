<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Team;
use Input;

class TeamController extends Controller
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
        $members = Team::all();
        return view('pages.index-team',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'photo' => 'required|image|max:2000',
            'name' => 'required|min:5',
            'position' => 'required',
            'description' => 'required|min:30',
            'description2' => 'required_with:description3'
        ]);
        $member = [];
        $photo = Input::file('photo');
        if($photo->isValid()){
            $ext = $photo->getClientOriginalExtension();
            $destination = 'images';
            $name = explode(' ',$request->input('name'));
            $name = strtolower($name[0]);
            $filename = $name.'.'.$ext;
            $member['photo'] = $filename;
            $photo->move($destination,$filename);
        }
    
        $member['name'] = strtolower($request->input('name'));
        $member['position'] = strtolower($request->input('position'));
        $member['description'] = $request->input('description');
        $member['description2'] = trim($request->input('description2')) != ""?trim($request->input('description2')):null;
        $member['description3'] = trim($request->input('description3')) != ""?trim($request->input('description3')):null;

        Team::create($member);

        return redirect('admin/team');
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
        $member = Team::find($id);
        return view('pages.edit-team',compact('member'));
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
            'photo' => 'image|max:2000',
            'name' => 'required|min:5',
            'position' => 'required',
            'description' => 'required|min:30',
            'description2' => 'required_with:description3'
        ]);
        $member = [];
        if($request->input('photo')){
            $photo = Input::file('photo');
            if($photo->isValid()){
                $ext = $photo->getClientOriginalExtension();
                $destination = 'images';
                $name = explode(' ',$request->input('name'));
                $name = strtolower($name[0]);
                $filename = $name.'.'.$ext;
                $member['photo'] = $filename;
                $photo->move($destination,$filename);
            }
        }

        $member['name'] = strtolower($request->input('name'));
        $member['position'] = strtolower($request->input('position'));
        $member['description'] = $request->input('description');
        $member['description2'] = trim($request->input('description2')) != ""?trim($request->input('description2')):null;
        $member['description3'] = trim($request->input('description3')) != ""?trim($request->input('description3')):null;

        Team::find($id)->update($member);

        return redirect('admin/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::destroy($id);
        return redirect('admin/team');
    }
}
