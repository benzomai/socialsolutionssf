@extends('layouts.master')

@section('content')

<adduser-modal></adduser-modal>

<!-- Delete a User Modal -->
<div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Delete User</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <form id="deleteUser" action="{{ route('users.destroy', 'id') }}" method="post">
                
                @csrf
                <input id="id" name="id" hidden>
            <div class="modal-body">
                <div class="mb-3">
                    <h3 class="text-danger">Are you sure you want to delete <span id="user-name"></span>?</h3>
                    <p class="text-danger">This will also delete it's data if this user is a client.</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter <span class="text-danger">"DELETE"</span> below to confirm</label>
                    <input type="text" id="confirmDelete" name="confirmation" class="form-control">
                    <div class="text-danger unconfirm-delete" hidden>
                      Please enter "DELETE" correctly.
                    </div>
                </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="toast text-white" style="position: absolute; top: 20px; right: 20px; z-index: 9999;" id="toastAlert" role="alert" aria-live="assertive" aria-atomic="true" >
  <div class="toast-header">
      <strong id="toastHeader" class="me-auto"></strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
      <span id="toastBody"></span>
  </div>
</div>

  <div class="pagetitle">
    <h1 class="font-weight">Social Media Manager List</h1>  
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
    
              <div class="card-body">
                <h5 class="card-title">Social Media Managers <!--<span>| Today</span>--> &nbsp; <button type="button" class="btn waves-effect waves-light btn-success" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-plus"></i>Add New User</button></h5> 
                  
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
                        <td><span class="badge bg-warning" role="button"><i class="bi bi-pencil-square"></i></span> &nbsp; 
                            <span class="badge bg-danger delete" 
                                  role="button" 
                                  data-bs-toggle="modal" 
                                data-bs-target="#deleteUser"
                                data-id="{{$user->id}}"
                                data-name="{{$user->name}}"><i class="bi bi-trash"></i></span></td>
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
