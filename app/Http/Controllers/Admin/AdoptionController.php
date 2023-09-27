<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdoptionStatusRequest;
use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index()
    {
        return view('admin.adoptions.index');
    }

    public function update(UpdateAdoptionStatusRequest $request, Adoption $adoption){
        
        $adoption->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.adoptions.index')->with('success','Adoption Status Successfully Updated');
    }
}
