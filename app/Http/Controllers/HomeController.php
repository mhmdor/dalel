<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Discount;
use App\Models\Owner;
use App\Models\slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function index()

    {

        $slides = slide::get();
        if (Auth::user()) {
            $is_premium = Auth::user()->is_premium;
            $copouns = Coupon::where('Expiration_date', '>', Carbon::now()->addHours(3))->get();
            $discount = Discount::where('Expiration_date', '>', Carbon::now()->addHours(3))->get();
            return view('home', compact('copouns', 'slides', 'discount','is_premium'));
        }
        else{
            $copouns = Coupon::where('Expiration_date', '>', Carbon::now()->addHours(3))->get();
            $discount = Discount::where('Expiration_date', '>', Carbon::now()->addHours(3))->get();
            $is_premium = 2; 
            return view('home', compact('copouns', 'slides', 'discount','is_premium'));
        }

        
    }

    public function premium()
    {
        return view('premium');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function ownerHome()
    {
        $owner_id = auth('owner')->user()->id;
        $owner = Owner::find($owner_id);
        $discount =   $owner->place->discount;
        return view('owner.dashboard', compact('owner', 'discount'));
    }
}
