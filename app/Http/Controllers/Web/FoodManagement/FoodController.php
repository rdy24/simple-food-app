<?php

namespace App\Http\Controllers\Web\FoodManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();
        return view('pages.food.index', compact('foods'));
    }

    public function create() {
        $categories = Category::all();
        return view('pages.food.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'uuid' => Str::uuid(),
        ]);

        return redirect()->route('dashboard.food.index')->with('success', 'Food created successfully');
    }

    public function show($uuid) {
        $food = Food::where('uuid', $uuid)->first();
        return view('pages.food.show', compact('food'));
    }

    public function edit($uuid) {
        $categories = Category::all();
        $food = Food::where('uuid', $uuid)->first();
        return view('pages.food.edit', compact('food', 'categories'));
    }

    public function update(Request $request, $uuid) {
        $food = Food::where('uuid', $uuid)->first();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if ($food->name != $request->name) {
            $food->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('dashboard.food.index')->with('success', 'Food updated successfully');
    }

    public function destroy($uuid) {
        $food = Food::where('uuid', $uuid)->first();
        $food->delete();
        return redirect()->route('dashboard.food.index')->with('success', 'Food deleted successfully');
    }
}
