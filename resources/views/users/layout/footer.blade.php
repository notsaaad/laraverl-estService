

    <!-- ================================================ Start Footer ========================================== -->
      <footer>
        <div class="container">
          <div class="row ">
            <div class="col ">
              <img src="{{ URL::asset('public/users/images/Logofooter.png') }}" alt="Logo">
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-12 col-md-6 col-lg-3 text-center">
              <div class="d-flex g-4 justify-content-evenly">
                <img src="{{ URL::asset('public/users/images/facebook.png') }}" alt="facebook">
                <img src="{{ URL::asset('public/users/images/instgram.png') }}" alt="instgram">
                <img src="{{ URL::asset('public/users/images/gmail.png') }}" alt="gmail">
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 text-center">
              <span class="fw-bold">
                روابط مفيدة
              </span>
              <ul class="footer-menu">
                <li><a href="{{ route('HomePage') }}">الرئيسة</a></li>
                <li><a href="{{ route('servicesPage') }}">الخدمات</a></li>
                <li><a href="#">من نحن</a></li>
                <li><a href="#">اتصل بنا</a></li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 text-center">
              <span class="fw-bold">
                ساعات العمل
              </span>
              <ul>
                <li class="mt-2">السبت - الخميس: 9:00 صباحًا - 11:00 مساءً</li>
                <li class="mt-2">الجمعة مغلق</li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 text-center">
              <span class="fw-bold">
                تواصل معانا
              </span>
            </div>
          </div>

          <div class="footer-foot mt-2">
            <div class="foot-text fw-bold">
              جميع الحقوق محفوظة لشركة EstService 2025 ©
            </div>
          </div>
        </div>
      </footer>
    <!-- ================================================ End Footer ============================================ -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('public/users/js/main.js') }}"></script>
    @yield('js')
  </body>
</html>
