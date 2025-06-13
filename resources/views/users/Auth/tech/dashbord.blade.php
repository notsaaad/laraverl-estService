@extends('users.Auth.user.layout.master')




@section('tech-account-content')


          <div class="border rounded p-4 mb-4">
            <h5 class="mb-3 fw-bold text-primary">البيانات الشخصية</h5>
            <p><strong>الاسم:</strong> {{auth()->user()->name}}</p>
            <p><strong>البريد الإلكتروني:</strong>{{auth()->user()->email}}</p>
            <p><strong>رقم الجوال:</strong> 01001234567</p>
            <p><strong>العنوان:</strong> {{auth()->user()->address}}</p>
            <p><strong>تاريخ التسجيل:</strong>{{auth()->user()->created_at->format('y-m-d')}} </p>
            <a href="#" class="btn btn-outline-primary mt-3">تعديل البيانات</a>
          </div>

          <div class="border rounded p-4 mb-4">
            <h5 class="mb-3 text-primary fw-bold">محفظتي</h5>
            <p><strong>الرصيد الحالي:</strong> <span class="text-success fw-bold">1,250 جنيه</span></p>
            <p><strong>إجمالي الأرباح:</strong> 7,300 جنيه</p>

            <h6 class="mt-4 mb-2 fw-bold">آخر المعاملات:</h6>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                تم إضافة 150 جنيه – طلب #301
                <span class="badge bg-success">05 يونيو</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                خصم 50 جنيه – عمولة المنصة
                <span class="badge bg-danger">03 يونيو</span>
              </li>
            </ul>
          </div>


          
          <div class="border rounded p-4">
            <h5 class="mb-3 fw-bold text-primary">طلباتي السابقة</h5>
            <div class="table-responsive">
              <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>الخدمة</th>
                    <th>التاريخ</th>
                    <th>الحالة</th>
                    <th>الإجراء</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>254</td>
                    <td>تنظيف شقة 170م</td>
                    <td>2025-06-02</td>
                    <td><span class="badge bg-success">مكتمل</span></td>
                    <td><a href="#" class="btn btn-sm btn-outline-primary">عرض</a></td>
                  </tr>
                  <tr>
                    <td>255</td>
                    <td>نقل أثاث</td>
                    <td>2025-06-03</td>
                    <td><span class="badge bg-warning text-dark">قيد التنفيذ</span></td>
                    <td><a href="#" class="btn btn-sm btn-outline-primary">عرض</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

@endsection
