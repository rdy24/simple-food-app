<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countCategory = Category::count();
        $countFood = Food::count();
        return view('pages.dashboard', compact('countCategory', 'countFood'));
    }
}
