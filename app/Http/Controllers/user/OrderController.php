<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\OrderFieldAnswer;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    function checkout(Service $service){
      $fields = $service->fields;
      // return $fields;
      return view('users.Orders.Checkout', get_defined_vars());
    }

public function store(Request $request, Service $service)
{

    $order = Order::create([
        'user_id'      => auth()->id(),
        'service_id'   => $service->id,
        'total_price'  => $request->price,
        'description'  => $request->description,
        'status'       => 'pending',
        'name'         => $request->name,
        'phone'        => $request->phone,
        'address'      => $request->address,
        'date'         => $request->date,
        'email'        => $request->email
    ]);


    $fields = $service->fields;

    foreach ($fields as $field) {
        $inputKey = 'field_' . $field->id;

        if ($request->has($inputKey)) {
            $value = $request->input($inputKey);


            if (is_array($value)) {
                $value = json_encode($value, JSON_UNESCAPED_UNICODE);
            }

          if (!is_null($value)) {
              OrderFieldAnswer::create([
                  'order_id' => $order->id,
                  'field_id' => $field->id,
                  'value' => $value,
              ]);
          }
        }
    }


    return redirect()->route('ThankYouPage', $order->id);
  }



  function thankyou(Order $order){
    $Answers = $order->getAnswers();
    // return get_defined_vars();

    return view('users.Orders.thankyou', get_defined_vars());
  }
}
