<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TopicController extends Controller
{
    public function status($id)
    {
        $topic = Topic::findOrFail($id);

        // Đổi trạng thái
        $topic->status = !$topic->status;
        $topic->save();

        // Chuyển hướng về trang trước đó với thông báo
        return redirect()->route('topic.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::select("id", "name", "slug", "description", "status")
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.topic.index', compact('topics'));
    }
    public function trash()
    {
        $topics = Topic::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.topic.trash', compact('topics'));
    }

    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
            return redirect()->route('topic.index')->with('success', 'Xóa topic thành công!');
        }

        return redirect()->route('topic.index')->with('error', 'Không tìm thấy topic!');
    }

    public function restore(string $id)
    {
        $topic = Topic::withTrashed()->where('id', $id);
        if ($topic->first() != null) {
            $topic->restore();
            return redirect()->route('topic.trash')->with('success', 'Xóa topic thành công!');
        }

        return redirect()->route('topic.trash')->with('error', 'Không tìm thấy topic!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.topic.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        $topic->sort_order = $request->sort_order;
        $topic->description = $request->description ?? ''; // Nếu không nhập description, gán giá trị rỗng
        $topic->created_by = Auth::id() ?? 1; // Gán ID người tạo (nếu chưa login thì mặc định 1)
        $topic->created_at = now();
        $topic->status = $request->status;

        $topic->save();

        return redirect()->route('topic.index')->with('success', 'Thêm topic thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('topic.index')->with('error', 'topic không tồn tại.');
        }

        return view('backend.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::where('id', $id)->firstOrFail();
        $topics = Topic::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.topic.edit', compact('topic', 'topics'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, $id)
    {
        $topic = Topic::where('id', $id)->first();
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->updated_by = Auth::id() ?? 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->status = $request->status ?? 0;
        $topic->save();
        return redirect()->route('topic.index')->with('success', 'cap nhat thanh cong');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::withTrashed()->where('id', $id)->first();
        if ($topic != null) {
            if ($topic->image && File::exists(public_path("images/topic/" . $topic->image))) {
                File::delete(public_path("images/topic/" . $topic->image));
            }
            $topic->forceDelete();

            return redirect()->route("topic.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('topic.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
