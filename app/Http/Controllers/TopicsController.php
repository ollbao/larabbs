<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::with(['user','category'])
            ->withOrder($request->order)
            ->paginate(20)
            ->appends($request->query());
        return view('topics.index', compact('topics'));
    }

    public function show()
    {
        echo 'aaaaa';
    }
}
