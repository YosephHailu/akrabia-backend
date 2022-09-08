<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\OfficeType;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offices = Office::orderBy('id', 'asc');
        if ($request->q) {
            $offices = $offices->where('name', 'Like', "%$request->q%");
        }
        if ($request->region_id) {
            $offices = $offices->where('region_id', $request->region_id);
        }

        $officeTypes = OfficeType::all();

        return view('office.office_list')->with(['offices' => $offices->paginate(35), 'officeTypes' => $officeTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::where('status', true)->get();
        return view('office.office_add')->with('regions', $regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'manager' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        if ($request->hasFile('logo')) {
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . 'office.' . $extension;
            $path = $request->file('logo')->storeAs('public/uploads/office', $fileNameToStore);
            $fileNameToStore = url('/') . '/storage/uploads/office/' . $fileNameToStore;
        } else {
            $fileNameToStore = url('/') . '/storage/uploads/office/' . "placeholder.png";
        }

        $office = Office::create([
            'manager' => $request->manager,
            'name' => $request->name,
            'establishment_year' => $request->establishment_year,
            'photo' =>  $fileNameToStore,
            'secondary_phone' => $request->secondary_phone,
            'phone' => $request->phone,
            'region_id' => $request->region_id,
            'status' => $request->status == "on" ? true : false,
            'description' => $request->description,
        ]);
            
        return redirect(route('office.index'))->with('success', 'Office inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
        return view('office.office_detail')->with(['office' => $office]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        $regions = Region::where('status', true)->get();
        return view('office.office_add')->with(['regions' => $regions, 'office' => $office]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'manager' => 'required',
        ]);

        if ($request->hasfile('logo')) {
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . 'office.' . $extension;
            $path = $request->file('logo')->storeAs('public/uploads/office', $fileNameToStore);
            $fileNameToStore = url('/') . '/storage/uploads/office/' . $fileNameToStore;
        } else {
            $fileNameToStore = $office->photo;
        }

        $office->update([
            'manager' => $request->manager,
            'name' => $request->name,
            'establishment_year' => $request->establishment_year,
            'photo' =>  $fileNameToStore,
            'secondary_phone' => $request->secondary_phone,
            'phone' => $request->phone,
            'region_id' => $request->region_id,
            'status' => $request->status == "on" ? true : false,
            'description' => $request->description,
        ]);

        return redirect(route('office.index'))->with('success', ' is Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
