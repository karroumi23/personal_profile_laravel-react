<?php

namespace App\Http\Controllers;

use App\Models\SectionField;
use Illuminate\Http\Request;

class SectionFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectionfields = SectionField::all();
        return response()->json(['data'=>$sectionfields,'message'=>'All sections fields ']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'section_id'=>'required|integer|exists:section,id',
            'field_name'=>'required|string',
            'field_value'=>'required|string',

        ]);

        if (!$data) {
            return response()->json(['error' => 'Invalid data'],400);
        }

        $sectionFields = SectionField::create($data);
        return response()->json(['data'=>$sectionFields,'message'=>' Sections fields created successfully  ']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sectionField = SectionField::find($id);
        if (!$sectionField) {
            return response()->json(['message'=>'Section field not found'],404);

        }
        return response()->json(['data'=>$sectionField,'message'=>'retrieved successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sectionField = SectionField::find($id);
        if (!$sectionField) {
            return response()->json(['message'=>'Section field not found'],404);
        }
        $data = $request->validate([
            'section_id'=>'required|integer|exists:section,id',
            'field_name'=>'required|string',
            'field_value'=>'required|string',
        ]);

        if (!$data) {
            return response()->json(['message'=> 'invalid data'],400);
        }

        $sectionField->update($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $sectionField = SectionField::find($id);
        if (!$sectionField) {
            return response()->json(['message'=>'Section field not found'],404);
        }

        $sectionField->delete();
        return response()->json(['message'=>'Section field deleted successfully']);

    }
}
