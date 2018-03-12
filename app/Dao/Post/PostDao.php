<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use DB;

class PostDao implements PostDaoInterface
{
    public function getAllPost($user_id)
    {
        return DB::table('bulletin_board')->select()
            ->where('user_id', $user_id)
            ->get();
    }

    public function addNewPost($user_id, $name, $description, $created_at, $modified_at)
    {
        $insertpost = DB::table('bulletin_board')->insert([
            'user_id'          => $user_id,
            'post_name'        => $name,
            'post_description' => $description,
            'start_date'       => $created_at,
            'end_date'         => $modified_at,
        ]);
        return $insertpost;
    }

    public function deletePostById($user_id, $id)
    {
        DB::table('bulletin_board')
            ->where('user_id', $user_id)
            ->where('bulletin_board_id', $id)
            ->delete();
        return DB::table('bulletin_board')->select()->where('user_id', $user_id)->get();
    }

    public function getPostById($id)
    {
        return DB::table('bulletin_board')->select()
            ->where('bulletin_board_id', $id)
            ->get();
    }

    public function updatePost($user_id, $id, $name, $description, $created_at, $modified_at)
    {
        $editpost = DB::table('bulletin_board')
            ->where('user_id', $user_id)
            ->where('bulletin_board_id', $id)
            ->update([
                'post_name'        => $name,
                'post_description' => $description,
                'start_date'       => $created_at,
                'end_date'         => $modified_at,
            ]);
        return $editpost;
    }

    public function searchPostByName($user_id, $name)
    {
        $searchPost = DB::table('bulletin_board')
            ->where('user_id', $user_id)
            ->where('post_name', 'like', '%' . $name . '%')
            ->get();

        return $searchPost;
    }

    public function getLatestPost()
    {
        return DB::table('bulletin_board')->select()
            ->get();
    }

}
