@extends('layouts.studentlayout')
@section('title', 'Student - Home')
@section('content')
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

                <div class="card-body">
                  <h5 class="card-title">Enrollment<span> | Status</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>#29392</h6>
                      <span class="text-success small pt-1 fw-bold">Approved</span> <span class="text-muted small pt-2 ps-1"></span>

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
                      <h6>₱10,264</h6>
                      <span class="text-success small pt-1 fw-bold">₱12,000</span> <span class="text-muted small pt-2 ps-1">Total tuition</span>

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
                      <h6>2,200</h6>
                      <span class="text-danger small pt-1 fw-bold">Paid</span> <span class="text-muted small pt-2 ps-1">Final</span>

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
              @if($enrollment)
              <h5 class="card-title">Schedule<span>| {{$enrollment->course .' '. $enrollment->year .' '. $enrollment->school_year ." | ". $enrollment->semester}}</span></h5>
                @endif
              <table class="table table-sm table-bordered">
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
                  @foreach($courses as $subjects )
                <tr> 
                  <td>{{$subjects->course_code}}</td>
                  <td>{{$subjects->course_description}}</td>
                  <td>{{$subjects->name}}</td>
                  <td>{{$subjects->schedule}}</td>
                </tr>
                @endforeach
                </tbody>
              </table> 

            </div>
          </div><!-- End News & Updates -->

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection

