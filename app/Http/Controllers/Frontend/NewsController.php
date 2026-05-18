<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news_data_list = News::where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('frontend.news.index', compact('news_data_list'));
    }

    public function details($slug)
    {
        $news_detail = News::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        return view('frontend.news.details', compact('news_detail'));
    }
}