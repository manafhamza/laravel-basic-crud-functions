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
                  <h4 class="card-title ">Family Members<div style="float: right;"><a href="{{url('employee/add_member')}}"><span class="material-icons">person_add_alt</span></a></div></h4>
                   
                </div>
                <div class="card-body">
                    
                    @if(count($family) == 0) <h3>No Family Members Added</h3>
                    @else
                    @foreach($family as $value)
                      <div id="typography"> <h3>{{$value->firstName.' '.$value->lastName}}<div style="float: right;"><a href="{{url('employee/delete_member/'.$value->id)}}"><span class="material-icons">delete</span></a></div></h3>
                        <div class="card-title">&nbsp;
                        </div>
                        <div class="row">
                          
                          <div class="tim-typo">
                            <span class="tim-note">Gender</span>  
                            @if($value->gender  == 0 ) Female @else Male @endif
                          </div>
                          <div class="tim-typo">
                            <span class="tim-note">Relation</span> {{$value->relation}}
                          </div>
                          <div class="tim-typo">
                            <span class="tim-note">Added On</span> 
                            @php 
                            $created_at = strtotime($value->created_at);
                            $created_at = date('d-M-Y H:i:s',$created_at);

                            @endphp
                            {{$created_at}}
                          </div>
                        </div>
                      </div>
                      @endforeach
                    @endif




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