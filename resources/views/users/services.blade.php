@section('title', 'Service')





@extends('users.layout.master')


@section('content')


    <div class="container">
      <section>
      <h2 class="fw-bold mb-4 black">الخدمات</h2>
      <div class="row g-3 mb-4">
        @forelse ( $services as $service )
        <a href="{{ route('Single_Service', $service->id) }}" class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            @if(!empty($service->image))
              <img src="{{ URL::asset(ServiceImagePath().$service->image) }}" alt="{{ $service->name }}" class="img-fluid">
            @else
              <img src="{{ URL::asset(default_service_image()) }}" alt="{{ $service->name }}" class="img-fluid">
            @endif
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">{{$service->name}}</div>
            </div>
          </div>
        </a>
        @empty
          <h2>لا يوجد خدمات</h2>
        @endforelse
      </div>
    </section>
    </div>


@stop
