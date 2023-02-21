<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Discount;
use App\Models\Discount_Users;
use App\Models\Place;
use App\Models\Subcity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Break_;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $discount =  Discount::get()->all();
        return view('admin.getdiscount', compact('discount'));
    }

    public function alluser($id)
    {


        $discount =  Discount::where('id', $id)->first();
        $users =  $discount->users()->get();
        return view('admin.users', compact('users'));
    }



    public function create()
    {
        $places = Place::get();
        return view('admin.CreateDiscount', compact('places'));
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
        $destinationPathImg = public_path('uploads/discounts/');
        if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
            return 'Error saving the file.';
        }

        $image = $image->getClientOriginalName();
        $coupon = Discount::create([

            'place_id' => $request->place_id,
            'is_featured' => $request->is_featured,
            'description' => $request->description,
            'value' => $request->value,
            'image' => $image,
            'Expiration_date' => $request->Expiration_date,
            'role' => $request->role,

        ]);
        if ($coupon) {
            return redirect()->route('admin.home')->with('success', 'تم انشاء الكوبون بنجاح');
        } else {
            return redirect()->route('admin.home')->with('success', 'عذرا فشلت العملية');
        }
    }



    public function userdiscount($id)
    {

        
        $user = Auth::user();

        if ($user->discount->where('id', $id) != '[]') {
            return redirect()->route('home')->with('failed', 'عذرا تم الحصول مسبقا على هذا الكوبون');
        }

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            . mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        Discount_Users::create([
            'status' => 0,
            'code' => $string,
            'discount_id' => $id,
            'user_id' => $user->id,
        ]);
        return redirect()->route('home')->with('success', 'تم التقديم نتمنى لك حظ جيد');
    }


    public function confirmCode(Request $request)
    {

        $discount = Discount::find($request->id);

        $users = $discount->users;

        $code = $request->code;

        $user = $discount->users()->where('discount_user.code', '=', $request->code)->first();
        $code_checkin = [];
        foreach ($users as $item) {
            $code1 = $item->pivot->code;
            array_push($code_checkin, $code1);
        }

        if (in_array($request->code, $code_checkin)) {

            $check = Discount_Users::where('code', $request->code)->first();

            if ($check->status == '0')
                return view('owner.codeAccess', compact('discount', 'user', 'code'));
            else return redirect()->back()->with('failed', 'عذرا الكود  مستخدم بالفعل ');
        } else return redirect()->back()->with('failed', 'عذرا الكود غير صالح , حاول مرة اخرى');
    }


    public function accessCode(Request $request)
    {
        $code = Discount_Users::where('code', $request->code)->first();
        $discount = Discount::find($request->discount_id)->value;
        $code->price_b = $request->price;
        $code->price_a = ($request->price * $discount) / 100;
        $code->updated_at = Carbon::now()->addHours(3);
        $code->status = 1;
        $code->update();
        return redirect()->route('owner.home')->with('success', 'تمت العملية بنجاح ');
    }


    public function discountUser()
    {
        $date = Carbon::now()->addHours(3);
        $discount_user = Auth::user()->discount->sortByDesc('created_at');

        return view('user.userdiscount', compact('discount_user', 'date'));
    }


    public function searchdiscountget()
    {
        $Bcities = City::get();
        return view('user.searchdiscount', compact('Bcities'));
    }

    public function searchdiscountpost(Request $request)
    {

        

        $city = City::find($request->city_id);

        $discount = $city->discount();
        $categories = Category::all();

        return view('user.resultSearchDiscount', compact('discount', 'categories'));
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
