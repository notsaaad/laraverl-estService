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
            <a href="{{ route('servicesPage') }}">عرض جميع فئات الخدمات  <i class="fa-solid fa-left-long"></i></a>
          </div>

          <div class="container py-4">
            <div class="row g-3">
              <div class="col-12 col-sm-6 col-lg-3 single-service">
                <div class="h-100 p-2">
                  <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="خدمات الصيانة والإصلاح" class="img-fluid">
                  <div class="serv-info">
                    <div class="fw-bold serv-title">خدمات الصيانة والإصلاح</div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3 single-service">
                <div class="h-100 p-2">
                  <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="خدمة نقل الأثاث" class="img-fluid">
                  <div class="serv-info">
                    <div class="fw-bold serv-title">خدمة نقل الأثاث</div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3 single-service">
                <div class="h-100 p-2">
                  <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="نظافة منزلية" class="img-fluid">
                    <div class="serv-info">
                      <div class="fw-bold serv-title">نظافة منزلية</div>
                    </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-3 single-service">
                <div class="h-100 p-2">
                  <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="خدمات التوصيل" class="img-fluid">
                    <div class="serv-info">
                      <div class="fw-bold serv-title">خدمات التوصيل</div>
                    </div>
                </div>
              </div>
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
          <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="h-100  single-service shadow">
              <img src="{{ URL::asset('public/users/images/services/serv3.png') }}" alt="خدمات الصيانة والإصلاح" class="img-fluid">
              <div class="serv-info">
                <div class="fw-bold serv-title">خدمات الصيانة والإصلاح</div>
                <span class="serv-price"><span class="fw-bold">300 </span>جنية</span>
                <span class="serv-category opacity-75">قسم النظافة المنزلية : </span>
                <span class="serv-des">احتفظ بنظافة منزلك مع التنظيف الدورى يشمل التنظيف 7 وحدات. </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="h-100  single-service shadow">
              <img src="{{ URL::asset('public/users/images/services/serv4.png') }}" alt="خدمة نقل الأثاث" class="img-fluid">
              <div class="serv-info">
                <div class="fw-bold serv-title">خدمة نقل الأثاث</div>
                <span class="serv-price"><span class="fw-bold">300 </span>جنية</span>
                <span class="serv-category opacity-75">قسم النظافة المنزلية : </span>
                <div class="serv-des">احتفظ بنظافة منزلك مع التنظيف الدورى يشمل التنظيف 7 وحدات. </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="h-100  single-service shadow">
              <img src="{{ URL::asset('public/users/images/services/serv2.png') }}" alt="نظافة منزلية" class="img-fluid">
                <div class="serv-info">
                  <div class="fw-bold serv-title">نظافة منزلية</div>
                  <span class="serv-price"><span class="fw-bold">300 </span>جنية</span>
                  <span class="serv-category opacity-75">قسم النظافة المنزلية : </span>
                  <div class="serv-des">احتفظ بنظافة منزلك مع التنظيف الدورى يشمل التنظيف 7 وحدات. </div>
                </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="h-100  single-service shadow">
              <img src="{{ URL::asset('public/users/images/services/serv1.png') }}" alt="خدمات التوصيل" class="img-fluid">
              <div class="serv-info">
                <div class="fw-bold serv-title">خدمات التوصيل</div>
                <span class="serv-price"><span class="fw-bold">300 </span>جنية</span>
                <span class="serv-category opacity-75">قسم النظافة المنزلية : </span>
                <div class="serv-des">احتفظ بنظافة منزلك مع التنظيف الدورى يشمل التنظيف 7 وحدات. </div>
              </div>
            </div>
          </div>
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
