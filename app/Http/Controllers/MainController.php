<?php

namespace App\Http\Controllers;

use App\VueCrudData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{

    public function storeItem(Request $request) {
//        dd($request->all());

        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'age'  =>  'required',
            'profession'  =>  'required',
        ]);

        if ($validator->fails()) {
           return json_encode(['error'=>$validator->errors()->first()]);
        }

        $data = new VueCrudData();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->profession = $request->profession;
        $data->save ();

        return 'Added Successfully !';
    }

    public function readItems() {
//        dd('as');
        $data = VueCrudData::all ();
        return $data;
    }

    public function editItem(Request $request, $id){
//        dd($request->all());
        $data =VueCrudData::find($id);

        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'age'  =>  'required',
            'profession'  =>  'required',
        ]);

        if ($validator->fails()) {
            return json_encode(['error'=>$validator->errors()->first()]);
        }
//        dd($request->all());
        $data->name = $request->get('name');
        $data->age = $request->get('age');
        $data->profession = $request->get('profession');
        $data->save();
//        return $data;
        return 'Updated Successfully !';
    }

    public function deleteItem(Request $request) {
//        dd($request->id);
        $data = VueCrudData::find ( $request->id )->delete ();
//        return with('alert','Deleted Successfully !');
    }

}
