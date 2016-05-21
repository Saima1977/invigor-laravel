<?php

namespace App\Http\Controllers;


use Input;
use File;
use Validator;
use Redirect;
use Request;
use Session;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Invigor as Invigor;


class InvigorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // get all the products
        $invigors = \App\Invigor::paginate(10);

        // load the view and pass the products
        return View::make('invigors.index')
            ->with('invigors', $invigors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/invigors/create.blade.php)
        return View::make('invigors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation 
        $rules = array(
			'image'       => 'required|mimes:png,jpg,gif',
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required'
        );

        $validator = $validator = Validator::make(Input::all(), $rules);
        
   // process the login
        if ($validator->fails()) 
        {
            return Redirect::to('invigors/create')
                ->withErrors($validator);
        } 
        else 
        {        
            // store
            $invigor = new Invigor;
            $image = Input::file('image');

            $extension = $image->getClientOriginalExtension();
            $filename = $image->getClientOriginalName();            
            $invigor->image_name  = $filename;             
            $invigor->name       = Input::get('name');
            $invigor->price      = Input::get('price');
            $invigor->description = Input::get('description');
            $invigor->save();

            Input::file('image')->move(base_path()."/public/", $filename);

            // redirect
            Session::flash('message', 'Successfully created product!');
            return Redirect::to('invigors');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the product
        $invigor = Invigor::find($id);

        // show the view and pass the product to it
        return View::make('invigors.show')
            ->with('invigor', $invigor);
    }
    
    public function edit($id)
    {
        // get the product
        $invigor = Invigor::find($id);

        // show the edit form and pass the product
        return View::make('invigors.edit')
            ->with('invigor', $invigor);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
        	'image' => 'required|mimes:png,jpg,gif',
            'name'       => 'required',
            'price'      => 'required',
            'description' => 'required'
        );

        $validator = $validator = Validator::make(Input::all(), $rules);
        
   // process the login
        if ($validator->fails()) 
        {
            return Redirect::to('invigors/edit')
                ->withErrors($validator);
        } 
        else 
        {
            // 
            $invigor = Invigor::find($id);
  			$image = Input::file('image');

			$extension = $image->getClientOriginalExtension();
            $filename = $image->getClientOriginalName(); 				
            $invigor->image_name  = $filename;            
            $invigor->name       = Input::get('name');
            $invigor->price      = Input::get('price');
        	$invigor->description = Input::get('description');
            $invigor->save();


    		Input::file('image')->move(base_path()."/public/",$filename);            

            // redirect
            Session::flash('message', 'Successfully updated product!');
            return Redirect::to('invigors');
        }        

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    
    public function destroy($id)
    {
        // delete
        $invigor = Invigor::find($id);
        $invigor->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the product!');      
        return Redirect::to('invigors');
    }
}
