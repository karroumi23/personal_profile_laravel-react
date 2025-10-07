<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = page::all();
        if (count($pages) > 0) { //if there is data
            return response()->json(['data' => $pages,        //get data  //[...] JSON body
                                     'message' => 'all pages' //and send this msg
                                    ])->setStatusCode(200);   //http Status
        }else{
             return response()->json(['data'=>[], //empty data
                                      'message' => 'no pages found yet'
                                    ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
                'title'=>'required|string',
                'content'=>'string',
                'slug'=>'required|string|unique:pages',
                'is_published' => 'required|boolean',
        ]);

        $page = page::create($data);

        if ($page) {
            return response()->json(['data'=>$page,
                                     'message'=>'page created successfly'
                                    ])->setStatusCode(201);
        }else{
            return response()->json(['data'=>[],
                                     'message'=>'failed to create page'
                                    ])->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
       $page = page::where('slug',$slug)->first(); //where : 'slug'= $slug (like where id ...)
       if ($page) {
        return response()->json(['data'=>$page,
                                 'message'=>'page found'
                                ])->setStatusCode(200);
       }else{
          return response()->json(['data'=>[],
                                     'message'=>'page not found'
                                    ])->setStatusCode(404);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Find the page by ID
          $page = page::find($id);
        // 2. Update the record with new values from the request
          $is_updated = $page->update([
                        'title' => $request->input('title'), //// update the title field
                        'content' => $request->input('content'),
                        'slug' => $request->input('slug'),
                        'is_published' => $request->input('is_published'),
        ]);
        if ($is_updated) {
            return response()->json(['data' => $page,'message' =>'page Updated'])->setStatusCode(200);
        }else{
            return response()->json(['data' => [],'message' =>'failed to Updated'])->setStatusCode(400); //400 bad request
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = page::find($id);
         $is_deleted = $page::delete();
         if ($is_deleted ) {
            return response()->json(['data' => $page,'message' =>'page deleted'])->setStatusCode(200);
        }else{
            return response()->json(['message' =>'failed to deleted'])->setStatusCode(400); //400 bad request
        }

    }
}
