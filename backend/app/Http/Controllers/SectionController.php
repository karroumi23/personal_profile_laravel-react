<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Random\Engine\Secure;

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
        $data= $request->validate([
                'name' => 'string',
                'type' => 'string',
                'order' => 'integer',
                'fuelds'=>'array',
        ]);
      //Find the Section by its ID in the database.
        $section = Section::find($id);
      //If no section found, return a 404
        if (!$data) {
          return response()->json(['error'=>'Section not found'],404);
        }
      //Update section's attributes with new data.
        $section->update($data);
      //If the request contains "fields", handle them one by one.
      // This means: The frontend sent a list of fields that belong to this section.
        if ($request->has('fields')) {
           foreach($request->fields as $fieldData)
            {
                // Try to find the existing field by its ID (inside this section)
                $field = $section->fields()->where('id',$fieldData['id'])->first();
                if ($field) {
                    $field->update($fieldData);//If field exists → update it with new data
                }else{
                    $section->fields()->create($fieldData); //If field does not exist → create a new one
                }
            }
        }

     return response()->json(['data'=>$section, 'message'=>'Section updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json(['error'=>'Section not found'],404);
        }

        $section->fields()->delete(); //optional delete fields with section 
        $section::delete();
    }
}
