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
        <span class="success">@if(session()->has('success'))
                              <span class="success">
                             {{ session()->get('success') }}
                           </span>
                             @endif</span>
                             <span class="success">@if(session()->has('failed'))
                              <span class="failed">
                             {{ session()->get('failed') }}
                           </span>
                             @endif</span>
        <div class="container-fluid">

          <div class="row">

            <div class="col-md-12">
              <div class="card">

                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Export to Excel </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Emp ID
                        </th>
                        <th>
                          First Name
                        </th>
                        <th>
                          Last Name
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          Address
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Gender
                        </th>
                        <th>
                          Date of Birth
                        </th>
                        <th>
                          Date of Hiring
                        </th>
                        <th>
                          Salary
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Created On
                        </th>
                        <th>
                          Updated On
                        </th>
                      </thead>
                      <tbody>
                        @php 
                        $sno =1 ;
                        @endphp
                        @foreach($employees as $employee) 
                        <tr>
                          <td>
                            {{ $sno}}
                          </td>
                          <td>
                            {{$employee->id}}
                          </td>
                          <td>
                            {{ $employee->firstName}} 
                          </td>
                          <td>
                            {{ $employee->lastName}} 
                          </td>
                          <td>
                            {{ $employee->userName}} 
                          </td>
                          <td>
                            {{ $employee->address}}
                          </td>
                          <td class="text-primary">
                            @if($employee->gender == 0)
                            Female
                            @else
                            Male
                            @endif
                          </td>
                          <td class="text-primary">
                            {{ $employee->salary}}
                          </td>
                          <td>
                            {{ $employee->birthDate}} 
                          </td>
                          <td>
                            {{ $employee->hireDate}} 
                          </td>
                          <td>
                            {{ $employee->salary}} 
                          </td>
                          <td>
                            {{ $employee->phone}} 
                          </td>
                          <td>
                            {{ $employee->created_at}} 
                          </td>
                          <td class="text-primary">
                            {{ $employee->updated_at}} 
                              
                          </td>
                        </tr>
                        @php
                        $sno++;
                        @endphp
                         
                        @endforeach
                      </tbody>
                    </table>
                    
                    
                  </div>
                  <div><center>
                    <a href="{{url('admin/export_excel')}}"><button type="submit" class="btn btn-primary">Export to Excel</button></a></center>
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