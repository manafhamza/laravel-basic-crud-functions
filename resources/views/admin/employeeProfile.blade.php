@extends('admin/layout')
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
                  
                  <a class="dropdown-item" href="{{url('admin_logout')}}">Log out</a>
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
                @foreach($employees as $employee)
                <div class="card-header card-header-primary">
                    
                  <h4 class="card-title " style="text-align: center;">{{$employee->firstName.' '.$employee->lastName.' - '.$employee->id}}
                    <div style="float: right;"><a href="{{url('admin/exportpdf/'.$employee->id)}}" ><span class="material-icons">picture_as_pdf
</span></a></div>
                  </h4>
                  
                   
                </div>
                @endforeach
                <div class="card-body">
                    <div id="typography">
                    <div class="card-title">
                      <h3>Personal Details</h3>
 
                    </div>
                    <div class="row">
                      <div class="tim-typo col-md-6">
                         
                          <span class="tim-note">Username</span> {{$employee->userName}}   
                         
                        </div>
                        <div class="tim-typo ">
                          <span class="tim-note">Address</span> {{$employee->address}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Email</span> {{$employee->email}}   
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Gender</span> @if($employee->gender == 0) Female @else Male  @endif
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Date of Birth</span> 
                          @php
                            $dob = strtotime($employee->birthDate);
                            $dob = date('d-M-Y',$dob);

                          @endphp
                          {{$dob}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Date of Hiring</span>
                          @php
                            $doh = strtotime($employee->hireDate);
                            $doh = date('d-M-Y',$doh);

                          @endphp
                           {{$doh}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Salary</span> {{$employee->salary}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Phone</span> {{$employee->phone}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Created On</span>
                          @php
                            $created_at = strtotime($employee->created_at);
                            $created_at = date('d-M-Y H:i:s',$created_at);

                          @endphp
                          {{$created_at}}
                        </div>
                        <div class="tim-typo col-md-6">
                          <span class="tim-note">Last Updated On</span> @if($employee->updated_at == NULL)Not Updated yet @else {{$employee->updated_at}} @endif
                        </div>
                    </div>
                    
                        @if(count($experience)>0)
                         <div class="card-title">
                            <h3>Previous Experience </h3>
                        </div>
                        @else
                        <div class="card-title">
                            <h5>No Previous Experience Added</h5>
                        </div>

                        <br>
                        @endif
                        
                        @foreach($experience as $value)
                        
                        <div class="row" style="border:solid 1px #d3d3d3; margin-top: 10px;border-radius: 5px;">
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Title</span>  {{$value->experienceTitle}} 
                          </div>
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Years of Experience</span> {{$value->years}} Years @if($value->months > 0) {{ $value->months}} Months @endif
                          </div>
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Employer</span> {{$value->employer}}
                          </div>
                        </div>
                        @endforeach
 
                        @if(count($family) > 0 )
                         <div class="card-title">
                            <h3>Family Members </h3>
                        </div>
                        @else
                        <div class="card-title">
                            <h5>No Family Members Added </h5>
                        </div>
                        <br>
                        @endif
                         
                        @foreach($family as $value)
                        
                        <div class="row" style="border:solid 1px #d3d3d3; margin-top: 10px;border-radius: 5px;">
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Name</span>  {{$value->firstName.' '.$value->lastName}} 
                          </div>
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Gender</span>@if($value->gender == 0) Female Months @else Male @endif
                          </div>
                          <div class="tim-typo col-md-6">
                            <span class="tim-note">Relation</span> {{$value->relation}}
                          </div>
                        </div>
                        @endforeach
                        
                      
                </div>
                </div>
                
              </div>
            </div>
             
          </div>
        </div>
      </div>
       
    </div>

@endsection