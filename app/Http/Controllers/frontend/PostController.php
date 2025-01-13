<?php

namespace App\Http\Controllers\Frontend;  // Chỉ sử dụng namespace này thôi
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Hiển thị tất cả bài viết
    public function index(Request $request)
    {
        $topicSlug = $request->get('topicSlug');
        // Lấy tất cả bài viết từ cơ sở dữ liệu
        $query = Post::query();

        // Lọc bài viết theo chủ đề nếu có
        if ($topicSlug) {
            $topic = Topic::where('slug', $topicSlug)->first();
            if ($topic) {
                $query->where('topic_id', $topic->id);
            }
        }


        $posts = $query->get();
        // Lấy tất cả các chủ đề
        $topics = Topic::all();
        $title = $topicSlug && isset($topic) ? $topic->name : 'Tất cả bài viết';

        // Trả về view 'posts.index' và truyền dữ liệu bài viết và chủ đề
        return view('frontend.post.post', compact('posts', 'topics', 'title'));
    }
    public function indexByTopic($topicSlug)
    {
        // Lấy chủ đề theo slug
        $topic = Topic::where('slug', $topicSlug)->firstOrFail();

        // Lấy tất cả bài viết thuộc chủ đề
        $posts = $topic->posts()->get();

        // Trả về view với bài viết theo chủ đề
        return view('frontend.post.post-topic', compact('posts', 'topic'));
    }
    // Hiển thị chi tiết bài viết
    public function show($slug)
    {
        // Lấy bài viết theo slug
        $post = Post::where('slug', $slug)->firstOrFail();  // Nếu không tìm thấy bài viết, trả về lỗi 404
        $relatedPosts = Post::where('topic_id', $post->topic_id)
            ->where('id', '!=', $post->id)
            ->limit(4) // Giới hạn số bài viết liên quan
            ->get();
        return view('frontend.post.post-detail', compact('post', 'relatedPosts'));  // Trả về view 'posts.show' và truyền dữ liệu bài viết
    }
}
