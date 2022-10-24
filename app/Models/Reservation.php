<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    //protected $fillable = ['brand', 'model', 'location', 'website', 'email','description','tags'];


    //Relationship to User
    public function listing_reservation(){
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function filter($query,  $filters){

        if($filters['search_reservation'] ?? false){
            $query->where('brand', 'like', '%' . request('search') . '%')
            ->orWhere('model', 'like', '%' . request('search') . '%')
            ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }

    /* public function id(){
        return $this->id;
    } */
}
