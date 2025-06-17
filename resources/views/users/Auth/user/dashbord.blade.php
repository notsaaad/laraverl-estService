@extends('users.Auth.user.layout.master')




@section('account-content')


          <div class="border rounded p-4 mb-4">
            <h5 class="mb-3 fw-bold text-primary">البيانات الشخصية</h5>
            <p><strong>الاسم:</strong> {{auth()->user()->name ?? ''}}</p>
            <p><strong>البريد الإلكتروني:</strong>{{auth()->user()->email ?? ''}}</p>
            <p><strong>رقم الجوال:</strong> 01001234567</p>
            <p><strong>العنوان:</strong> {{auth()->user()->address ?? ''}}</p>
            <p><strong>تاريخ التسجيل:</strong>{{auth()->user()->created_at->format('y-m-d') ?? ' '}} </p>
            <a href="#" class="btn btn-outline-primary mt-3">تعديل البيانات</a>
          </div>


          <div class="border rounded p-4" id="orders">
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
                  @forelse ( $orders as $order )
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->service->name}}</td>
                    <td>{{$order->created_at->format('Y-m-d')}}</td>
                    <td>
                      @if ($order->status == "complete")
                        <span class="badge bg-success">مكتمل</span>
                      @elseif($order->status == "pending")
                        <span class="badge bg-warning text-dark">قيد التنفيذ</span>
                      @elseif($order->status == "fail")
                        <span class="badge bg-danger">ملغي</span>
                      @endif
                    </td>
                    <td><a href="{{ route('ThankYouPage', $order->id) }}" class="btn btn-sm btn-outline-primary">عرض</a></td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4">لا يوجد طلبات</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

@endsection
