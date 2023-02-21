<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Models\Pokemon;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pokemon::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'stat' => 'required'
            ]);

            $pokemon = Pokemon::create([
                'name' => $request->name,
                'type' => $request->type,
                'stat' => $request->stat
            ]);

            $data = Pokemon::where('id', $pokemon->id)->get(); 

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        }
        catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pokemon::where('id', $id)->get(); 

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        try {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'stat' => 'required'
            ]);

            $pokemon = Pokemon::findOrFail($id);

            $pokemon->update([
                'name' => $request->name,
                'type' => $request->type,
                'stat' => $request->stat
            ]);

            $data = Pokemon::where('id', '=', $pokemon->id)->get(); 

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        }
        catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $pokemon = Pokemon::findOrFail($id);

            $data = $pokemon->delete(); 

            if($data){
                return ApiFormatter::createApi(200, 'Successfully Destroyed');
            }
            
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        }
        catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
