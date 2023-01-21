<?php

namespace App\Http\Controllers\Api\FoodManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return new CategoryResource('success', 'Categories fetched successfully', $categories);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:categories',
            ]);

            if ($validator->fails()) {
                return new CategoryResource('error', $validator->errors()->first(), null);
            }

            $category = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'uuid' => Str::uuid(),
            ]);

            return new CategoryResource('success', 'Category created successfully', $category);
        } catch (\Exception $e) {
            return new CategoryResource('error', $e->getMessage(), null);
        }
    }

    public function show($slug)
    {
        try {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                return new CategoryResource('error', 'Category not found', null);
            }

            $foods = $category->foods()->get();

            return new CategoryResource('success', 'Category fetched successfully', $foods);
        } catch (\Exception $e) {
            return new CategoryResource('error', $e->getMessage(), null);
        }
    }

    public function update(Request $request, $uuid)
    {
        try {

            $category = Category::where('uuid', $uuid)->first();
            if (!$category) {
                return new CategoryResource('error', 'Category not found', null);
            }
            
            if ($category->name != $request->name) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255|unique:categories',
                ]);

                if ($validator->fails()) {
                    return new CategoryResource('error', $validator->errors()->first(), null);
                }
                $category->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                ]);

                return new CategoryResource('success', 'Category updated successfully', $category);
            }

            return new CategoryResource('success', 'Category not updated', $category);

            
        } catch (\Exception $e) {
            return new CategoryResource('error', $e->getMessage(), null);
        }
    }

    public function destroy($uuid)
    {
        try {
            $category = Category::where('uuid', $uuid)->first();
            if (!$category) {
                return new CategoryResource('error', 'Category not found', null);
            }

            $category->delete();

            return new CategoryResource('success', 'Category deleted successfully', null);
        } catch (\Exception $e) {
            return new CategoryResource('error', $e->getMessage(), null);
        }
    }
}
