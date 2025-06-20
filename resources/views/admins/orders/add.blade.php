@extends('admins.layout.master')

@section('title', 'Add Order')

@section('content')

<div class="main-form">
  <div class="container">
    <h2>Add Order</h2>

    <form action="{{ route('admin.order.store') }}" method="POST">
      @csrf
      <div class="row">
      <div class="input-div col-sm-12 col-md-6">
          <label for="name">Name <span>(required)</span></label>
          <input type="text" name="name"  id="name" placeholder="Enter order user  name">
          @error('name')
            <small class="danger">{{$message}}</small>
          @enderror
      </div>
      <div class="input-div col-sm-12 col-md-6">
          <label for="data">Date <span>(required)</span></label>
          <input type="date" name="date" class="form-control" required>
          @error('date')
            <small class="danger">{{$message}}</small>
          @enderror
      </div>
      <div class="input-div col-sm-12 col-md-6">
          <label for="email">Email <span>(required)</span></label>
          <input type="email" email="email"  id="email" placeholder="Enter Order user email">
          @error('email')
            <small class="danger">{{$message}}</small>
          @enderror
      </div>
        <div class="col-sm-12 col-md-6 input-div">
          <label>User</label>
          <select name="user_id" class="form-control select2" required>
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>الخدمة</label>
          <select name="service_id" id="service_id" class="form-control select2" required onchange="loadFields(this.value)">
            <option disabled selected>اختر خدمة</option>
            @foreach ($services as $service)
              <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>Technical</label>
          <select name="service_id" id="service_id" class="form-control select2" required onchange="loadFields(this.value)">
            <option disabled selected>Technical</option>
            @foreach ($techs as $tech)
              <option value="{{ $tech->id }}">{{ $tech->name  }} ({{ $tech->id }})</option>
            @endforeach
          </select>
        </div>
      </div>



      <div id="dynamic-fields-container" style="width:100%">

      </div>



      <div class="input-div" style="width:100%">
        <label>ملاحظات:</label>
        <textarea name="description" class="form-control" placeholder="أدخل أي تفاصيل إضافية..." col="7"></textarea>
      </div>

      <button type="submit" class="btn btn-primary mt-3">حفظ الطلب</button>
    </form>
  </div>
</div>

@endsection


@section('js')
<script>
  const routeTemplate = "{{ route('admin.order.serviceFields', ['service' => 'SERVICE_ID']) }}";
  function loadFields(serviceId) {
    const url = routeTemplate.replace('SERVICE_ID', serviceId);
    fetch(url)
      .then(res => {
        if (!res.ok) {
          throw new Error("حدث خطأ في تحميل الحقول");
        }
        return res.json();
      })
      .then(data => {
        let html = '';

        data.forEach(field => {
          html += `<div class="mb-3"><label class="fw-bold">${field.label}</label>`;

          if (['text', 'number', 'date'].includes(field.type)) {
            html += `
              <input
                type="${field.type}"
                name="field_${field.id}"
                class="form-control"
                ${field.required ? 'required' : ''}
                placeholder="أدخل ${field.label}"
              >`;
          }

          else if (field.type === 'select' || field.type === 'checkbox') {
            let options = [];

            try {
              options = JSON.parse(field.options || '[]');
            } catch (e) {
              console.error('فشل في تحليل خيارات JSON:', e);
            }

            options.forEach(opt => {
              let inputType = field.type === 'select' ? 'radio' : 'checkbox';
              let name = field.type === 'checkbox' ? `field_${field.id}[]` : `field_${field.id}`;
              html += `
                <div class="form-check">
                  <input class="form-check-input" type="${inputType}" name="${name}" value="${opt}" id="field_${field.id}_${opt}">
                  <label class="form-check-label" for="field_${field.id}_${opt}">${opt}</label>
                </div>`;
            });
          }

          html += `</div>`;
        });

        document.getElementById('dynamic-fields-container').innerHTML = html;
      })
      .catch(error => {
        console.error(error);
        document.getElementById('dynamic-fields-container').innerHTML = `<div class="alert alert-danger">فشل في تحميل الحقول. حاول مجددًا.</div>`;
      });
  }
</script>
@endsection
