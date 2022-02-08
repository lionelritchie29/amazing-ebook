<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'order_id';

    protected $fillable = ['account_id', 'ebook_id', 'order_date'];

    public function ebook() {
        return $this->hasOne(Ebook::class, 'ebook_id', 'ebook_id');
    }
}
