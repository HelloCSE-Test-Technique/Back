<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Star;
use Illuminate\Support\Facades\DB;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //all api stars
    public function index()
    {
        //get all the star
        $stars = Star::all();
        $starsData = [];

        foreach ($stars as $s) {
            // Encode image data as base64
            $s->image = base64_encode($s->image); 
            $starsData[] = $s;
        }

        return response()->json($starsData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //create a star
    public function store(Request $request)
    {
        //require element to create a star
        $validatedData = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        //initialise a new star
        $star = new Star();

        //give all elements require to the star
        $star->lastname = $validatedData['lastname'];
        $star->firstname = $validatedData['firstname'];

        $imageData = file_get_contents($request->file('image'));
        $star->image = $imageData;

        $star->description = $validatedData['description'];

        //save in the DB the new star
        $star->save();

        return response()->json(['message' => 'Star create successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //search by id star
    public function show($id)
    {
         //search if the star exist or not
        $star = Star::findOrFail($id);

        // Encode image data as base64
        $star->image = base64_encode($star->image); 

        // return the response in json format
        return response()->json($star);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //update a star by id
    public function update(Request $request, $id)
    {
        //search if the star exist or not
        $star = Star::findOrFail($id);

        //request element nedd to be change

        if ($request->has('lastname')) {
            $star->lastname = $request['lastname'];
        }
        if ($request->has('firstname')) {
            $star->firstname = $request['firstname'];
        }
        if ($request->has('image')) {
            $imageData = file_get_contents($request->file('image'));
            $star->image = $imageData;
        }
        if ($request->has('description')) {
            $star->description = $request['description'];
        }

        //save the change
        $star->save();


        return response()->json(['message' => 'Star update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //remove a star by id 
    public function destroy($id)
    {

        //search if the star exist or not
        $star = Star::findOrFail($id);

        //delete the star
        $star->delete();

        return response()->json(['message' => 'Star deleted successfully']);
    }
}
