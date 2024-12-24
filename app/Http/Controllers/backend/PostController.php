<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
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
            return redirect()->route('post.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('post.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $post = Post::withTrashed()->where('id', $id);
        if ($post->first() != null) {
            $post->restore();
            return redirect()->route('post.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('post.trash')->with('error', 'Không tìm thấy banner!');
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
    public function store(Request $request)
    {
        $post = new Post();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/post'), $filename);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
