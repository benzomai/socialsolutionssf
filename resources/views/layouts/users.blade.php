@extends('layouts.master')

@section('content')

  <div class="pagetitle">
    <h1 class="font-weight">Users List @yield('content')</h1>  
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
    
              <div class="card-body">
                <h5 class="card-title">Users <!--<span>| Today</span>--> &nbsp; <button type="button" class="btn waves-effect waves-light btn-success" data-bs-toggle="modal" data-bs-target="#addClient"><i class="bi bi-plus"></i>Add New User</button></h5> 
                  
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
                    @if(count($clients) > 0)
                    @foreach ($clients as $client)
                    <tr>
                      <th scope="row">{{ $client->client_id }}</th>
                      <td><a href="#" class="text-primary">{{ $client->client_name }}</a></td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>
                        @if($client->plan == 'basic') 
                          <span class="badge bg-success">BASIC</span>
                        @elseif ($client->plan == 'pro')
                          <span class="badge bg-info">PROFESSIONAL</span>
                        @else
                        <span class="badge bg-warning">OTHERS</span>
                        @endif
                      </td>
                      <td><span class="badge bg-success">Active</span></td>
                      <td><span class="badge bg-danger"><i class="bi bi-trash"></i></span></td>
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