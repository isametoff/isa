<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            if (isset($data['tags_ids'])) {
                $tagIds = $data['tags_ids'];
                unset($data['tags_ids']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            if (isset($data['tags_ids'])) {
                $tagIds = $data['tags_ids'];
                unset($data['tags_ids']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            // if (isset($tagIds)) {
            //     $post->tags()->attach($tagIds);
            // }
            if (!empty($tagIds)) {
                $post->tags()->sync($tagIds);
            } else {
                $post->tags()->detach();
            }
            DB::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
        return $post;
    }
}
// class CommentService
// {
//     public function update($data, $comment)
//     {
//         try {
//             $comment->update($data);
//             DB::commit();
//         } catch (\Exception $exception) {
//             Db::rollBack();
//             abort(500);
//         }
//         return $comment;
//     }
// }
