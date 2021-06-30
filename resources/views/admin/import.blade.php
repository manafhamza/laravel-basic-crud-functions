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
                  <h4 class="card-title ">Import From Excel</h4>
                   
                </div>
                <div class="card-body">
                    <div id="typography">
                    <div class="card-title">&nbsp;
 
                    </div>
                  <form action="{{url('/admin/upload_file')}}" method="post" enctype="multipart/form-data">
                  	@csrf
                    <div class="row">
                      <div class="tim-typo col-md-12">
                         {{-- {{ dump($result)}} --}} 
                          <span class="tim-note">Instructions</span>  Please Download the Template file below. When you add the employees,give 0 for female and 1 form Male in the gender field to avoid Errors.
                          Password will be hashed automatically before saving.
                         
                        </div>
                      <div class="tim-typo col-md-12">
                         {{-- {{ dump($result)}} --}} 
                          <span class="tim-note">Template File</span>  <a href="{{asset('template.xlsx')}}">Download Template File</a> 
                         
                        </div>
                        <div class="tim-typo col-md-12">
                         {{-- {{ dump($result)}} --}} 
                          <span class="tim-note">Choose File</span>  <input type="file" accept=".xlsx" class="form-control" name="fileinput" value="" required> 
                         
                        </div>
                         

                         
                    </div>
                   <center><button type="submit" class="btn btn-primary">Save</button></center> 
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