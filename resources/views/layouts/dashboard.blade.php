@extends('layouts.master')

@section('dash')
<div class="pagetitle">
    <h1 class="font-weight">Dashboard @yield('content')</h1>  
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <div class="col-12">
        <div class="row">

        <!-- No. of Clients Card -->
        <div class="col-xxl-3 col-md-12">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">No. of Clients<!--<span>| Today</span>--></h5>      

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-bag-check"></i>
              </div>
              <div class="ps-3">
                @if($clients == null)<h6>0</h6>@else<h6>{{ count($clients) }}</h6>@endif
                <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->

          <!-- SMM Card -->
          <div class="col-xxl-3 col-xl-12">

            <div class="card info-card customers-card">

              <!--<div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>-->

              <div class="card-body">
                <h5 class="card-title">No. of SMM <!--<span>| This Year</span>--></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
                    <!--<span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->
        </div>
      </div>
    </div>

    <div class="row">
      
      <!-- Create a Client Modal
      <div class="modal fade" id="addClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            @method('post')
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a client</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             
            </div>
            
            <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Client Business Name</label>
                      <input type="text" name="client_name" class="form-control">
                    </div>
                    <div class="row mb-3">
                      <div class="col">
                        <label for="select" class="form-label">Assigned User</label>
                        <select class="form-select" name="assigned_user" id="select" aria-label="Floating label select example">
                          <option value="0">Zero</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="select" class="form-label">Assigned SMM</label>
                        <select class="form-select" name="assign_smm" id="select" aria-label="Floating label select example">
                          <option value="0">Lou</option>
                          <option value="1">Kyra</option>
                          <option value="2">Lor</option>
                          <option value="3">Den</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Client Email Address</label>
                      <input type="email" class="form-control" name="client_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="select" class="form-label">Plan</label>
                        <select class="form-select" name="plan" id="select" aria-label="Floating label select example">
                          <option value="basic">Basic</option>
                          <option value="pro">Professional</option>
                          <option value="business">Business</option>
                        </select>
                    </div>
                    @if($errors->any())
                    <div class="mb-3">
                      <div class="alert alert-danger display-block" role="alert">
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    @endif
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success" value="Add Client" />
              </div>
            </form>
          </div>
        </div>
      </div> -->

      <addclient-modal :users='@json($users)'></addclient-modal>

      <!-- List of Clients Card -->
      <div class="col-7">
        <div class="card recent-sales overflow-auto">

          <div class="card-body">
            <h5 class="card-title">Clients <!--<span>| Today</span>--> &nbsp; <button type="button" class="btn waves-effect waves-light btn-success" data-bs-toggle="modal" data-bs-target="#addClient"><i class="bi bi-plus"></i>Add New Client</button></h5> 
              
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">Client ID#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Assigned SMM</th>
                  <th scope="col">Plan</th>
                  <th scope="col">Status</th>
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

    <!-- List of Clients Card -->
    <div class="col-5">
      <div class="card recent-sales overflow-auto">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Social Media Managers <!--<span>| Today</span>--></h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><a href="#">#2457</a></th>
                <td>Brandon Jacob</td>
                <td><a href="#" class="text-primary">At praesentium minu</a></td>
                <td>$64</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2147</a></th>
                <td>Bridie Kessler</td>
                <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                <td>$47</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2049</a></th>
                <td>Ashleigh Langosh</td>
                <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                <td>$147</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2644</a></th>
                <td>Angus Grady</td>
                <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                <td>$67</td>
                <td><span class="badge bg-danger">Rejected</span></td>
              </tr>
              <tr>
                <th scope="row"><a href="#">#2644</a></th>
                <td>Raheem Lehner</td>
                <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                <td>$165</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
            </tbody>
          </table>

        </div>
    </div>
  </div><!-- end of list of smm card -->

  </div>
  </section>

@endsection
