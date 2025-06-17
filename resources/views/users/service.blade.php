@section('title', 'Service')





@extends('users.layout.master')


@section('content')


    <div class="container mb-5">

      <div class="row g-2 m-5 mb-3">
        <div class="col-sm-12 col-md-8">
          <h2 class="black fw-bold">{{$service->name}}</h2>
          <p class="serv-price"><span class="fw-bold">{{ $service->price }} </span>جنية</p>
          {{ $service->description }}
        </div>
        <div class="col-sm-12 col-md-4">
          <a href="{{ route('CheckoutPage', $service->id) }}" class="btn btn-primary">اطلب الان</a>

            @if(!empty($service->image))
              <img src="{{ URL::asset(ServiceImagePath().$service->image) }}" alt="{{ $service->name }}" class="w-100 h-100 mt-3 rounded">
            @else
              <img src="{{ URL::asset(default_service_image()) }}" alt="{{ $service->name }}" class="w-100 h-100 mt-3 rounded">
            @endif
        </div>
      </div>

    </div>

  <br>
  <br>

@stop
