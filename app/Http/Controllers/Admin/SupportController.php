<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index() {
        $support = Support::all();
        
        return view('admin/supports/index', compact('support'));
    }
}
