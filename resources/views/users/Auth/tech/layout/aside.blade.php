  <div class="border rounded p-3 bg-light">
    <h5 class="mb-3">مرحبًا، <span class="text-primary">{{auth()->user()->name}}</span></h5>
    <ul class="list-unstyled">
      <li class="mb-2"><a href="#" class="text-dark fw-bold"><i class="fa fa-user ms-2 text-primary"></i>معلوماتي</a></li>
      <li class="mb-2"><a href="#" class="text-dark fw-bold"><i class="fa fa-wallet ms-2 text-primary"></i>محفظتي</a></li>
      <li class="mb-2"><a href="#" class="text-dark fw-bold"><i class="fa fa-tasks ms-2 text-primary"></i>طلباتي</a></li>
      <li><a href="{{ route('Logout') }}" class="text-danger fw-bold"><i class="fa fa-sign-out-alt ms-2"></i>تسجيل الخروج</a></li>
    </ul>
  </div>
