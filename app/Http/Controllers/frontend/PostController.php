<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // Hiển thị chi tiết bài viết
    public function show($slug)
    {
        // Lấy bài viết theo slug
        $post = Post::where('slug', $slug)->firstOrFail();  // Nếu không tìm thấy bài viết, trả về lỗi 404

        return view('posts.show', compact('post'));  // Trả về view 'posts.show' và truyền dữ liệu bài viết
    }
}
