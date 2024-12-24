<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select("id", "name", "phone", "email", "address", "status")
            ->with('user')->orderBy('created_at', 'DESC')->paginate(5);
        return view('backend.order.index', compact('orders'));
    }
    public function trash()
    {
        $orders = Order::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.order.trash', compact('orders'));
    }

    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->route('order.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('order.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $order = Order::withTrashed()->where('id', $id);
        if ($order->first() != null) {
            $order->restore();
            return redirect()->route('order.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('order.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

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
        $order = Order::withTrashed()->where('id', $id)->first();
        if ($order != null) {
            if ($order->image && File::exists(public_path("images/order/" . $order->image))) {
                File::delete(public_path("images/order/" . $order->image));
            }
            $order->forceDelete();

            return redirect()->route("order.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('order.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
