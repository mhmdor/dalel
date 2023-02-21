<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Subcity;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function createPlace(Request $request)
    {
        if ($request->method() == 'GET') {
            $cities = Subcity::get();
            $Bcities = City::get();
            $categories = Category::get();
            return view('admin.create-place', compact('cities', 'Bcities', 'categories'));
        }
        if ($request->method() == 'POST') {

            $validator = $request->validate([
                'name'      => 'required|string',
                'description' => 'string|nullable',
                'address' => 'string|nullable',
                'mobile' => 'required|numeric',
                'telephone' => 'required|numeric',
            ]);

            $image = $request->file('logo');
            $destinationPathImg = public_path('uploads/logos/');
            if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
                return 'Error saving the file.';
            }

            $logo = $image->getClientOriginalName();

            Place::create([
                'name' => $request->name,
                'telephone' => $request->telephone,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'subcity_id' => $request->subcity_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'logo' => $logo,




            ]);

            return redirect()->route('admin.home')->with('success', 'تم انشاء المنشاة بنجاح');
        }
    }


    public function getcityById($id)
    {
        $city = City::find($id);
        $subcity = $city->subCity;
        return $subcity;
    }

    public function getplaceById($id)
    {
        $city = City::find($id);
        $place = $city->place->where('subcity_id', '1')->where('category_id', '2');
        return view('place', compact('place'));
    }


    public function searchplace(Request $request)
    {
        if ($request->method() == 'GET') {
            $cities = Subcity::get();
            $Bcities = City::get();
            $categories = Category::get();
            return view('user.search', compact('cities', 'Bcities', 'categories'));
        }
        if ($request->method() == 'POST') {

            $city = City::find($request->city_id);
            $place = $city->place->where('subcity_id', $request->subcity_id)->where('category_id', $request->cat_id);
            return view('user.resultSearch', compact('place'));
        }
    }

    public function getplace( $id)
    {
        $place = Place::find($id);
        
        return view('user.singleplace',compact('place'));
    }

    

    // public function search(Request $request)
    // {

    //     $place = Place::orwhere('name', 'like', '%' . $request->search . '%')
    //         ->orwhere('description', 'like', '%' . $request->search . '%')
    //         ->orwhere('address', 'like', '%' . $request->search . '%')
    //         ->orderBy('id', 'DESC')
    //         ->get();
    // }
}
