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
                  <h4 class="card-title ">Dash Board</h4>
                   
                </div>
                <div class="card-body">
                    <div id="typography">
		                <div class="card-title">&nbsp;
 
		                </div>
		                <div class="row">
		                	<div class="tim-typo">
		                		 {{-- {{ dump($result)}} --}} 
		                      <span class="tim-note">Username</span>  {{ $username}} 
		                		 
		                  	</div>
		                  	<div class="tim-typo">
		                      <span class="tim-note">First Name</span>{{ $firstname}} 
		                  	</div>
		                  	<div class="tim-typo">
		                      <span class="tim-note">Last Name</span>{{ $lastname}}   
		                  	</div>
		                  	<div class="tim-typo">
		                      <span class="tim-note">Email</span>{{ $email}}   
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