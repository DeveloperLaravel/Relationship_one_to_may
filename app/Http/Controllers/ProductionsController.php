<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = Production::all();
        return view('production.index',compact('productions'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('production.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:7',
        ],[
            'first_name' => 'من فضلك ادخل الاسم',
        ]);
        Production::create($request->all());
        return redirect()->route('production.index')
        ->with('success','تمت اظافات اسم جديد');

    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        return view('production.show',compact('production'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        return view('production.edit',compact('production'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        $request->validate([
            'first_name' => 'required|max:9',
        ],[
            'first_name' => 'من فضلك ادخل الاسم',
        ]);

        $production->update($request->all());
        return redirect()->route('production.index')
        ->with('success','تم تعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        $production->delete();
        return redirect()->route('production.index')
                        ->with('success','تم حذف بنجاح');
    }
}
