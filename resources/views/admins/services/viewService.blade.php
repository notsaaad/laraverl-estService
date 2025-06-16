@extends('admins.layout.master')

@section('title', 'View Services')


@section('content')

        <div class="container">

            <!-------------------- bage header --------------------------------------------->

                <div class="header-table">
                <h2 class="header-title">Services</h2>
                <input type="text" class="search-box" placeholder="Search Services...">
                </div>


            <!------------------------------------ table-user ----------------------------------------->

            <!-------------------- table-header ----------------------------------------->
                <table class="users-table">
                    <thead>
                        <tr class="table-header">
                          <th>Image</td>
                          <th class="col-userid">ID</th>
                          <th class="col-fullname">Name</th>
                          <th>Price</th>
                          <th>Active</th>
                          <th>Cateogry</th>
                          <th>Fields</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
            <!----------------------table-row ----------------------------------------->
                    <tbody>
                      @foreach ( $Services as  $Service)
                        <tr class="user-row">
                          <td> <img width="75" src="{{ ($Service->image) ? URL::asset(ServiceImagePath(). $Service->image) : default_service_image() }}" alt="image"> </td>
                          <td class="user-id">{{$Service->id}}</td>
                            <td class="user-fullname">
                                <div class="user-profile">
                                    <span class="user-name">{{$Service->name}}</span>
                                </div>
                            </td>
                            <td>{{$Service->price}}</td>
                            <td>
                              @if ($Service->active)
                                <span class="badge text-bg-success">Active</span>
                              @else
                              <span class="badge text-bg-secondary">Not Active</span>
                              @endif
                            </td>
                            <td>{{$Service->category->name}}</td>
                            <td><a href="{{ route('admin.service.AddField', $Service->id) }}" class="btn btn-primary">Add</a></td>
                            <td>
                              <div class="actions">
                                <a href="{{ route('admin.service.Edit', $Service->id) }}" class="btn btn-primary">تعديل</a>
                                <form action="{{ route('admin.services.delete') }}" class="action" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $Service->id }}">
                                  <button class="btn btn-outline-danger">مسح</button>
                                </form>
                              </div>
                            </td>
                          <tr>
                      @endforeach
                      @empty($Services)
                      <tr>
                        <td colspan="3">no Categories find</td>
                      </tr>
                      @endempty

                    <div class="center link">
                      {{ $Services->withQueryString()->links() }}
                    </div>
                    </tbody>
                </table>

        </div>

@endsection
