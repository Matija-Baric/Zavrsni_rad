<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['brand', 'model', 'location', 'website', 'email','description','tags'];


    public function scopeFilter($query, array $filters){

        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('brand', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function id(){
        return $this->id;
    }

    public function brand(){
        return $this->brand;
    }

    public function location(){
        return $this->location;
    }

    public function model(){
        return $this->model;
    }

    public function email(){
        return $this->email;
    }

    public function user_id(){
        return $this->user_id;
    }
}

