<?php

namespace App\Repositories\Blog;


use App\Models\Blog;
use App\Repositories\BaseRepositories;

class BlogRepository extends BaseRepositories implements BlogRepositoryInterface
{

    public function getModel()
    {
       return Blog::class;
    }
    public function getLatestBlogs($perPage = 6)
    {
        return $this->model->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }


}
