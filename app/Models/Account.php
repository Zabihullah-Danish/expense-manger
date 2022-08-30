<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','account_number','currency','initial_amount','account_for',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function incomes(){
        return $this->hasMany(Income::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
