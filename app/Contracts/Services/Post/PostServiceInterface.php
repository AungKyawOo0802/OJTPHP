<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    //get Post list
    public function getPostList($request);
  
    //insert Post
    public function insertPost($request);

    //delete Post
    public function deletePost($id);

    //search Post
    public function searchPost($id);

    //updatePost
    public function updatePost($request);
}
