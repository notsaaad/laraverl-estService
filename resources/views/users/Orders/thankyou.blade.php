@section('title', 'Thank you ')





@extends('users.layout.master')


@section('content')


    <div class="container my-5 text-center">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <i class="fa fa-check-circle fa-5x text-success mb-4"></i>
          <h2 class="fw-bold text-success">شكراً لك!</h2>
          <p class="lead mt-3">تم إرسال طلبك بنجاح، وسنقوم بالتواصل معك لتأكيد التفاصيل.</p>

          <!-- ملخص الطلب -->
          <div class="border rounded p-4 mt-4 text-end bg-light shadow">
            <h5 class="text-primary fw-bold mb-3">ملخص طلبك:</h5>
            <p><strong>رقم الطلب:</strong> #{{ $order->id }}</p>
            <p><strong>الخدمة:</strong>{{ $order->name }} </p>
            <p><strong>البريد الاكتروني:</strong>{{ $order->email }} </p>
            <p><strong>الهاتف:</strong>{{ $order->phone }} </p>
            <p><strong>الموعد:</strong> {{$order->date}}</p>
            <p><strong>التكلفة:</strong> {{$order->total_price}}</p>
            <p><strong>ملاحظات:</strong> {{$order->description}}</p>
            @isset($Answers)
            <hr>
            <h4>بيانات اخري</h4>
            @foreach ($Answers as $answer)
              <div class="mb-2">
                  <strong>{{ $answer['label'] }}:</strong> {{ $answer['value'] }}
              </div>
            @endforeach
            @endisset
          </div>

          <!-- أزرار -->
          <div class="mt-4">
            <a href="{{ route('HomePage') }}" class="btn btn-primary me-2"><i class="fa fa-home me-1"></i> الرجوع للرئيسية</a>
            <a href="{{ route('MyAccountPage') }}" class="btn btn-outline-primary"><i class="fa fa-user me-1"></i> حسابي</a>
          </div>
        </div>
      </div>
    </div>


  <br>
  <br>

@stop
