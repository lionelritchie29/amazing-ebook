<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function show($id) {
        $ebook = Ebook::find($id);
        return view('ebooks.detail', ['ebook' => $ebook]);
    }
}
