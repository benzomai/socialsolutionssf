@extends('layouts.master')

@section('content')

<adduser-modal></adduser-modal>

<!-- Update a SMM modal on admin view -->
<div class="modal fade" id="updateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('smm.update') }}" method="post">
        <div class="modal-header bg-warning">
            <h1 class="modal-title fs-5">Update SMM: ID <span id="updateSmmID"></span></h1>
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @csrf
            <input type="text" name="updateSmmIDInput" id="updateSmmIDInput" hidden>
          <div class="mb-3">
              <label for="updateInputName" class="form-label">Name</label>
              <input type="text" class="form-control" name="updateName" id="updateInputName">
          </div>
            <div class="mb-3">
                <label for="updateInputEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="updateEmail" id="updateInputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="updateInputName" class="form-label">New Password</label>
              <input type="password" class="form-control" name="updatePassword" id="updatePassword">
              <small id="emailHelp" class="form-text text-muted">Leave blank if you don't want to change this user's password</small>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-6">
                  <label>Status</label>
                  <select class="form-control" id="updateStatus" name="updateStatus">
                    <option value="active">ACTIVE</option>
                    <option value="vacation">VACATION</option>
                    <option value="inactive">INACTIVE</option>
                  </select>
                </div>
                <div class="col-6">
                  <label>Swap Count</label>
                  <input type="number" class="form-control" id="swapcount" name="swapcount">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete a SMM modal on admin view-->
<div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        <div class="modal-dialog">

        <div class="modal-content">
          <form id="deleteUser" action="{{ route('smm.destroy') }}" method="post">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Delete SMM</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            
            <div class="modal-body">
              
                
                @csrf
                <input id="id" name="id" hidden>
                <div class="mb-3">
                    <h3 class="text-danger">Are you sure you want to delete <span id="user-name"></span>?</h3>
                    <p class="text-danger">This will also delete all SMM data</p>
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

    @if(session()->get('message') == "update")
      <div class="alert alert-success">
          SMM Successfully Updated
      </div>
    @elseif(session()->get('message') == "delete")
    <div class="alert alert-danger">
        SMM Successfully Deleted
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
          <h5>Update SMM Failed</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
    
              <div class="card-body">
                <h5 class="card-title">Social Media Managers <!--<span>| Today</span>--> &nbsp; <button type="button" class="btn waves-effect waves-light btn-success" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-plus"></i>Add New User</button></h5> 
                  
                <table id="smmTable" class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">SMM ID#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Status</th>
                      <th scope="col">Email</th>
                      <th scope="col">Swap Count</th>
                      <th scope="col">Date Created</th>
                      <th scope="col">Date Updated</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($smm)
                        @foreach ($smm as $socmed)
                        <tr>
                        <th scope="row">{{ $socmed->socmed_id }}</th>
                        <td>{{ $socmed->name }}</td>
                        <td>
                            <span class="badge 
                            @if($socmed->socmed_status == 'active') bg-success
                            @elseif($socmed->socmed_status == 'vacation') bg-info
                            @else bg-danger @endif">{{$socmed->socmed_status}}</span>
                        </td>
                        <td>{{$socmed->email}}</td>
                        <td>{{$socmed->client_swap_count}}</td>
                        <td>{{$socmed->created_at}}</td>
                        <td>{{$socmed->updated_at}}</td>
                        <td><span class="badge bg-warning updateBtn" 
                                  role="button"
                                  data-bs-toggle="modal"  
                                  data-bs-target="#updateUser"><i class="bi bi-pencil-square"></i></span> &nbsp; 

                            <span class="badge bg-danger delete" 
                                  role="button" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#deleteUser"
                                  data-id="{{$socmed->id}}"
                                  data-name="{{$socmed->name}}"><i class="bi bi-trash"></i></span></td>
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
