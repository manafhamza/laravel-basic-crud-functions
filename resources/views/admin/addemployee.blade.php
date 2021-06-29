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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Employee</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('admin/saveEmployee')}}">
                     @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" name="fname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" class="form-control" required="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control" required>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email ID</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <select class="form-control bmd-label-floating" name="gender" required> 
                          	<option value="" selected >Gender</option>
                          	<option value="0">Female</option>
                          	<option value="1">Male</option>
                          </select>
                        </div>
                      </div>
                    </div>
                     
                    
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                        	<input type="date" name="dob" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Hiring</label>
                           
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          
                          <input type="date" name="doh" class="form-control" required>
                        </div>
                      </div>
                    </div>

                     
                     
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Salary</label>
                          <input type="number" name="salary" class="form-control" required>
                        </div>
                      </div>
                    </div>
                   

                     
                    <div class="row">
                       
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Employee</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
             
          </div>
        </div>
      </div>
       
    </div>

@endsection