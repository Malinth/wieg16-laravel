<?php
namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups/delete', ['groups' => Group::all()]);
        return response()->json(Group::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $group = new Group();
        $group->fill($input)->save();
        return response()->redirectToAction('GroupController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Group::find($id);
        return View('groups.edit', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $input = $request->all();
        $group->fill($input)->save();
        return response()->redirectToAction('GroupController@edit', ['id' => $group->customer_group_id]);
        //return redirect('/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response()->redirectToAction('GroupController@index');
    }
}