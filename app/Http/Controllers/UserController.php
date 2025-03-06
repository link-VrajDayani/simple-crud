<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkModel;


class UserController extends Controller
{
    public function view()
    {
        return View('welcome');
    }
    public function firstview()
    {
        $cities = ['Mumbai', 'Ahmedabad', 'bengaluru', 'Chennai', 'Hyderabad'];
        return view('first', compact('cities'));
    }
    public function secondview()
    {
        $allData = checkModel::all();
        // dd($allData); 
        // foreach ($allData as $data) {
        //     $data->hobbies = json_decode($data->hobbies, true );
        // }
        return View('second', compact('allData'));
    }
    public function dataCreate(Request $request)
    {
        // dd($request->all());
        $hobbies = $request->hobbies ? implode(',', $request->hobbies) : '';

        $image = $request->file;
        $fileNAme = time().$image -> getClientOriginalName();
        $image -> move(public_path('Images/') , $fileNAme);

        checkModel::updateorcreate([
            "id" => $request->id 
        ],[
            "name" => $request->name,
            "surname" => $request->surname,
            "gender" => $request->gender,
            "hobbies" => $hobbies,
            // "hobbies" => json_encode($request->hobbies ?? []),
            'city' => $request->city,
            'file' => $fileNAme,

        ]);
        return redirect()->route('second')->with('success', 'Form submitted successfully!');
    }

    public function dataSearch(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
        $allData = CheckModel::where('name', 'like', "%{$search}%")
                ->orWhere('surname', 'like', "%{$search}%")
                ->get();
        } else {
            $allData = CheckModel::all(); 
        }
        
        return view('second', compact('allData'));
    }

    public function dataDelete($id)
    {
        // dd($id);

        $deleteRecord = checkModel::find($id);
        // dd($deleteRecord);
        $deleteRecord -> delete();

        return redirect()->back();
    }

    public function dataEdit($id)
    {
        $editRecord = checkModel::find($id);
        $editRecord->hobbies = explode(',', $editRecord->hobbies ?? '');
        $cities = ['Mumbai', 'Ahmedabad', 'bengaluru', 'Chennai', 'Hyderabad'];
        return view('first', compact('editRecord', 'cities'));
    }

}

?>
