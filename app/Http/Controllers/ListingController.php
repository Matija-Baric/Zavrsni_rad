<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Listing;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;
use App\Models\Reservation as ModelsReservation;

class ListingController extends Controller
{
    public function data(){
        $res = DB::table('reservations')->select('id','listing_id','Start_date','End_date','price')->get();

        return view('schedule')->with('reservations',$res);
    }



    public function index() {
            return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    public function show(Listing $listing, Reservation $reservation) {
        return view('listings.show', [
            'listing'=> $listing, 'reservation' => $reservation]);
    }


    //Show create Form
    public function create(){
        return view('listings.create');
    }


    //Show schedule
    public function schedule(Listing $listing, Request $request){
         
        $reservations = DB::table('reservations')->select('id','listing_id','Start_date','End_date','Price_per_day', 'brand','model','user_id', 'location','email','Total_price')->get();

        $id =auth()->id();
        return view('listings.reservation_schedule', compact('reservations', 'id'));

    }



    //Store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([
            'brand'=> 'required',
            'model' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Car created!');
    }

    //Show create-reservation Form
    public function reservation(Listing $listing){
        return view('listings.create-reservation', ['listing' => $listing]);
    }

    //Store Reservation Data
    public function store_reservation(Request $request, Listing $listing){
        $formFields = $request->validate([
            'Start_date'=> 'required',
            'End_date'=> 'required',
            'Price_per_day'=> 'required',
            
        ]);

        $formFields['listing_id'] = $listing->id();
        $formFields['brand'] = $listing->brand();
        $formFields['model'] = $listing->model();
        $formFields['location'] = $listing->location();
        $formFields['user_id'] = auth()->id();
        $formFields['email'] = $listing->email();

        $days1 = strtotime($request->Start_date);
        $days2 = strtotime($request->End_date);
        $diff = $days2 - $days1;
        $num_of_days = abs(round($diff / 86400));  
        $price = $request->Price_per_day;
        $total_price = $num_of_days * $price;

        $formFields['Total_price'] = $total_price;

        Reservation::create($formFields);

        return redirect('/')->with('message', 'Reservation made successfully!');
    }




    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'brand'=> 'required',
            'model' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        return  back()->with('message', 'Car updated successfully!');
    }

    //Delete Listing
    public function destroy(Listing $listing){
        
        $listing->delete();
        return redirect('/')->with('message', 'Car Deleted Succesfully');
    }


    public function delete_reservation(Reservation $reservation){
        $reservation->delete();
        return redirect('/')->with('message', 'Reservation Deleted Succesfully');
    }

    //Manage Listings
     public function manage(){

        $listings = DB::table('listings')->select('id','user_id','brand','logo','tags', 'model','location','price', 'description','email')->get();
        return view('listings.manage', compact('listings'));
/*         return view('listings.manage',['listings' => auth()->user()->listings()->get()]);
 */    } 

}
