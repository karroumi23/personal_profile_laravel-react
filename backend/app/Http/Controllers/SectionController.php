<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sections = Section::all();
        return response()->json(['data'=>$sections,'maessage'=>'all sections']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'order' => 'required|integer', //integer : number
        ]);

        // if validate fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->error()],400);
        }

        $section =Section::create($request->all());

        return response()->json(['data'=> $section, 'message'=>'Section created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = Section::find($id);
        if (!$section) {
            return response()->json(['error'=>'section not found'],404);
        }

        return response()->json(['data'=>$section,'message'=> 'section retrieved successfully']);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
