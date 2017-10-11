<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Role;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;


use App\Http\Requests\UpdateMemberRequest;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
$members = Role::where('name', 'member')->first()->users;
return Datatables::of($members)

->addColumn('name', function($member) {
return '<a href="'.route('members.show', $member->id).'">'.$member->name.'</a>';
})

->addColumn('action', function($member){
return view('datatable._action', [
'model'
=> $member,
'form_url'
=> route('members.destroy', $member->id),
'edit_url' => route('members.edit', $member->id),
'confirm_message' => 'Yakin mau menghapus ' . $member->name . '?'
]);
})->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('members.index', compact('html'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $member = User::find($id);
return view('members.show', compact('member'));
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
    public function update(UpdateMemberRequest $request, $id)
    {
        $member = User::find($id);
$member->update($request->only('name','email'));
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Berhasil menyimpan $member->name"
]);
return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
$member = User::find($id);
if ($member->hasRole('member')) {
$member->delete();
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Member berhasil dihapus"
]);
}
return redirect()->route('members.index');
}
}

