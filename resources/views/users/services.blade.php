@section('title', 'Service')





@extends('users.layout.master')


@section('content')


    <div class="container">
      <section>
      <h2 class="fw-bold mb-4 black">الخدمات</h2>
      <div class="row g-3 mb-4">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="خدمات التوصيل" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">خدمات التوصيل</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv2.png') }}" alt="نظافة منزلية" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">نظافة منزلية</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv3.png') }}" alt="خدمات الصيانة والإصلاح" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">خدمات الصيانة والإصلاح</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv4.png') }}" alt="خدمة نقل الاثاث" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">خدمة نقل الاثاث</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv5.png') }}" alt="خدمات الديكور المنزلي" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">خدمات الديكور المنزلي</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            <img src="{{ URL::asset('public/users/images/services/serv6.png') }}" alt="خدمة تنظيف السيارات" class="img-fluid">
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">خدمة تنظيف السيارات</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>


@stop
