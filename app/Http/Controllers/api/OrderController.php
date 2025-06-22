<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderFieldAnswer;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'service_id'  => 'required|exists:services,id',
            'total_price' => 'required|numeric',
            'answers'     => 'required|array',
            'name'        => 'required',
            'description' => 'required',
            'phone'       => 'required',
            'email'       => 'required',
            'address'     => 'required',
            'date'        => 'required',
            'answers.*.field_id' => 'required|exists:service_fields,id',
            'answers.*.value'    => 'nullable|string',
        ]);

        $order = Order::create([
            'user_id'     => $request->user_id,
            'service_id'  => $request->service_id,
            'total_price' => $request->total_price,
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'address'      => $request->address,
            'description'  => $request->description,
            'date'         => $request->date,
        ]);

        foreach ($request->answers as $answer) {
            OrderFieldAnswer::create([
                'order_id' => $order->id,
                'field_id' => $answer['field_id'],
                'value'    => $answer['value'],
            ]);
        }

        return response()->json([
            'message' => 'تم إنشاء الطلب بنجاح',
            'order_id' => $order->id,
        ], 201);
    }
}
