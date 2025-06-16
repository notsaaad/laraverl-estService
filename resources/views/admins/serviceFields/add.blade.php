@extends('admins.layout.master')

@section('title', 'Add Fields to Service')

@section('content')
<div class="main-form">
  <div class="container">
    <div class="d-flex flex-end">
      <a class="btn btn-outline-primary" href="{{ route('admin.service.editFieldPost',$service->id ) }}">تعديل الحقول</a>
    </div>
    <h2>إضافة حقول ديناميكية للخدمة: <span class="text-primary">{{ $service->name }}</span></h2>

    <form action="{{ route('admin.service.addFieldPost', $service->id) }}" method="POST">
      @csrf

      <div id="dynamic-fields-wrapper"></div>

      <button type="button" class="btn btn-outline-primary my-3" onclick="addDynamicField()">Add Row +</button>

      <div class="row">
          <div class="input-div">
              <button type="submit" class="submit-btn">Save</button>
          </div>
      </div>
    </form>
  </div>
</div>

<script>
  let fieldIndex = 0;

  function addDynamicField() {
    const wrapper = document.getElementById('dynamic-fields-wrapper');
    const html = `
      <div class="border p-3 mb-3">
        <div class="row">
          <div class="input-div col">
            <label>Field Lable:</label>
            <input type="text" name="fields[${fieldIndex}][label]" class="form-control" placeholder="Title" required>
          </div>

          <div class="input-div col">
            <label>Field Type: </label>
            <select name="fields[${fieldIndex}][type]" class="form-control select2" onchange="toggleOptionsInput(this, ${fieldIndex})" required>
              <option value="text">Text</option>
              <option value="number">Number</option>
              <option value="date">Date</option>
              <option value="select">Select</option>
              <option value="checkbox">CheckBox</option>
            </select>
          </div>

          <div class="col">
            <div class="input-div"><label>is required? </label></div>
            <input type="checkbox" name="fields[${fieldIndex}][required]" value="1">
          </div>
        </div>

        <div class="row mt-3 d-none" id="options-${fieldIndex}">
          <div class="input-div col">
            <label>الاختيارات (مفصولة بفاصلة):</label>
            <input type="text" name="fields[${fieldIndex}][options]" placeholder="Ex : Red,Blue,Green" class="form-control">
          </div>
        </div>
      </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
    fieldIndex++;
  }

  function toggleOptionsInput(selectElem, index) {
    const optionsDiv = document.getElementById(`options-${index}`);
    if (selectElem.value === 'select' || selectElem.value === 'checkbox') {
      optionsDiv.classList.remove('d-none');
    } else {
      optionsDiv.classList.add('d-none');
    }
  }
</script>
@endsection
