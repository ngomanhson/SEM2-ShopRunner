<?php

namespace App\Service\Blog;


use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Service\BaseService;



class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->repository=$blogRepository;
    }
    public function getLatestBlogs($limit = 6)
    {
        return $this->repository->getLatestBlogs($limit);
    }

    public function findBySlug($slug)
    {
        return $this->repository->findBySlug($slug);
    }

}
