<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['user','category'])->paginate(20);
        //$topics->fragment('aaaa');
        return view('topics.index', compact('topics'));
    }

    public function show()
    {
        echo 'aaaaa';
    }
}
