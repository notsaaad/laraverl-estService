@extends('admins.layout.master')

@section('title', 'View Categories')


@section('content')

        <div class="container">

            <!-------------------- bage header --------------------------------------------->

                <div class="header-table">
                <h2 class="header-title">Categories</h2>
                <input type="text" class="search-box" placeholder="Search Category...">
                </div>


            <!------------------------------------ table-user ----------------------------------------->

            <!-------------------- table-header ----------------------------------------->
                <table class="users-table">
                    <thead>
                        <tr class="table-header">
                          <th>Image</td>
                          <th class="col-userid">ID</th>
                          <th class="col-fullname">Name</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
            <!----------------------table-row ----------------------------------------->
                    <tbody>
                      @foreach ( $Categories as  $cat)
                        <tr class="user-row">
                          <td> <img width="75" src="{{ ($cat->image) ? URL::asset(CategoriesImagePath(). $cat->image) : default_category_image() }}" alt="image"> </td>
                          <td class="user-id">{{$cat->id}}</td>
                            <td class="user-fullname">
                                <div class="user-profile">
                                    <span class="user-name">{{$cat->name}}</span>
                                </div>
                            </td>
                            <td>
                              <div class="actions">
                                <a href="{{ route('admin.service.editCategory', $cat->id) }}" class="btn btn-primary">تعديل</a>
                                <form action="{{ route('admin.services.deleteCategory') }}" class="action" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $cat->id }}">
                                  <button class="btn btn-outline-danger">مسح</button>
                                </form>
                              </div>
                            </td>
                          <tr>
                      @endforeach
                      @empty($Categories)
                      <tr>
                        <td colspan="3">no Categories find</td>
                      </tr>
                      @endempty

                    <div class="center link">
                      {{ $Categories->withQueryString()->links() }}
                    </div>
                    </tbody>
                </table>

        </div>

@endsection
