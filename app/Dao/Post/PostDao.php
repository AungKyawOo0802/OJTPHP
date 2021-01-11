<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Post;
use Auth;

class PostDao implements PostDaoInterface
{
    /**
     * Get Operator List
     * @param Object
     * @return $operatorList
     */

    public function getPostList($request)
    {
        $search =  $request->input('search');
        if ($search  !="") {
            /**
             * Search data
             */
            $postList =  Post::where('deleted_user_id', null)
                            ->where('status', 1)
                            ->whereHas('user', function ($query) use ($search) {
                                $query->where('title', 'like', "%{$search }%");
                                $query->orWhere('description', 'like', "%{$search }%");
                                $query->orWhere('name', 'like', "%{$search }%");
                            })->get();

            //inactive post but owner have been seen
                    
            $inactivePost = Post::where('status', 0)
                            ->where('create_user_id', Auth::id())
                            ->where('deleted_user_id', null)
                            ->whereHas('user', function ($query) use ($search) {
                                $query->where('title', 'like', "%{$search }%");
                                $query->orWhere('description', 'like', "%{$search }%");
                                $query->orWhere('name', 'like', "%{$search }%");
                            })->get();

            $allPosts = $postList->merge($inactivePost)->sortByDesc('created_at');
            $allPosts = $this->pagination($allPosts);
            $allPosts->appends(['search' => $search]);

            return $allPosts;
        } else {
            // active post
            $postList =  Post::where('status', 1)
                        ->where('deleted_user_id')
                        ->get();

            //inactive post but owner have been seen
            $inactivePost = Post::where('status', 0)
                            ->where('create_user_id', Auth::id())
                            ->where('deleted_user_id', null)
                            ->get();
            
            $allPosts = $postList->merge($inactivePost)->sortByDesc('created_at');
            $allPosts = $this->pagination($allPosts);
            return $allPosts;
        }
    }

    /**
     * Insert Post
     * @param request
     */
    public function insertPost($request)
    {
        //insert Post into database
        $post = new Post;
        $post -> title = $request -> title;
        $post -> description = $request -> description;
        $post -> status = 1;
        $post -> create_user_id = Auth::user()->id;
        $post -> updated_user_id = Auth::user()->id;
        $post -> created_at = now();
        $post -> updated_at = now();
        $post -> save();
    }

    /**
     * Delete Post
     * @param id
     */
    public function deletePost($id)
    {
        $delete_id = Post::find($id);
        $delete_id->status = 0;
        $delete_id->deleted_user_id =Auth::user()->id;
        $delete_id->deleted_at = now();
        $delete_id->save();
    }

    /**
     * Search Id for Update
     * @param id
     * @return Object
     */
    public function searchPost($id)
    {
        return $search_id = Post::find($id);
    }

    /**
     * Update Post
     * @param request
     */
    public function updatePost($request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->status == null) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }
        $post->updated_at = now();
        return $post->save();
    }

    /**
     * paginate
     * @param items
     * @return
     */
    public function pagination($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
