<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index() {
        return view('index');
    }

    public function home() {
        $ebooks = Ebook::all();
        return view('home', ['ebooks' => $ebooks]);
    }
}
