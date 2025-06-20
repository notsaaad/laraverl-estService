<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\OrderFieldAnswer;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
  function index(){
    $orders = Order::paginate(self::Pagination_count);
    return view('admins.orders.index', get_defined_vars());
  }

  function add(){
    $users    = User::all();
    $services = Service::all();
    $techs    = User::where('role', 'tech')->get();
    return view('admins.orders.add', get_defined_vars());
  }

  function getServiceFields(Service $service){
    return response()->json($service->fields);
  }

  public function store(Request $request)
{
    $service = Service::findOrFail($request->service_id);
          $data = $request->validate([
          'name'        => 'required|string|max:255',
          'user_id'       => 'required|numeric|min:0',
          'tech_id' => 'exists:categories,id',
          'image'       => 'sometimes|nullable|mimes:png,jpg,jpeg,webp|max:2048',
          'description' => 'required',
          'active'      => 'nullable',
      ]);

    $order = Order::create([
        'user_id'     => $request->user_id,
        'service_id'  => $service->id,
        'total_price' => 0,
        'description' => $request->description,
        'status'      => 'pending',
    ]);

    foreach ($service->fields as $field) {
        $key = 'field_' . $field->id;

        if ($request->has($key)) {
            $value = $request->input($key);

            if (is_array($value)) {
                $value = json_encode($value, JSON_UNESCAPED_UNICODE);
            }

            OrderFieldAnswer::create([
                'order_id' => $order->id,
                'field_id' => $field->id,
                'value'    => $value,
            ]);
        }
    }

    return redirect()->route('admin.order.index')->with('success', 'تم إنشاء الطلب بنجاح');
}


  public function edit(Order $order){

    $users = User::all();
    $services = Service::all();
    $techs    = User::where('role', 'tech')->get();
    $fields = $order->service->fields ?? [];

    return view('admins.orders.edit',get_defined_vars());
}

public function update(Request $request, Order $order){

    $request->validate([
        'user_id' => 'required|exists:users,id',
        'name'    => 'required',
        'date'    => 'required',
        'phone'   => 'required',
        'name'    => 'required',
    ]);

    // return $request;

    $order->update([
        'user_id'     => $request->user_id,
        'description' => $request->description,
        'tech_id'     => $request->tech_id,
        'date'        => $request->date,
        'phone'       => $request->phone,
        'name'        => $request->name,
        'status'      => $request->status,
    ]);

    $answers = [];
    $fields = $order->service->fields;

    foreach ($fields as $field) {
        $key = "field_{$field->id}";

        if ($field->type === 'checkbox') {
            $answers[$field->label] = $request->has($key) ? $request->input($key) : [];
        } else {
            $answers[$field->label] = $request->input($key);
        }
    }

    $order->tech_id = $request->tech_id;
    $order->save();


 // حذف الإجابات القديمة
    $order->answers()->delete();

    // إدخال الإجابات الجديدة
    $fields = $order->service->fields;

    foreach ($fields as $field) {
        $key = "field_{$field->id}";
        $value = $request->input($key);

        // في حالة checkbox، تأكد من تحويل القيمة إلى JSON
        if ($field->type == 'checkbox') {
            $value = $request->has($key) ? json_encode($request->input($key)) : json_encode([]);
        }

        OrderFieldAnswer::create([
            'order_id' => $order->id,
            'field_id' => $field->id,
            'value' => is_array($value) ? json_encode($value) : $value,
        ]);
    }

    return redirect()->route('admin.order.index')->with('success', 'تم تحديث الطلب بنجاح');
}

    function delete(Request $request){
      $order_id = $request->id;
      $order    = order::findOrFail($order_id);
      $order->delete();
      return redirect()->route('admin.order.index')->with('success', 'تم مسح الطلب بنجاح');
    }




}
