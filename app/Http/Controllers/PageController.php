<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class PageController extends BaseController {
    public function home() {
        $people = ['Amy', 'Boron', 'Chris'];
        return view('pages.about')->with('people', $people);// resources/views/pages/about.blade.php
    }
}
