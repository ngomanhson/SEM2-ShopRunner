<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepository;
use App\Service\Blog\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogRepository;
    private $blogService;

    public function __construct(BlogRepository $blogRepository, BlogService $blogService)
    {
        $this->blogRepository = $blogRepository;
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogRepository->getLatestBlogs();

        return view('front.blog.index', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = $this->blogService->findBySlug($slug);
        $title = $blog->title;
        $subtitle = $blog->subtitle;
        $image = $blog->image;
        $category = $blog->category;
        $content = $blog->content;

        return view('front.blog.detail', compact('blog', 'title', 'subtitle', 'image', 'category'));
    }

}
