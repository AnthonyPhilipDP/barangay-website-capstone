@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>List of Users</h2>
            <ol>
              <li><a href="/admin/home">Dashboard</a></li>
              <li>Users</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            <div class="card-body">
                <table class="table table-hover">
                    
                    <thead>
                    <tr>
                        <th>Names</th>
                        <th>Address</th>
                        <th>Email</th>

                    </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->name }} {{ $user->middle }} {{ $user->lastname }}</td>
                        {{-- If I have value --}}
                        @if($user->block != null || $user->lot != null || $user->phase != null || $user->subdivision != null)
                          <td>Block {{ $user->block }} Lot {{ $user->lot }} Phase {{ $user->phase }} {{ $user->subdivision }}, Punta I, Tanza, Cavite</td>
                        {{-- If I dont have value --}}
                        @else
                          <td>House no. {{ $user->house }} {{ $user->street }} Punta 1, Tanza, Cavite</td>
                        @endif
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
      </section>
@endsection