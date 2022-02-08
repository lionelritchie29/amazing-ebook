<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'account_id';

    protected $fillable = ['account_id', 'role_id', 'gender_id', 'first_name', 'last_name', 'middle_name', 'email', 'password', 'display_picture_link', 'modified_at', 'modified_by'];
}
