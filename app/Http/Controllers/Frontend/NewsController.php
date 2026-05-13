<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news_data = News::where('status', 1)
            ->latest()
            ->paginate(9);

        return view('frontend.news.index', compact('news_data'));
    }

    public function details($slug)
    {
        $news = News::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('frontend.news.details', compact('news'));
    }
}