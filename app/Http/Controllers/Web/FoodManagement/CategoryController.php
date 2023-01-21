<?php

namespace App\Http\Controllers\Web\FoodManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    }

    public function create() {
        return view('pages.category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'uuid' => Str::uuid(),
        ]);

        return redirect()->route('dashboard.category.index')->with('success', 'Category created successfully');
    }

    public function show($slug) {
        $category = Category::where('slug', $slug)->first();
        $foods = $category->foods;
        return view('pages.category.show', compact('foods', 'category'));
    }

    public function edit($uuid) {
        $category = Category::where('uuid', $uuid)->first();
        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, $uuid) {
        $category = Category::where('uuid', $uuid)->first();
        $request->validate([
            'name' => 'required',
        ]);

        if ($category->name != $request->name) {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
        }

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($uuid) {
        $category = Category::where('uuid', $uuid)->first();
        $category->delete();
        return redirect()->route('dashboard.category.index')->with('success', 'Category deleted successfully');
    }
}
