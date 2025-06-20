@extends('admins.layout.master')

@section('title', 'Edit Order')

@section('content')

<div class="main-form">
  <div class="container">
    <h2>Edit Order #{{ $order->id }}</h2>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="input-div col-sm-12 col-md-6">
          <label for="name">Name <span>(required)</span></label>
          <input type="text" name="name" id="name" value="{{ old('name', $order->name) }}" placeholder="Enter order user name">
          @error('name') <small class="danger">{{ $message }}</small> @enderror
        </div>

        <div class="input-div col-sm-12 col-md-6">
          <label for="date">Date <span>(required)</span></label>
          <input type="date" name="date" class="form-control" value="{{ old('date', $order->date) }}" required>
          @error('date') <small class="danger">{{ $message }}</small> @enderror
        </div>

        <div class="input-div col-sm-12 col-md-6">
          <label for="email">Email <span>(required)</span></label>
          <input type="email" name="email" id="email" value="{{ old('email', $order->email) }}" placeholder="Enter order user email">
          @error('email') <small class="danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>User</label>
          <select name="user_id" class="form-control select2" required>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>Status</label>
          <select name="status" class="form-control select2" required>
            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="complete" {{ $order->status === 'complete' ? 'selected' : '' }}>Complete</option>
            <option value="fail" {{ $order->status === 'fail' ? 'selected' : '' }}>Fail</option>
          </select>
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>Service</label>
          <select name="service_id" id="service_id" class="form-control select2" disabled>
            @foreach ($services as $service)
              <option value="{{ $service->id }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>
                {{ $service->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-12 col-md-6 input-div">
          <label>Technical</label>
          <select name="tech_id" class="form-control select2" >
            <option value="">--Technical--</option>
            @foreach ($techs as $tech)
              <option value="{{ $tech->id }}" {{ $order->tech_id == $tech->id ? 'selected' : '' }}>
                {{ $tech->name }} ({{ $tech->id }})
              </option>
            @endforeach
          </select>
        </div>

        <div class="input-div col-sm-12 col-md-6">
          <label for="phone">phone <span>(required)</span></label>
          <input type="phone" name="phone" id="phone" value="{{ old('phone', $order->phone) }}" placeholder="Enter order user phone">
          @error('phone') <small class="danger">{{ $message }}</small> @enderror
        </div>
      </div>

      <div id="dynamic-fields-container" style="width:100%">
        @foreach ($fields as $field)
          @php
            $fieldName = 'field_' . $field->id;
            $value = $order->answers[$field->label] ?? '';
            $options = is_array($field->options) ? $field->options : json_decode($field->options ?? '[]', true);
          @endphp

          <div class="mb-3">
            <label class="fw-bold">{{ $field->label }}</label>

            @if (in_array($field->type, ['text', 'number', 'date']))
              <input type="{{ $field->type }}" name="{{ $fieldName }}" value="{{ $value }}" class="form-control" placeholder="أدخل {{ $field->label }}">

            @elseif ($field->type === 'select')
              @foreach ($options as $opt)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="{{ $fieldName }}" value="{{ $opt }}" id="{{ $fieldName }}_{{ $loop->index }}"
                    {{ $value == $opt ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{ $fieldName }}_{{ $loop->index }}">{{ $opt }}</label>
                </div>
              @endforeach

            @elseif ($field->type === 'checkbox')
              @php
                $checkedVals = is_array($value) ? $value : json_decode($value, true) ?? [];
              @endphp
              @foreach ($options as $opt)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="{{ $fieldName }}[]" value="{{ $opt }}" id="{{ $fieldName }}_{{ $loop->index }}"
                    {{ in_array($opt, $checkedVals) ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{ $fieldName }}_{{ $loop->index }}">{{ $opt }}</label>
                </div>
              @endforeach
            @endif
          </div>
        @endforeach
      </div>

      <div class="input-div" style="width:100%">
        <label>ملاحظات:</label>
        <textarea name="description" class="form-control" placeholder="أدخل أي تفاصيل إضافية..." rows="5">{{ $order->description }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary mt-3">تحديث الطلب</button>
    </form>
  </div>
</div>

@endsection
