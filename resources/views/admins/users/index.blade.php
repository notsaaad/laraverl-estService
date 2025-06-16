@extends('admins.layout.master')

@section('title', 'View Users')


@section('content')

        <div class="container">

            <!-------------------- bage header --------------------------------------------->

                <div class="header-table">
                <h2 class="header-title">Users</h2>
                <input type="text" class="search-box" placeholder="Search users...">
                </div>


            <!------------------------------------ table-user ----------------------------------------->

            <!-------------------- table-header ----------------------------------------->
                <table class="users-table">
                    <thead>
                        <tr class="table-header">
                          <th>Image</td>
                            <th class="col-userid">ID</th>
                          <th class="col-fullname">Name</th>
                          <th class="col-role">Role</th>
                          <th class="col-email">Email</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
            <!----------------------table-row ----------------------------------------->
                    <tbody>
                      @foreach ( $users as  $user)
                        <tr class="user-row">
                          <td> <img width="75" src="{{ ($user->image) ? URL::asset(UsersImagePath().$user->image) : default_image() }}" alt="Profile"> </td>
                          <td class="user-id">{{$user->id}}</td>
                            <td class="user-fullname">
                                <div class="user-profile">
                                    <span class="user-name">{{$user->name}}</span>
                                </div>
                            </td>
                            <td class="user-role">{{$user->role}}</td>
                            <td class="user-email">{{$user->email}}</td>
                            <td>
                              <div class="actions">
                                <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">تعديل</a>
                                <form class="action" action="{{ route('admin.users.delete') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $user->id }}">
                                  <button class="btn btn-outline-danger">مسح</button>
                                </form>
                              </div>
                            </td>
                          <tr>
                      @endforeach
                      @empty($users)
                      <tr>
                        <td colspan="5">no users find</td>
                      </tr>
                      @endempty

                    <div class="center link">
                      {{ $users->withQueryString()->links() }}
                    </div>
                    </tbody>
                </table>

        </div>

@endsection
