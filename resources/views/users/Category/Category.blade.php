@section('title', 'Service')





@extends('users.layout.master')


@section('content')


    <div class="container">
      <section>
      <h2 class="fw-bold mb-4 black">تصنيفات</h2>
      <div class="row g-3 mb-4">
        @forelse ( $categories as $cat )
        <a href="{{ route('SingleCategoryPage', $cat->id) }}" class="col-sm-12 col-md-6 col-lg-3">
          <div class="h-100 p-2 shadow">
            @if(!empty($cat->image))
              <img src="{{ URL::asset(CategoriesImagePath().$cat->image) }}" alt="{{ $cat->name }}" class="img-fluid">
            @else
              <img src="{{ URL::asset(default_category_image()) }}" alt="{{ $cat->name }}" class="img-fluid">
            @endif
            <div class="serv-info">
              <div class="fw-bold serv-title p-2">{{ $cat->name }}</div>
            </div>
          </div>
        </a>
        @empty
          <h2>لا يوجد تصنيفات</h2>
        @endforelse

      </div>
    </section>
    </div>


@stop
