<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheikhStore;
use App\Models\Country;
use App\Models\Sheikh;
use Illuminate\Http\Request;

class SheikhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.skeikh.index', ['sheikhs' => Sheikh::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skeikh.create', ['countries' => Country::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheikhStore $request)
    {
        Sheikh::create($request->all());
        return redirect()->back()->with('message', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\Response
     */
    public function show(Sheikh $sheikh)
    {
        return view('admin.skeikh.show', ['sheikh' => $sheikh]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheikh $sheikh)
    {
        return view('admin.skeikh.edit', ['countries' => Country::all(), 'sheikh' => $sheikh]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\Response
     */
    public function update(SheikhStore $request, Sheikh $sheikh)
    {
        Sheikh::where('id', $sheikh->id)->update($request->except('_token', '_method'));
        return redirect()->back()->with('message', 'تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sheikh  $sheikh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheikh $sheikh)
    {
        Sheikh::where('id', $sheikh->id)->delete();
        return redirect()->back()->with('message', 'تم حذف بنجاح');
    }
}
