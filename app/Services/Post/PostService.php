<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    public function __construct(PostDaoInterface $postDao)
    {
        $this->PostDao = $postDao;
    }

    public function getAllPost($user_id)
    {
        return $this->PostDao->getAllPost($user_id);
    }

    public function addNewPost($user_id, $name, $description, $created_at, $modified_at)
    {
        return $this->PostDao->addNewPost($user_id, $name, $description, $created_at, $modified_at);
    }

    public function deletePostById($user_id, $id)
    {
        return $this->PostDao->deletePostById($user_id, $id);
    }

    public function getPostById($id)
    {
        return $this->PostDao->getPostById($id);
    }

    public function updatePost($user_id, $id, $name, $description, $created_at, $modified_at)
    {
        return $this->PostDao->updatePost($user_id, $id, $name, $description, $created_at, $modified_at);
    }

    public function searchPostByName($user_id, $name)
    {
        return $this->PostDao->searchPostByName($user_id, $name);
    }

    public function getLatestPost()
    {
        return $this->PostDao->getLatestPost();
    }

}
