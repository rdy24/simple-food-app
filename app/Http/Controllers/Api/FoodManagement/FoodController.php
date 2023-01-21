<?php

namespace App\Http\Controllers\Api\FoodManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    public function index()
    {
        try {
            $foods = Food::with('category')->get();
            return new FoodResource('success', 'Foods fetched successfully', $foods);
        } catch (\Exception $e) {
            return new FoodResource('error', $e->getMessage(), null);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer',
                'description' => 'required|string',
            ]);

            if ($validator->fails()) {
                return new FoodResource('error', $validator->errors()->first(), null);
            }

            $food = Food::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'uuid' => Str::uuid(),
            ]);

            return new FoodResource('success', 'Food created successfully', $food);
        } catch (\Exception $e) {
            return new FoodResource('error', $e->getMessage(), null);
        }
    }

    public function show($uuid)
    {
        try {
            $food = Food::where('uuid', $uuid)->first();
            if (!$food) {
                return new FoodResource('error', 'Food not found', null);
            }

            return new FoodResource('success', 'Food fetched successfully', $food);
        } catch (\Exception $e) {
            return new FoodResource('error', $e->getMessage(), null);
        }
    }

    public function update(Request $request, $uuid)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'category_id' => 'integer',
                'description' => 'string',
            ]);

            if ($validator->fails()) {
                return new FoodResource('error', $validator->errors()->first(), null);
            }

            $food = Food::where('uuid', $uuid)->first();
            if (!$food) {
                return new FoodResource('error', 'Food not found', null);
            }



            $food->update([
                'name' => $request->filled('name') ? $request->name : $food->name,
                'category_id' => $request->filled('category_id') ? $request->category_id : $food->category_id,
                'description' => $request->filled('description') ? $request->description : $food->description,
            ]);

            return new FoodResource('success', 'Food updated successfully', $food);
        } catch (\Exception $e) {
            return new FoodResource('error', $e->getMessage(), null);
        }
    }

    public function destroy($uuid)
    {
        try {
            $food = Food::where('uuid', $uuid)->first();
            if (!$food) {
                return new FoodResource('error', 'Food not found', null);
            }

            $food->delete();

            return new FoodResource('success', 'Food deleted successfully', null);
        } catch (\Exception $e) {
            return new FoodResource('error', $e->getMessage(), null);
        }
    }
}
