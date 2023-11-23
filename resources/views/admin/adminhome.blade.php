@extends('layouts.adminlayout')

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
      

        <!-- Left side columns -->
       
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">

              

                <div class="card-body">
                  <h5 class="card-title">Students<span>| Enrolled</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalEnrollments}}</h6>
                      <span class="text-success small pt-1 fw-bold">1st Sem</span> <span class="text-muted small pt-2 ps-1">2023-2024</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card  sales-card">


                <div class="card-body">
                  <h5 class="card-title">Assessment <span>| Enrollments</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalEnrollmentsassessment}}</h6>
                      <span class="text-success small pt-1 fw-bold">1st Sem</span> <span class="text-muted small pt-2 ps-1">2023-2024</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-3">

              <div class="card info-card customers-card" >
                <div class="card-body">
                  <h5 class="card-title">Pending <span>| Enrollments</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" >
                      <i class="bi bi-hourglass-bottom"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalEnrollmentspending}}</h6>
                      <span class="text-danger small pt-1 fw-bold">1st Sem</span> <span class="text-muted small pt-2 ps-1">2023-2024</span>

                    </div>
                  </div>

                </div>
              
              </div>

            </div>
            
            <div class="col-xxl-3 col-md-3">

              <div class="card info-card customers-card">   
                <div class="card-body">
                  <h5 class="card-title">Total Active Students</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"style="background:#FFFCE1">
                      <i class="bi bi-people" style="color: #FFE81D"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalStudents}}</h6>
                      <span class="text-danger small pt-1 fw-bold">1st Sem</span> <span class="text-muted small pt-2 ps-1">2023-2024</span>

                    </div>
                  </div>

                </div>
              
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
          

              </div>
          <!-- End Recent Sales -->

 
        
  <!-- End Left side columns -->

        <!-- Right side columns -->
   <!-- End Right side columns -->

    
    </section>

  </main><!-- End #main -->

  @endsection

