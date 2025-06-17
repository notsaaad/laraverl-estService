@section('title', 'Home')





@extends('users.layout.master')


@section('content')






    <!-- =====================================  Start Hero Section ============================== -->
      <section class="hero section container">
        <input type="hidden" id="service-route" value="{{ route('Single_Service', ':id') }}">
        <div class="row">
          <div class="col-sm-12 col-md-8">
            <h2 class="Hero-title">خدمات منزلية متكاملة .... <br> راحتك أولوياتنا</h2>
            <span class="Hero-des">
              كل ما يحتاجه منزلك في مكان واحد! نقدم لك خدمات شاملة تشمل التنظيف، الصيانة،
              وتوصيل الطلبات، بسرعة واحترافية لتوفير وقتك وجهدك .
            </span>
            <div class="HeroSearch d-flex ">
              <div class="input-div">
                <input type="text"   id="search-service"  autocomplete="off" placeholder="ابحث عن خدمة">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>

              {{-- <button class="btn btn-primary">احصل علي خدمة</button> --}}
            </div>
            <ul id="results" class="list-group mt-2 mb-2"></ul>
            <div class="Hero-most-used">
              <span>الاكثر استخداما :</span>
              <a href="{{ route('Single_Service', 2) }}" class="btn-gray btn">خدمات التوصيل</a>
              <a href="{{ route('Single_Service', 3) }}" class="btn-gray btn">خدمات كهربائي</a>
              <a href="{{ route('Single_Service', 4) }}" class="btn-gray btn">خدمات تنظيف منازل</a>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <img src="{{ URL::asset('public/users/images/Home/HeroSection.png') }}" alt="hero">
          </div>
        </div>
      </section>
    <!-- =====================================  End Hero Section ================================ -->

    <!-- =============================== Start Most Used Services =============================== -->
      <section class="bg-dark-gray">
        <div class="container">
          <div class="section-header">
            <span class="section-title">أكثر الخدمات طلباً</span>
            <a href="{{ route('CategoryPage') }}">عرض جميع فئات الخدمات  <i class="fa-solid fa-left-long"></i></a>
          </div>

          <div class="container py-4">
            <div class="row g-3">
              @forelse ( $categroies as  $cat)
              <div class="col-12 col-sm-6 col-lg-3 single-service">
                <div class="h-100 p-2">
                  <a href="{{ route('SingleCategoryPage', $cat->id) }}">
                    @if(!empty($cat->image))
                      <img src="{{ URL::asset(CategoriesImagePath().$cat->image) }}" alt="{{ $cat->name }}" class="img-fluid">
                    @else
                      <img src="{{ URL::asset(default_category_image()) }}" alt="{{ $cat->name }}" class="img-fluid">
                    @endif
                  </a>
                  <div class="serv-info">
                    <div class="fw-bold serv-title">{{$cat->name}}</div>
                  </div>
                </div>
              </div>
              @empty
              <div class="col">
                <h2 class="text-ceneter">لا يوحد فئات خدمات</h2>
              </div>
              @endforelse


            </div>
          </div>

        </div>
      </section>
    <!-- =============================== End Most Used Services ================================= -->

    <!-- ========================================= Start Best Offers ===========================  -->

    <section>
      <div class="container">
        <div class="section-header">
          <span class="section-title">العروض المميزة</span>
        </div>
      </div>

      <div class="container py-4">
        <div class="row g-3">
          @forelse ($services as $service )
          <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="h-100  single-service shadow">
              <a href="{{ route('Single_Service', $service->id) }}">
              @if(!empty($service->image))
                <img src="{{ URL::asset(ServiceImagePath().$service->image) }}" alt="{{ $service->name }}" class="img-fluid">
              @else
                <img src="{{ URL::asset(default_service_image()) }}" alt="{{ $service->name }}" class="img-fluid">
              @endif
              </a>
              <div class="serv-info">
                <div class="fw-bold serv-title">{{$service->name}}</div>
                <span class="serv-price"><span class="fw-bold">{{$service->price}} </span>جنية</span>
                <a class="text-dark" href="{{ route('SingleCategoryPage', $service->category->id) }}"><span class="serv-category opacity-75"> قسم: <span class="text-primary">{{$service->category->name}}</span> </span></a>
              </div>
            </div>
          </div>
          @empty
          <h2 class="text-center">لا يوجد خدمات</h2>
          @endforelse


        </div>
      </div>
    </section>

    <!-- ========================================= End Best Offers =============================  -->

    <section>
      <div class="container">
            <div class="section-headers text-center">
            <span class="section-title ">أكثر الخدمات طلباً</span>

            <div class="mt-2 rate-section">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
      </div>

      <div class="row g-2 m-5">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="single-rate"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="single-rate"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="single-rate"></div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="single-rate"></div>
        </div>
      </div>
    </section>


@stop


@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
      $('#search-service').on('input', function () {
          let query = $(this).val();

          if (query.length >= 1) {
              $.ajax({
                  url: "{{ route('services.search') }}",
                  type: "GET",
                  data: { query: query },
                  success: function (data) {
                      let list = '';
                      if (data.length > 0) {
                        let baseRoute = $('#service-route').val();
                          data.forEach(service => {
                              let url = baseRoute.replace(':id', service.id);
                              list +=
                              `
                                <li class="list-group-item d-flex align-items-center">
                                  <a href="${url}" class="flex-grow-1 text-decoration-none text-dark fw-bold ">
                                    <img src="${service.image}" alt="image" class="me-3" style="width:60px;height:60px;object-fit:cover;border-radius:6px;">
                                        ${service.name}
                                    </a>
                                </li>
                                `;
                          });
                      } else {
                          list = `<li class="list-group-item text-muted">لا توجد نتائج</li>`;
                      }
                      $('#results').html(list).show();
                  }
              });
          } else {
              $('#results').empty().hide();
          }
      });
  });
</script>

@endsection
