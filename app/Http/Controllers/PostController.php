<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Log;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostServiceInterface $post)
    {
        $this->postService = $post;
    }

    public function showPost(Request $request)
    {
        $user_id = $request->loginUserId;
        $posts   = $this->postService->getAllPost($user_id);
        return Response::json($posts);
    }

    public function selectPostById(Request $request)
    {
        Log::info($request->id);
        $post = $this->postService->getPostById($request->id);
        return Response::json($post);
    }

    public function updatePost(Request $request)
    {
        $user_id     = $request->loginUserId;
        $id          = $request->id;
        $name        = $request->postName;
        $description = $request->postDescription;
        $created_at  = $request->startDate;
        $modified_at = $request->endDate;
        $post        = $this->postService->updatePost($user_id, $id, $name, $description, $created_at, $modified_at);
        return Response::json($post);
    }

    public function deletePost(Request $request)
    {
        $user_id = $request->loginUserId;
        $post    = $this->postService->deletePostById($user_id, $request->id);
        return Response::json($post);
    }

    public function addPost(Request $request)
    {
        $user_id     = $request->loginUserId;
        $name        = $request->postName;
        $description = $request->postDescription;
        $start_date  = $request->startDate;
        $end_date    = $request->endDate;
        $post        = $this->postService->addNewPost($user_id, $name, $description, $start_date, $end_date);
        return Response::json($post);
    }

    public function searchPost(Request $request)
    {
        $user_id = $request->loginUserId;
        $name    = $request->postName;
        $post    = $this->postService->searchPostByName($user_id, $name);
        return Response::json($post);
    }

    public function getLatestPost()
    {
        Log::info("get latest post");
        $post = $this->postService->getLatestPost();
        return Response::json($post);
    }
}
