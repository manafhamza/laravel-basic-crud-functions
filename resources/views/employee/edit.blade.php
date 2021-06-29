@extends('employee/layout')
@section('main')

  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
               
              </div>
            </form>
            <ul class="navbar-nav">
               
               
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  
                  <a class="dropdown-item" href="{{url('logout')}}">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Personal Details</h4>
                   
                </div>
                <div class="card-body">
                    <div id="typography">
                    <div class="card-title">&nbsp;
 
                    </div>
                  <form action="{{url('/employee/update')}}" method="post">
                  	@csrf
                    <div class="row">
                        <div class="tim-typo col-md-6">
                         {{-- {{ dump($result)}} --}} 
                          <span class="tim-note">Username</span>  {{ $username}} 
                         
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">First Name</span> <input type="text" class="form-control" name="fname" value="{{$firstname}}"> 
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Last Name</span><input type="text" class="form-control" name="lname" value="{{$lastname}}">    
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Email</span>{{ $email}}   
                        </div>
                        <div class="tim-typo col-md-12">
                          <span class="tim-note">Address</span><input type="text" class="form-control" name="address" value="{{$address}}">  
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Gender</span> @if($gender == 0) Female @else Male @endif   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Salary</span>{{ $salary}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Date of Birth</span>
                          <input type="date" name="dob" value="{{$dob}}" class="form-control">
                            
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Date of Hiring</span>
                           @php
                            $doh = strtotime($doh);
                            $doh = date('d-M-Y',$doh);
                          @endphp

                          {{ $doh}}  
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Phone</span><input class="form-control" type="text" name="phone" value="{{$phone}}">  
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Created On</span>{{ $created_at}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Last Update On</span>@if(!empty($updated_at)) {{ $updated_at}} @else  Not updated Yet @endif
                        </div>
                    </div>
                   <center><button type="submit" class="btn btn-primary">Update</button></center> 
                   </form>
                </div>

                </div>
              </div>
            </div>
             
          </div>
        </div>
      </div>
       
    </div>

@endsection