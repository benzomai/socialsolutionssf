@extends('layouts.master')

@section('content')

<adduser-modal></adduser-modal>

  <div class="pagetitle">
    <h1 class="font-weight">Users List @yield('content')</h1>  
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
    
              <div class="card-body">
                <h5 class="card-title">Users <!--<span>| Today</span>--> &nbsp; <button type="button" class="btn waves-effect waves-light btn-success" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-plus"></i>Add New User</button></h5> 
                  
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">User ID#</th>
                      <th scope="col">Name</th>
                      <th scope="col">User Type</th>
                      <th scope="col">Email</th>
                      <th scope="col">Date Created</th>
                      <th scope="col">Date Updated</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($users) > 0)
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">{{ $user->id }}</th>
                      <td><a href="#" class="text-primary">{{ $user->name }}</a></td>
                      <td>
                        @if($user->user_type == '0') 
                          ADMIN
                        @elseif ($user->user_type == '1')
                          SMM
                        @elseif ($user->user_type == '2')
                            CLIENT
                        @else
                            UNASSIGNED
                        @endif
                      </td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->updated_at}}</td>
                      <td><span class="badge bg-warning pe-auto" role="button"><i class="bi bi-pencil-square"></i></span> &nbsp; <span class="badge bg-danger pe-auto" role="button"><i class="bi bi-trash"></i></span></td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
    
              </div>
          </div>
        </div><!-- end of list of client card -->
    </div>
  </section>

@endsection