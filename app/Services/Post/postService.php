<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    /**
     * Class Constructor
     * @param OperatorPostDaoInterface
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Get Post List
     * @param Object
     * @return $PostList
     */
    public function getPostList($request)
    {
        return $this->postDao->getPostList($request);
    }

    /**
     * Insert Post
     * @param Request
     */
    public function insertPost($request)
    {
        return $this->postDao->insertPost($request);
    }

    /**
     * Delete Post
     * @param Post Id
     */
    public function deletePost($id)
    {
        return $this->postDao->deletePost($id);
    }

    /**
     * Search Posts
     * @param Post Id
     */
    public function searchPost($id)
    {
        return $this->postDao->searchPost($id);
    }

    /**
     * Update Post
     * @param Request
     */
    public function updatePost($request)
    {
        return $this->postDao->updatePost($request);
    }
}
