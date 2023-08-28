<?php

namespace App\Http\Controllers;

use App\Models\Descriptions;
use App\Models\Production;
use Illuminate\Http\Request;

class DescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('descriptions.index')->with('descriptions', Descriptions::all());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('descriptions.create')->with('productions', Production::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'production_id' => 'required|max:7',
        ],[
            'name' => 'من فضلك ادخل الاسم',
            'production_id' => 'من فضلك ادخل الوصف',
        ]);
        Descriptions::create([
            'name' => $request->name,
            'production_id' => $request->production_id,
        ]);

        return redirect()->route('description.index')
        ->with('success','تمت اظافات اسم جديد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Descriptions $descriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $descriptions = descriptions::find($id);
         return view('descriptions.create',['descriptions' => $descriptions,'productions' => Production::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // flash message


        $this->validate($request, [

            'name' => 'required|max:9',
            'production_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'production_id.required' =>'يرجي ادخال البيان',

        ]);

        $descriptions = Descriptions::findorFail($id);
        $descriptions->update($request->only('name','production_id'));


        session()->flash('success', 'تم تعديل بنجاح');
        // redirect user
        return redirect()->route('description.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Descriptions::find($id)->delete();
        return redirect()->route('description.index')
                        ->with('success','تم حذف بنجاح  ');
                                // flash message
        // redirect user

    }
}
