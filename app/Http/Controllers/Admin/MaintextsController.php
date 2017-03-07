<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Maintexts;
use App\Http\Requests\CreateMaintextsRequest;
use App\Http\Requests\UpdateMaintextsRequest;
use Illuminate\Http\Request;



class MaintextsController extends Controller {

	/**
	 * Display a listing of maintexts
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $maintexts = Maintexts::all();

		return view('admin.maintexts.index', compact('maintexts'));
	}

	/**
	 * Show the form for creating a new maintexts
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
        $showhide = Maintexts::$showhide;

	    return view('admin.maintexts.create', compact("showhide"));
	}

	/**
	 * Store a newly created maintexts in storage.
	 *
     * @param CreateMaintextsRequest|Request $request
	 */
	public function store(CreateMaintextsRequest $request)
	{
	    
		Maintexts::create($request->all());

		return redirect()->route(config('quickadmin.route').'.maintexts.index');
	}

	/**
	 * Show the form for editing the specified maintexts.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$maintexts = Maintexts::find($id);
	    
	    
        $showhide = Maintexts::$showhide;

		return view('admin.maintexts.edit', compact('maintexts', "showhide"));
	}

	/**
	 * Update the specified maintexts in storage.
     * @param UpdateMaintextsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMaintextsRequest $request)
	{
		$maintexts = Maintexts::findOrFail($id);

        

		$maintexts->update($request->all());

		return redirect()->route(config('quickadmin.route').'.maintexts.index');
	}

	/**
	 * Remove the specified maintexts from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Maintexts::destroy($id);

		return redirect()->route(config('quickadmin.route').'.maintexts.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Maintexts::destroy($toDelete);
        } else {
            Maintexts::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.maintexts.index');
    }

}
