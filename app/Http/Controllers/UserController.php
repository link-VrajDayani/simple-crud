<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkModel;
use App\Models\City;

class UserController extends Controller
{
    public function view()
    {
        return view('welcome');
    }


public function firstview()
{
    $cities = City::pluck('name');
    return view('first', compact('cities'));
}

    public function secondview()
    {
        $allData = checkModel::all();
        return view('second', compact('allData'));
    }

    public function dataCreate(Request $request)
{
    $hobbies = $request->hobbies ? implode(',', $request->hobbies) : '';

    $record = checkModel::find($request->id);
    $fileName = $record ? $record->file : null;

    if ($request->hasFile('file')) {
        $image = $request->file;
        $fileName = time() . $image->getClientOriginalName();
        $image->move(public_path('Images/'), $fileName);
    }

    checkModel::updateOrCreate(
        ["id" => $request->id],
        [
            "name" => $request->name,
            "surname" => $request->surname,
            "gender" => $request->gender,
            "hobbies" => $hobbies,
            "city" => $request->city,
            "file" => $fileName,
        ]
    );

    return redirect()->route('second')->with('success', 'Form submitted successfully!');
}

    public function dataSearch(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $allData = checkModel::where('name', 'like', "%{$search}%")
                ->orWhere('surname', 'like', "%{$search}%")
                ->get();
        } else {
            $allData = checkModel::all();
        }
        
        return view('second', compact('allData'));
    }

    public function dataDelete($id)
    {
        $deleteRecord = checkModel::find($id);
        $deleteRecord->delete();

        return redirect()->back();
    }

    public function dataEdit($id)
{
    $editRecord = checkModel::find($id);
    $editRecord->hobbies = explode(',', $editRecord->hobbies ?? '');
    $cities = City::pluck('name');

    return view('first', compact('editRecord', 'cities'));
}
}