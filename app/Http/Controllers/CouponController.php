<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Coupon;
use App\Models\Place;
use App\Models\Subcity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $coupon =  Coupon::get()->all();
        return view('admin.getcoupon', compact('coupon'));
    }


    public function create()
    {
        $places = Place::get();
        return view('admin.CreateCoupon', compact('places'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'description' => 'string|nullable',
            'image' => 'required',
            'role' => 'required',
            'value' => 'required',
        ]);


        $image = $request->file('image');
        $destinationPathImg = public_path('uploads/coupons/');
        if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
            return 'Error saving the file.';
        }

        $image = $image->getClientOriginalName();
        $coupon = Coupon::create([

            'place_id' => $request->place_id,
            'is_featured' => $request->is_featured,
            'description' => $request->description,
            'role' => $request->role,
            'value' => $request->value,
            'image' => $image,
            'Expiration_date' => $request->Expiration_date,

        ]);
        if ($coupon) {
            return redirect()->route('admin.home')->with('success', 'تم انشاء الجائزة بنجاح');
        } else {
            return redirect()->route('admin.home')->with('success', 'عذرا فشلت العملية');
        }
    }


    public function usercopoun($id)
    {

        $user = Auth::user();

        if ($user->copoun->where('id', $id) != '[]') {
            return redirect()->back()->with('failed', 'عذرا تم التقديم مسبقا لهذه المسابقة');
        }

        $user->copoun()->syncWithoutDetaching($id);
        return redirect()->back()->with('success', 'تم التقديم نتمنى لك حظ جيد');
    }


    public function finishcopoun()
    {
        $copuns =  Coupon::where('Expiration_date', '<', Carbon::now()->addHours(3));

        $copuns->update([
            'status' => '1',
        ]);
    }


    public function alluser($id)
    {


        $coupon =  Coupon::where('id', $id)->first();
        $users =  $coupon->users()->get();
        return view('admin.users', compact('users'));
    }

    public function winnerusers($id)
    {


        $coupon =  Coupon::where('id', $id)->first();
        $users =  $coupon->users()->inRandomOrder()->limit(4)->get();
        return view('admin.winners', compact('users', 'coupon'));
    }

    public function getwinner($id)
    {

        $user = User::find($id);
        return view('admin.getwinner', compact('user'));
    }

    public function getgift($id)
    {

        $coupon =  Coupon::where('id', $id)->first();
        $users =  $coupon->users()->count();
        return view('admin.getgift', compact('users','coupon'));
    }


    public function getcouponById($id)
    {
        // $city = Place::find($id);
        //        $city->coupon;

        $city = City::find($id)->coupon();

        // $place = $city->place->where('subcity_id', '1')->where('category_id', '2');
        return view('place', compact('city'));
    }




    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
