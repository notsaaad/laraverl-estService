@extends('admins.layout.master')

@section('title', 'View Jobs')


@section('content')

        <div class="container">

            <!-------------------- bage header --------------------------------------------->

                <div class="header-table">
                <h2 class="header-title">Jobs</h2>
                <input type="text" class="search-box" placeholder="Search job...">
                </div>


            <!------------------------------------ table-user ----------------------------------------->

            <!-------------------- table-header ----------------------------------------->
                <table class="users-table">
                    <thead>
                        <tr class="table-header">
                          <th class="col-userid">ID</th>
                          <th class="col-fullname">Name</th>
                          <th class="col-role">Active</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
            <!----------------------table-row ----------------------------------------->
                    <tbody>
                      @foreach ( $Jobs as  $job)
                        <tr class="user-row">
                          <td class="user-id">{{$job->id}}</td>
                            <td class="user-fullname">
                                <div class="user-profile">
                                    <span class="user-name">{{$job->name}}</span>
                                </div>
                            </td>
                            <td>
                              @if ($job->active)
                                <span class="badge text-bg-success">Active</span>
                              @else
                              <span class="badge text-bg-secondary">Not Active</span>
                              @endif
                            </td>
                            <td>
                              <div class="actions">
                                <a class="btn btn-primary" href="{{ route('admin.jobs.edit', $job->id) }}">تعديل</a>
                                <form class="action" action="{{ route('admin.jobs.delete') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $job->id }}">
                                  <button class="btn btn-outline-danger">مسح</button>
                                </form>
                              </div>
                            </td>
                          <tr>
                      @endforeach
                      @empty($Jobs)
                      <tr>
                        <td colspan="4">No jobs find</td>
                      </tr>
                      @endempty

                    <div class="center link">
                      {{ $Jobs->withQueryString()->links() }}
                    </div>
                    </tbody>
                </table>

        </div>

@endsection
