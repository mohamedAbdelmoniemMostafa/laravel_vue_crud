<?php

namespace App\Http\Controllers;

use App\VueCrudData;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function storeItem(Request $request) {
//        dd($request->all());
        $data = new VueCrudData();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->profession = $request->profession;
        $data->save ();
//        return $data;
        return 'Added Successfully !';
    }

    public function readItems() {
//        dd('as');
        $data = VueCrudData::all ();
        return $data;
    }

    public function editItem(Request $request, $id){
//        dd($request->all());
        $data =VueCrudData::where('id', $id)->first();
        $data->name = $request->get('val_1');
        $data->age = $request->get('val_2');
        $data->profession = $request->get('val_3');
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
