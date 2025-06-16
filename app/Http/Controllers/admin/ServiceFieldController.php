<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use App\Models\ServiceField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceFieldController extends Controller
{
    public function create(Service $service){
      return view('admins.serviceFields.add', get_defined_vars());
    }
    public function store(Request $request, Service $service){
        $request->validate([
            'fields.*.label' => 'required|string',
            'fields.*.type' => 'required|in:text,number,date,select,checkbox',
            'fields.*.options' => 'nullable|string',
        ]);

        foreach ($request->fields as $field) {
            ServiceField::create([
                'service_id' => $service->id,
                'label' => $field['label'],
                'type' => $field['type'],
                'required' => isset($field['required']),
                'options' => in_array($field['type'], ['select', 'checkbox']) ? json_encode(explode(',', $field['options'])) : null,
            ]);
        }

        return redirect()->route('admin.service.view')->with('success', 'تمت إضافة الحقول بنجاح');
    }

    public function edit(Service $service){
        $service->load('fields');
        return view('admins.serviceFields.edit', compact('service'));
    }

    public function update(Request $request, Service $service){
        foreach ($request->fields as $fieldData) {
            $field = ServiceField::findOrFail($fieldData['id']);
            $field->update([
                'label' => $fieldData['label'],
                'type' => $fieldData['type'],
                'required' => isset($fieldData['required']),
                'options' => in_array($fieldData['type'], ['select', 'checkbox']) ? json_encode(explode(',', $fieldData['options'] ?? '')) : null,
            ]);
        }

        return redirect()->route('admin.service.editFieldPost', $service->id)->with('success', 'تم حفظ التعديلات بنجاح');
    }

}
