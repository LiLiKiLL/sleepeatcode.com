<?php
namespace App\Http\Controllers\Motto;

use App\Http\Controllers\Controller;
use App\Models\Motto;
use DB;

class MottoController extends Controller {
    public function index() {
        return "welcome";
    }

    public function home() {
        $mottos = Motto::all();

        return view('motto.home', compact('mottos'));
    }

    public function detail(Motto $motto) {
        return view('motto.detail', compact('motto'));
    }
}