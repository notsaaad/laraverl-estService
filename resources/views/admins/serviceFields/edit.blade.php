@extends('admins.layout.master')

@section('title', 'Edit Fields for Service')

@section('content')
<div class="main-form">
  <div class="container">
    <h2>تعديل الحقول للخدمة: <span class="text-primary">{{ $service->name }}</span></h2>

    <form action="{{ route('admin.service.updateFieldPost', $service->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div id="dynamic-fields-wrapper">
        @foreach ($service->fields as $index => $field)
          <div class="border p-3 mb-3 field-block" id="field-block-{{ $index }}">
            <input type="hidden" name="fields[{{ $index }}][id]" value="{{ $field->id }}">

            <div class="row">
              <div class="input-div col">
                <label>Field Label:</label>
                <input type="text" name="fields[{{ $index }}][label]" class="form-control" value="{{ $field->label }}" required>
              </div>

              <div class="input-div col">
                <label>Field Type:</label>
                <select name="fields[{{ $index }}][type]" class="form-control" onchange="toggleOptionsInput(this, {{ $index }})" required>
                  @foreach (['text', 'number', 'date', 'select', 'checkbox'] as $type)
                    <option value="{{ $type }}" {{ $field->type === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col">
                <div class="input-div"><label>Is Required?</label></div>
                <input type="checkbox" name="fields[{{ $index }}][required]" value="1" {{ $field->required ? 'checked' : '' }}>
              </div>
            </div>

            <div class="row mt-3 {{ in_array($field->type, ['select', 'checkbox']) ? '' : 'd-none' }}" id="options-{{ $index }}">
              <div class="input-div col">
                <label>الاختيارات (مفصولة بفاصلة):</label>
                <input type="text" name="fields[{{ $index }}][options]" value="{{ is_array($field->options) ? implode(',', $field->options) : '' }}" class="form-control">
              </div>
            </div>

            <div class="text-end mt-2">
              <form class="action" method="post" action="{{ route('admin.services.deletefield') }}">
                @csrf
                <input type="hidden" name="service_id" value="{{  $service->id }}">
                <input type="hidden" name="id" value="{{  $field->id }}">
                <button class="btn btn-sm btn-outline-danger">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </div>
          </div>
        @endforeach
        <div class="row">
          <div class="input-div">
            {{-- <button type="submit" class="submit-btn btn btn-primary">حفظ التعديلات</button> --}}
            <input type="submit" value="حفظ التعديلات">
          </div>
        </div>
      </div>

    </form>
  </div>
</div>

<script>
  function toggleOptionsInput(selectElem, index) {
    const optionsDiv = document.getElementById(`options-${index}`);
    if (selectElem.value === 'select' || selectElem.value === 'checkbox') {
      optionsDiv.classList.remove('d-none');
    } else {
      optionsDiv.classList.add('d-none');
    }
  }

  function removeField(index) {
    const fieldBlock = document.getElementById(`field-block-${index}`);
    if (fieldBlock) {
      fieldBlock.remove();
    }
  }
</script>
@endsection
