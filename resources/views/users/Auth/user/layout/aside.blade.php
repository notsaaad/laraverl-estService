  <div class="border rounded p-3 bg-light">
    <h5 class="mb-3">مرحبًا، <span class="text-primary">{{auth()->user()->name}}</span></h5>
    <ul class="list-unstyled">
      <li class="mb-2"><a href="{{ route('MyAccountPage') }}" class="text-dark fw-bold"><i class="fa fa-user ms-2 text-primary"></i>البيانات الشخصية</a></li>
      <li class="mb-2"><a href="#" class="text-dark fw-bold"><i class="fa fa-list ms-2 text-primary"></i>طلباتي</a></li>
      <li class="mb-2"><a href="#" class="text-dark fw-bold"><i class="fa fa-lock ms-2 text-primary"></i>تغيير كلمة المرور</a></li>
      <li><a href="{{ route('Logout') }}" class="text-danger fw-bold"><i class="fa fa-sign-out-alt ms-2"></i>تسجيل الخروج</a></li>
    </ul>
  </div>
