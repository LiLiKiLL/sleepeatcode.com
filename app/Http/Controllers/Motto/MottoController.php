<?php
namespace App\Http\Controllers\Motto;

use App\Http\Controllers\BaseController;
use App\Models\Motto\Motto;
use DB;

class MottoController extends BaseController {
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