<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>@yield('title', 'DVC')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
 
  <link href="{{ asset('assets/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/template/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/template/css/style.css')}}" rel="stylesheet">
  <style>
    .custom-card {
        width: 100%;
    }
    .subject-checkboxes {
        margin-left: 20px;
    }
</style>

</head>
<body>

{{--Page header --}}
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset("assets/images/dvc-logo.png")}}" alt="">
        <span class="d-none d-lg-block">DVC</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <!-- End Search Icon-->




        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class=" d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ ucfirst(Auth::user()->role) }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              @php
            $user = auth()->user();
            $profile = $user->profiles;
            @endphp
            @if($profile)
              <a class="dropdown-item d-flex align-items-center" href="{{ route('student.profile', ['profileUuid' =>$profile->uuid]) }}">

                <i class="bi bi-person"></i>
              <span>
              
                My Profile</span> 
              </a>

              @else
              <p>No profile found for this user.</p>
              @endif
            </li>
            <li>
              <hr class="dropdown-divider">
            </li

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">Sign Out</span>
              </a>
            </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
{{-- Page Sidebar --}}
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'showStudentHome' ? '' : 'collapsed' }}" href="{{route('showStudentHome')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'student.profile' ? '' : 'collapsed' }}"  data-bs-target="#components-nav" data-bs-toggle="collapse">
          <i class="bi bi-menu-button-wide"></i><span>Student Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ Route::currentRouteName() == 'student.profile' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Route::currentRouteName() == 'student.profile' ? 'active' : '' }}" href="{{ route('student.profile', ['profileUuid' =>$profile->uuid]) }}">
              <i class="bi bi-circle" ></i><span>Profile</span>
            </a>
          </li>
          <li hidden>
            <a href="#">
              <i class="bi bi-receipt"style="font-size: 1rem;"></i><span>Financial Statement</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" data-bs-target="#forms-navBSITsched" data-bs-toggle="collapse" href="#">
              <i class="bi bi-file-text" style="font-size: 1rem;"></i><span>Academic Transcript</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-navBSITsched" class="nav-content collapse" data-bs-parent="#classched">
              <li>
                <a style="font-size: 15px; padding : 0px 0px 0px 35px" href="{{ route('showCurrentStudentDetails', ['enrollment_type' => 'college', 'student_id_number' => $profile->student_id_number]) }}">  
                  <i class="bi bi-circle"></i><span>College</span>
                </a>
              </li>
              <li>
                <a style="font-size: 15px; padding : 0px 0px 0px 35px" href="{{ route('showCurrentStudentDetails', ['enrollment_type' => 'Senior High', 'student_id_number' => $profile->student_id_number]) }}">
                  <i class="bi bi-circle"></i><span>Senior High</span>
                </a>
              </li>
            </ul>
          </li>
       
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'student.enrollment' || Route::currentRouteName() == 'student.enrollmentlist' ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Enrollment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse {{ Route::currentRouteName() == 'student.enrollment' || Route::currentRouteName() == 'student.enrollmentlist' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Route::currentRouteName() == 'student.enrollment' ? 'active' : '' }}" href="{{route('student.enrollment')}}">
              <i class="bi bi-circle"></i><span>Enrollment Form</span>
            </a>
          </li>
          <li>
            <a class="{{ Route::currentRouteName() == 'student.enrollmentlist' ? 'active' : '' }}" href="{{route('student.enrollmentlist')}}">
              <i class="bi bi-circle"></i><span>Enrollment History</span>
            </a>
          </li>
    
        </ul>
      </li><!-- End Forms Nav -->




      </li><!-- End Icons Nav -->


    </ul>

  </aside><!-- End Sidebar-->
{{-- Page content --}}


@yield('content')
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Dvc Student</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-assets/template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/template/vendor/php-email-form/validate.js') }}"></script>


  

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/template/js/main.js') }}"></script>

</body>

</html>