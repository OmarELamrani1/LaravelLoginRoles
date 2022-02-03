<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PharmacieResource;
use App\Models\Pharmacies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacieController extends Controller
{

    public function index()
    {
        $data = Pharmacies::where('date', Carbon::today())->get();
        return response()->json([PharmacieResource::collection($data), 'Pharmacies fetched.']);
    }

    public function search($search){
        if ($search != null) {
            $data = Pharmacies::where('date', $search)->get();
        }
        else{
            $data = Pharmacies::where('date', Carbon::today())->get();
        }
        return response()->json([PharmacieResource::collection($data), 'Pharmacies fetched.']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'designation' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $Pharmacies = Pharmacies::create([
            'designation' => $request->designation,
            'description' => $request->description,
            'date' => $request->date
         ]);
        
        return response()->json(['Pharmacie created successfully.', new PharmacieResource($Pharmacies)]);
    }

    public function show($id)
    {
        $Pharmacies = Pharmacies::find($id);
        if (is_null($Pharmacies)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new PharmacieResource($Pharmacies)]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Pharmacies $pharmacies)
    {
        $validator = Validator::make($request->all(),[
            'designation' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'date'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $pharmacies->designation = $request->designation;
        $pharmacies->description = $request->description;
        $pharmacies->date = $request->date;
        $pharmacies->save();
        
        return response()->json(['Pharmacie updated successfully.', new PharmacieResource($pharmacies)]);
    }

    public function destroy($id)
    {
        $pharmacie = Pharmacies::findOrFail($id);
        
        $pharmacie->delete();
        
        return redirect()->back();

        // return response()->json('Pharmacie deleted successfully');
    }
}
