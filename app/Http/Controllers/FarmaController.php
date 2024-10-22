<?php

namespace App\Http\Controllers;

use App\Models\Farmacos;
use Illuminate\Http\Request;

class FarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $farmacos = Farmacos::paginate(5); //para paginar la información
// para proceso de buscqueda 
        if(request('search')){
            $search = request('search');
            $farmacos= Farmacos::where('name','like',"%$search%")
            ->orWhere('barcode','like',"%$search%")
            ->orWhere('laboratory','like',"%$search%")
            ->paginate(5)
            ->withQueryString();

        }else{
            $farmacos = Farmacos::paginate(5);
        }




        return view('farmacos.index', [
            'farmacos'=>$farmacos
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('farmacos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'required|numeric|unique:farmacos,barcode', // Ensure barcode is unique´
            'laboratory' => 'required|string',
            'price_per_box' => 'required|numeric'

        ]);
        Farmacos::create($data);
        return redirect()->route('farmacos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmacos $farmacos)
    {
        return view('farmacos.show', [
            'farmacos' => $farmacos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmacos $farmaco)
    {
        return view('farmacos.edit', [
            'farmaco' => $farmaco
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmacos $farmaco)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:farmacos,name,' . $farmaco->id,
            'barcode' => 'required|numeric|unique:farmacos,barcode,' . $farmaco->id,
            'laboratory' => 'required|string',
            'price_per_box' => 'required|numeric'
        ]);
    
        $farmaco->fill($validatedData)->save();
    
        return redirect()->route('farmacos.index')->with('success', 'Fármaco actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmacos $farmaco)
    {
        $farmaco->delete();
        return redirect()->route('farmacos.index');
       
        
    }
}
