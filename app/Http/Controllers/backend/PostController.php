<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function status($id)
    {
        $post = Post::findOrFail($id);

        // Đổi trạng thái
        $post->status = !$post->status;
        $post->save();

        // Chuyển hướng về trang trước đó với thông báo
        return redirect()->route('post.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select("id", "title", "slug", "description", "thumbnail", "type", "status")
            ->orderBy('created_at', 'DESC')->paginate(5);
        return view('backend.post.index', compact('posts'));
    }
    public function trash()
    {
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.post.trash', compact('posts'));
    }

    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('post.index')->with('success', 'Xóa post thành công!');
        }

        return redirect()->route('post.index')->with('error', 'Không tìm thấy post!');
    }

    public function restore(string $id)
    {
        $post = Post::withTrashed()->where('id', $id);
        if ($post->first() != null) {
            $post->restore();
            return redirect()->route('post.trash')->with('success', 'Xóa post thành công!');
        }

        return redirect()->route('post.trash')->with('error', 'Không tìm thấy post!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lấy danh sách các chủ đề từ cơ sở dữ liệu
        $topics = Topic::all(); // Hoặc bạn có thể thêm điều kiện hoặc thứ tự nếu cần.

        // Trả về view với dữ liệu chủ đề
        return view('backend.post.create', compact('topics'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('storage/images/post/'), $filename);
            $post->thumbnail = $filename;

            $post->topic_id = $request->topic_id;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->description = $request->description;
            $post->type = $request->type;
            $post->created_by = Auth::id() ?? 1;
            $post->created_at = date('Y-m-d H:i:s');
            $post->status = $request->status ?? 0;
            $post->save();
            return redirect()->route('post.index')->with('success', 'them thanh cong');
        } else {
            return back()->with('error', 'chua chon hinh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('post.index')->with('error', 'post không tồn tại.');
        }

        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topic::all();
        $post = Post::where('id', $id)->firstOrFail();
        $posts = Post::select("id", "title", "status")
            ->get();
        $types = ['page', 'post']; // Các tùy chọn cho type
        return view('backend.post.edit', compact('post', 'posts', 'topics', 'types'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail && File::exists(public_path("storage/images/post/" . $post->thumbnail))) {
                File::delete(public_path("storage/images/post/" . $post->thumbnail));
            }
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('storage/images/post'), $filename);
            $post->thumbnail = $filename;
        }
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->type = $request->type;
        $post->updated_by = Auth::id() ?? 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->status = $request->status ?? 0;
        $post->save();
        return redirect()->route('post.index')->with('success', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post != null) {
            if ($post->image && File::exists(public_path("images/post/" . $post->image))) {
                File::delete(public_path("images/post/" . $post->image));
            }
            $post->forceDelete();

            return redirect()->route("post.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('post.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
