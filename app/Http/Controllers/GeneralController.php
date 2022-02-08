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

    public function afterAction(Request $request) {
        $message = $request->query('message');
        $redirect = $request->query('redirect');
        return view('after_action', ['message' => $message, 'redirect' => $redirect]);
    }
}
