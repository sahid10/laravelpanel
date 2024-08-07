<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\user;
use App\Models\transaction;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $TotalProduct = product::count();
        $TotalUser = user::count();
        $TotalTransaction = transaction::count();

        // Pass data to the view
        return view('vendor.admin.home', compact('TotalProduct', 'TotalUser', 'TotalTransaction'));
    }
}
