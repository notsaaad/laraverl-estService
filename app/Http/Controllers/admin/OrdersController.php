<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
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

}
