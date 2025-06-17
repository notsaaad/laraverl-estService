@section('title', 'Checkout')





@extends('users.layout.master')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('public/users/css/checkout.css') }}">
@endsection

@section('content')
<br>
<br>
<div class="container">

        <div class="row">




        <div class="col-md-8">

          <div class="checkout-steps d-flex justify-content-between align-items-center my-4">
            <div class="step-item" data-step="1">
              <div class="circle"></div>
              <div class="label">بياناتك الشخصية</div>
            </div>
            <div class="step-item" data-step="2">
              <div class="circle"></div>
              <div class="label">تفاصيل وإضافات</div>
            </div>
            <div class="step-item" data-step="3">
              <div class="circle"></div>
              <div class="label">تحديد ميعاد وإنهاء</div>
            </div>
          </div>


          <form id="checkoutForm" action="{{ route('Checkout_StorePage', $service->id) }}" method="POST">
            @csrf
            <div class="step-content step-1">
              <div class="mb-3">
                <label class="form-label">الاسم الكامل</label>
                <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name" >
              </div>
              <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" value="{{ auth()->user()->phone }}" class="form-control" name="phone" >
              </div>
              <div class="mb-3">
                <label class="form-label">الإيميل</label>
                <input type="email" value="{{ auth()->user()->email }}" class="form-control" name="email">
              </div>
              <div class="mb-3">
                <label class="form-label">العنوان</label>
                <input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address" required>
              </div>
              <input type="hidden" name="price" value="{{$service->price}}">
              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
              <button type="button" class="btn btn-primary next">التالي</button>
            </div>


            <div class="step-content step-2 d-none">

            @foreach ($fields as $field)
              <div class="option-group">
                <label class="group-title">{{ $field->label }}</label>
                @if ($field->options)
                  <span class="group-note">اختر المناسب</span>
                @endif

                @php
                  $inputName = 'field_' . $field->id;
                  $options   = json_decode($field->options, true) ?? [];
                @endphp

                @if ($field->type === 'text' || $field->type === 'number' || $field->type === 'date')
                  <div class="custom-option input-group">
                    <input
                      type="{{ $field->type }}"
                      name="{{ $inputName }}"
                      class="form-control"
                      {{ $field->required ? 'required' : '' }}>
                  </div>
                @elseif ($field->type === 'select')
                  @foreach ($options as $option)
                    <div class="custom-option">
                      <input type="radio" name="{{ $inputName }}" value="{{ trim($option) }}">
                      <span>{{ trim($option) }}</span>
                    </div>
                  @endforeach
                @elseif ($field->type === 'checkbox')
                @foreach ($options as $option)
                  <div class="custom-option form-check">
                    <input type="checkbox" class="form-check-input" name="field_{{ $field->id }}[]" value="{{ $option }}">
                    <label class="form-check-label" for="">
                        {{ $option }}
                    </label>
                  </div>
                @endforeach
                @endif
              </div>
            @endforeach



              <button type="button" class="btn btn-secondary prev">السابق</button>
              <button type="button" class="btn btn-primary next">التالي</button>
            </div>


            <div class="step-content step-3 d-none">
              <div class="mb-3">
                <label class="form-label">حدد الموعد</label>
                <input type="date" name="date" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">ملاحظات إضافية</label>
                <textarea class="form-control" name="description"></textarea>
              </div>

              <button type="button" class="btn btn-secondary prev">السابق</button>
              <button type="submit" class="btn btn-success">إرسال الطلب</button>
            </div>
          </form>
          <br>
          <br>
        </div>


      <div class="col-md-4">
          <div class="p-3 border rounded bg-white">
            <h5 class="fw-bold">ملخص طلبك</h5>
            <p class="text-muted mb-1">الخدمة:</p>
            <p class="fw-bold">{{$service->name}}</p>
            <hr class="fw-bold">
            <p class="fw-bold text-primary">{{$service->price}} جنيه</p>
          </div>
        </div>
      </div>
</div>



@stop


@section('js')
  <script src="{{ URL::asset('public/users/js/checkout.js') }}"></script>
@endsection
