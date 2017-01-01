<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

class PageController extends Controller {
    public function home() {
        $people = ['Amy', 'Boron', 'Chris'];
        return view('pages.about')->with('people', $people);// resources/views/pages/about.blade.php
    }
}
