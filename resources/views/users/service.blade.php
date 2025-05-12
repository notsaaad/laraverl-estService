@section('title', 'Service')





@extends('users.layout.master')


@section('content')


    <div class="container mb-5">

      <div class="row g-2 m-5 mb-3">
        <div class="col-sm-12 col-md-8">
          <h2 class="black fw-bold">تنظيف المنزل للمرة الواحدة - حتي 170 م</h2>
          <p class="serv-price"><span class="fw-bold">345 </span>جنية</p>
          خدمة النظافة المنزلية المعتادة التى تحافظ على منزلك نظيفا طوال الوقت ، مقدمه
          من مجموعة من العمال والعاملات المتعاقد معهم وتدريبهم لضمان الجودة والأمانة وتقديم خدمة نظافة مضمونة تتم بإحترافية ، نظافة الشقق و الفيلات والمكاتب
        </div>
        <div class="col-sm-12 col-md-4">
          <button class="btn btn-primary">اطلب الان</button>
          <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" class="w-100 h-100 mt-3 rounded" alt="service">
        </div>
      </div>

    </div>

  <br>
  <br>

@stop
