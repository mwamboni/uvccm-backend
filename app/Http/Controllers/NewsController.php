<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\NewsCategoryRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsCategoryResource;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsCategory($categoryId)
    {
        $categories = NewsCategory::findOrFail($categoryId);
        return ApiResponse::success(new NewsCategoryResource($categories), 'Category fetched successfully');
    }

    public function getNewsCategories()
    {
        $categories = NewsCategory::get();
        return ApiResponse::success(NewsCategoryResource::collection($categories), 'Categories fetched successfully');
    }

    public function getNews()
    {
        $news = News::orderByDesc('created_at')->get();
        return ApiResponse::success(NewsResource::collection($news), 'News fetched successfully');
    }

    public function getNewsByCategory($categoryId)
    {
        $news = News::where('news_category_id', $categoryId)->get();
        return ApiResponse::success(NewsResource::collection($news), 'News fetched successfully');
    }

    public function getNew($newsId)
    {
        $news = News::findOrFail($newsId);
        return ApiResponse::success(new NewsResource($news), 'News fetched successfully');
    }

    public function createNewsCategory(NewsCategoryRequest $req)
    {
        $req->validated();

        $newsCategory = NewsCategory::create(['name' => $req->name]);

        return ApiResponse::success(new NewsCategoryResource($newsCategory), 'Category created successfully');
    }

    public function updateNewsCategory(NewsCategoryRequest $req, $categoryId)
    {
        $req->validated();

        NewsCategory::findOrFail($categoryId)->update(['name' => $req->name]);

        return ApiResponse::success([],'Category updated successfully');
    }

    public function createNews(NewsRequest $req)
    {
        $req->validated();

        $news = News::create([
            'news_category_id' => $req->news_category,
            'title' => $req->title,
            'description' => $req->description,
        ]);

        return ApiResponse::success(new NewsResource($news), 'News created successfully');
    }

    public function updateNews(NewsRequest $req, $newsId)
    {
        $req->validated();

        News::findOrFail($newsId)->update([
            'news_category_id' => $req->news_category,
            'title' => $req->title,
            'description' => $req->description,
        ]);

        return ApiResponse::success([],'News updated successfully');
    }
}
