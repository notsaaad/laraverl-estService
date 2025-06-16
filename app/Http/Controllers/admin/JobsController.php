<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class JobsController extends Controller
{
    function add(){
      return view('admins.jobs.add');
    }


    function postjob(Request $request){

      $data = $request->validate([
        'name'        => 'required|string',
        'active'      => 'nullable',
        'description' => 'required|string',

      ]);
      $data['active'] = $request->has('active') ? 1 : 0;




      Job::create($data);

      return back()->with('success', 'تم انشاء الوظيفة');
    }


    function view(){
      $Jobs = Job::paginate(self::Pagination_count);
      return view('admins.jobs.index', get_defined_vars());
    }

    function edit(Job $Job){
      return view('admins.jobs.edit', get_defined_vars());
    }

    function editpost(Job $Job, Request $request){
      $data = $request->validate([
        'name'        => 'required|string',
        'active'      => 'nullable',
        'description' => 'required|string',

      ]);
      $data['active'] = $request->has('active') ? 1 : 0;


      $Job->update($data);
      return redirect()->route('admin.jobs.view')->with('success', 'تم تحديث الوظيفة بنجاح');
    }


    function delete(Request $request){
      $Job_id = $request->id;
      $Job    = Job::findOrFail($Job_id);
      $Job->delete();
      return redirect()->route('admin.jobs.view')->with('success', 'تم مسح الوظيفة بنجاح');
    }
}
