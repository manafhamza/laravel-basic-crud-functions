 <!-- CSS Files -->
{{--   <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  CSS Just for demo purpose, don't include it in your project
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" /> --}}
  <div class="">
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                @foreach($employees as $employee)
                <div class="card-header card-header-primary">
                    
                  <h4 class="card-title " style="text-align: center;">{{$employee->firstName.' '.$employee->lastName.' - '.$employee->id}}</h4>
                  
                   
                </div>
                @endforeach
                <div class="personaldetais">
                   <h3>Personal Details</h3>
                  <table class="table" width="100%">
                    <tbody>
                       @foreach($employees as $employee)
                      <tr>
                        <td class="heading">Firstname</td><td>:</td><td>{{$employee->firstName}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Lastname</td><td>:</td><td>{{$employee->lastName}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Username</td><td>:</td><td>{{$employee->userName}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Email</td><td>:</td><td>{{$employee->email}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Address</td><td>:</td><td>{{$employee->address}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Gender</td><td>:</td><td>
                          @if($employee->gender == 0)Female @else Male @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="heading">Date of Birth</td><td>:</td>
                        <td>
                          @php
                            $dob = strtotime($employee->birthDate);
                            $dob = date('d-M-Y',$dob);
                          @endphp
                          {{$dob}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Date of Hiring</td><td>:</td><td>
                          @php
                            $doh = strtotime($employee->hireDate);
                            $doh = date('d-M-Y',$doh);
                          @endphp
                          {{$doh}}

                        </td>
                      </tr>
                      <tr>
                        <td class="heading">Salary</td><td>:</td><td>{{$employee->salary}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Phone</td><td>:</td><td>{{$employee->phone}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Created On</td><td>:</td><td>{{$employee->created_at}}</td>
                      </tr>
                      <tr>
                        <td class="heading">Updated On</td><td>:</td><td>@if($employee->updated_at==NULL) - @else {{$employee->updated_at}}@endif</td>
                      </tr>
 
                       
                      @endforeach
                    </tbody>
                  </table>
                     
                    </div>
                    


                    <div class="experience"> 
                        @if(count($experience)>0)
                          
                            <h3>Previous Experience </h3>
                            <table class="experencetable" border="1">
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Employer</th>
                                  <th>Experience</th>
                                  <th>Added On</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($experience as $value)
                                <tr>
                                  <td class="exptd">{{$value->experienceTitle}}</td>
                                  <td class="exptd">{{$value->employer}}</td>
                                  <td class="exptd">{{$value->years}} Years & {{$value->months}}</td>
                                  <td class="exptd">{{$value->created_at}}</td>

                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                         
                        @else
                         
                            <h5>No Previous Experience Added</h5>
                         
                       
                        @endif
                      </div>


                      <div class="experience"> 
                        @if(count($family)>0)
                          
                            <h3>Family Member </h3>
                            <table class="experencetable" border="1">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Relation</th>
                                  <th>Gender</th>
                                  <th>Added On</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($family as $value)
                                <tr>
                                  <td class="exptd">{{$value->firstName}} {{$value->lastName}}</td>
                                  <td class="exptd">{{$value->relation}}</td>
                                  <td class="exptd">@if($value->gender == 0) Female @else Male @endif</td>
                                  <td class="exptd">{{$value->created_at}}</td>

                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                         
                        @else
                         
                            <h5>No Family Members Added</h5>
                         
                       
                        @endif
                      </div>
                        
                </div>
                </div>
                
              </div>
            </div>
             
          </div>
        </div>
      </div>
       
    </div>
<style type="text/css">
   .heading
   {
    font-weight: bold;
    padding : 10px;
   }
   .exptd
   {
    width: 150px;
    padding: 10px;
    text-align:center;
    border: solid 1px;
   }
   .experiencetable th
   {
    border:solid 1px;
   }
</style>