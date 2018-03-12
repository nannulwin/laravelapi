<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    public function getAllPost($user_id);
    public function addNewPost($user_id, $name, $description, $created_at, $modified_at);
    public function deletePostById($user_id, $id);
    public function getPostById($id);
    public function updatePost($user_id, $id, $name, $description, $created_at, $modified_at);
    public function searchPostByName($user_id, $name);
    public function getLatestPost();
}
