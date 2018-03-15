<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Http\Requests\StoreTopicPost;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Request $request)
    {
        $topics = Topic::with(['user','category'])
            ->withOrder($request->order)
            ->paginate(20)
            ->appends($request->query());
        return view('topics.index', compact('topics'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('topics.create_and_edit', compact('categories', 'topic'));
    }

    public function store(StoreTopicPost $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
        //dd($topic);
        return redirect()->route('topic.show', $topic->id)->with('message', '创建成功');
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }
}
