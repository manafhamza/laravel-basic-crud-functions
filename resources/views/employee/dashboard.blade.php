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
        <span >&nbsp;
                           @if(session()->has('success'))
                              <span class="success">
                             {{ session()->get('success') }}
                           </span>
                           @elseif(session()->has('failed'))
                           <span class="failed">
                             {{ session()->get('failed') }}
                           </span>

                             @endif
                           
                           
                        </span>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Dash Board<div style="float: right;"><a href="{{url('employee/edit')}}"><span class=" material-icons">edit</span></a></div></h4>
                   
                </div>
                <div class="card-body">
                    <div id="typography">
                    <div class="card-title">&nbsp;
 
                    </div>
                    <div class="row">
                        <div class="tim-typo col-md-6">
                         {{-- {{ dump($result)}} --}} 
                          <span class="tim-note">Username</span>  {{ $username}} 
                         
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">First Name</span>{{ $firstname}} 
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Last Name</span>{{ $lastname}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Email</span>{{ $email}}   
                        </div>
                        <div class="tim-typo col-md-12">
                          <span class="tim-note">Address</span>{{ $address}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Gender</span> @if($gender == 0) Female @else Male @endif   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Salary</span>{{ $salary}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Date of Birth</span>
                          @php
                            $dob = strtotime($dob);
                            $dob = date('d-M-Y',$dob);
                          @endphp

                          {{ $dob}}   
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
                          <span class="tim-note">Phone</span>{{ $phone}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Created On</span>
                          @php
                            $created_at = strtotime($created_at);
                            $created_at = date('d-M-Y H:i:s',$created_at);
                          @endphp
                          {{ $created_at}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Last Update On</span>@if(!empty($updated_at)) 
                          @php
                          $updated_at = strtotime($updated_at);
                            $updated_at = date('d-M-Y H:i:s',$updated_at);
                            @endphp
                          {{ $updated_at}} @else  Not updated Yet @endif
                        </div>
                    </div>
                </div>

                </div>
              </div>
            </div>
             
          </div>
        </div>
      </div>
       
    </div>

@endsection
<style type="text/css">
  .success
  {
    color:green;
    font-weight: bold;
  }
  .failed
  {
    color: red;
    font-weight: bold;
  }
</style>