@extends('admins.layout.master')

@section('title', 'View Oders')


@section('content')

        <div class="container">

            <!-------------------- bage header --------------------------------------------->

                <div class="header-table">
                <h2 class="header-title">Orders</h2>
                <input type="text" class="search-box" placeholder="Search order...">
                </div>


            <!------------------------------------ table-user ----------------------------------------->

            <!-------------------- table-header ----------------------------------------->
                <table class="users-table">
                    <thead>
                        <tr class="table-header">

                          <th class="col-userid">ID</th>
                          <th class="col-fullname">Service</th>
                          <th class="col-role">User</th>
                          <th class="col-email">Address</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Technical</th>
                          <th>View</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
            <!----------------------table-row ----------------------------------------->
                    <tbody>
                      @foreach ( $orders as  $order)
                        <tr class="user-row">
                            <td>{{$order->id}}</td>
                            <td>{{$order->service->name}}</td>
                            <td>{{$order->user->name}} ({{$order->user->id}})</td>
                            <td>{{$order->address}}</td>
                            <td>
                                @if ($order->status == "complete")
                                  <span class="badge bg-success">Complete</span>
                                @elseif($order->status == "pending")
                                  <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == "fail")
                                  <span class="badge bg-danger">Canceld</span>
                                @endif
                            </td>
                            <td>{{$order->date}}</td>
                            <td>{{ $order->tech->name ??  'None' }}</td>
                            <td> <a href="{{ route('ThankYouPage', $order->id) }}" class="btn btn-primary">View</a> </td>
                            <td>
                              <div class="actions">
                                <a class="btn btn-primary" href="{{ route('admin.users.edit', $order->id) }}">تعديل</a>
                                <form class="action" action="{{ route('admin.users.delete') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $order->id }}">
                                  <button class="btn btn-outline-danger">مسح</button>
                                </form>
                              </div>
                            </td>
                          <tr>
                      @endforeach
                      @empty($orders)
                      <tr>
                        <td colspan="5">no Orders find</td>
                      </tr>
                      @endempty

                    <div class="center link">
                      {{ $orders->withQueryString()->links() }}
                    </div>
                    </tbody>
                </table>

        </div>

@endsection
