<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    
    public function show(Request $request, Category $category)
    {
        $topics = Topic::with(['user','category'])
            ->where('category_id', $category->id)
            ->withOrder($request->order)
            ->paginate(20)
            ->appends($request->query());
        return view('topics/index', compact('topics', 'category'));
    }
}
