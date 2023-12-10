@extends('layouts.studentlayout')
@section('title', 'Student - Home')
@section('content')
<style>
  @media screen and (max-width: 450px) {
  .table {
   font-size: 10px;
  }
}
</style>
<main id="main" class="main">
    
    

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

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
                @if($enrollment != null)
                <div class="card-body">
                  <h5 class="card-title">Enrollment<span> | Status</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6># {{ $enrollment->job_order}}</h6>
                      <span class="text-success small pt-1 fw-bold">{{$enrollment->status}}</span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

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
                @php
        $userunits = 0;
   if($courses != null){
    foreach($courses as $subjects){
      $userunits += $subjects->units;
    }

   }
                 





$userscholar = $enrollment->scholarship;

  $total = 
  $enrollment->registration +
  $enrollment->module +
  $enrollment->testing_fee + 
  $enrollment->library +
  $enrollment->instructional_materials +
  $enrollment->group_insurance +
  $enrollment->handbook +
  $enrollment->student_id +
  $enrollment->energy +
  $enrollment->facility_improvement +
  $enrollment->internet +
  $enrollment->maintenance_breakage+
  $enrollment->medical +
  $enrollment->athletic + // Add + here
  $enrollment->guidance_counseling +
  $enrollment->school_publication +
  $enrollment->student_organization +
  $enrollment->computer_laboratory +
  $enrollment->insurance +
  $enrollment->development +
  $enrollment->science_laboratory +
  $enrollment->academic_cultural +
  $enrollment->audio_visual;

  $tuition = 0;
  $portion = 0;
if($enrollment->course == "BSIT"){
  $total += $enrollment->comlab_bsit;
}
if( $enrollment->enrollment_type == "college"){
  $userscholar /= 100;
  
  
  $tuition  = $userunits * $enrollment->units;
  $portion = $tuition * $userscholar;
 
}
if( $enrollment->enrollment_type == "Senior High"){
  $tuition  = $enrollment->units;
}
$finaltuition = $tuition - $portion;



                $newpayment = 0;
                @endphp
                @foreach ($enrollment->payments as $payment)
                @php
                  
             $newpayment += $payment->amount;
            
                @endphp
                  
             @endforeach

                <div class="card-body">
                  <h5 class="card-title">Tuition Fee<span>| This Semester</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Paid - ₱{{$newpayment}}</h6>
                
                      <span class="text-success small pt-1 fw-bold">₱{{$finaltuition+$total}}</span> <span class="text-muted small pt-2 ps-1">Total tuition</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

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
                  <h5 class="card-title">Monthly Dues <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>₱{{(($finaltuition+$total)-$enrollment->registration)/4}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Balance</span> <span class="text-muted small pt-2 ps-1">₱{{($finaltuition+$total)-$newpayment}}</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->







          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <!-- End Right side columns -->

      </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
  

            <div class="card-body pb-0">
             
              <h5 class="card-title">Schedule | {{$enrollment->course ." ". $enrollment->year ." ". $enrollment->semester." A.Y ". $enrollment->school_year }}</h5>
              @else
              <div class="card-body">
                <h5 class="card-title">Enrollment<span> | Status</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-card-text"></i>
                  </div>
                  <div class="ps-3">
                    <h5>You haven't enrolled yet</h5>
                
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

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
                <h5 class="card-title">Balance <span>| This Semester</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h5>You haven't enrolled yet</h5>
                    

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

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
                <h5 class="card-title">Monthly Dues <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5>You haven't enrolled yet</h5>
                    

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->







        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <!-- End Right side columns -->

    </div>
    <div class="row">
      <div class="col-lg-12">

        <div class="card">


          <div class="card-body pb-0" >
           
            <h5 class="card-title">Schedule<span>|  </span></h5>
                @endif

              <table class="table table-sm table-bordered table-responsive" >
                <thead>

                   <tr>
                     <th>
                    Code
                  </th>
                  <th>
                    Course Description
                  </th>
                <th>Teacher</th>
                <th>Schedule</th>
                </tr>
                </thead>
                <tbody>
                  @if($courses != null)
                  @foreach($courses as $subjects )
                <tr> 
                  <td>{{$subjects->course_code}}</td>
                  <td>{{$subjects->course_description}}</td>
                  <td>{{$subjects->name}}</td>
                  @php
                  $schedule = $subjects->schedule;
                  $days = explode('/', $schedule);
                    @endphp
                 <td style="font-size:13px;">@foreach($days as $day)
                  {{ $day }}<br>
                  
                  @endforeach</td>
                </tr>
                @endforeach
                @else
                   <tr>
                    <td colspan="4" class="text-center">Please enroll to view subject</td>
                   </tr>
                @endif
                </tbody>
              </table> 

            </div>
          </div><!-- End News & Updates -->

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection

