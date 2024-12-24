<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::select("id", "name", "email", "phone", "title", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('backend.contact.index', compact('contacts'));
    }
    public function trash()
    {
        $contacts = Contact::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(10); // Phân trang
        return view('backend.contact.trash', compact('contacts'));
    }

    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->route('contact.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('contact.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $contact = Contact::withTrashed()->where('id', $id);
        if ($contact->first() != null) {
            $contact->restore();
            return redirect()->route('contact.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('contact.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $contact = Contact::withTrashed()->where('id', $id)->first();
        if ($contact != null) {
            if ($contact->image && File::exists(public_path("images/contact/" . $contact->image))) {
                File::delete(public_path("images/contact/" . $contact->image));
            }
            $contact->forceDelete();

            return redirect()->route("contact.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('contact.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
