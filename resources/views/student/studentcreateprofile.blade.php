<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Student Dashboard</title>
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

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/template/css/style.css')}}" rel="stylesheet">

</head>


<body>
  <header id="header" class="header fixed-top d-flex align-items-center ">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset("assets/images/dvc-logo.png")}}" alt="">
        <span class="d-none d-lg-block">DVC</span>
      </a>
    
    </div><!-- End Logo -->
  
  
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
  
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
  


  
        </li><!-- End Messages Nav -->
  
        <li class="nav-item dropdown pe-3">
  
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
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
  <div class="card" style="margin:100px 48px 48px 48px">

    <div class="card-body">
   
     <div class="col-md-3">  <h5 class="card-title">Create your student profile</h5> </div>
   
      <p>You need to complete the registration to proccedd to dashboard </p>

      <!-- Custom Styled Validation with Tooltips -->
      <form class="row g-3 needs-validation" action="{{ route('storeStudentProfile') }}" method="POST" novalidate>
        @csrf
        <div class="col-md-4 position-relative">
          <label for="validationTooltip01" class="form-label">First name</label>
          <input type="text"  name="first_name" class="form-control" id="validationTooltip01" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Middle name</label>
          <input type="text" class="form-control" name="middle_name" id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Last name</label>
          <input type="text" class="form-control" id="validationTooltip02" name="last_name"value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip04" class="form-label">Gender</label>
          <select class="form-select" name="gender" id="validationTooltip04" required>
            <option selected disabled value="">Choose...</option>
            <option>Female</option>
            <option>Male</option>
          </select>
          <div class="invalid-tooltip">
            Please select a Gender.
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Date of birth</label>
          <input type="date" class="form-control CustomDate"  name="date_of_birth" id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Contact No.</label>
          <input type="number" class="form-control" name="users_contact_number"id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Father's fullname</label>
          <input type="text" class="form-control" name="father_fullname" id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Mother's fullname</label>
          <input type="text" class="form-control"  name="mother_fullname" id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>  
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label">Parents Contact No.</label>
          <input type="number" class="form-control" name="parent_contact_number"id="validationTooltip02" value="" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
     
        <div class="col-md-12 position-relative">
          <label for="validationTooltip03" class="form-label">Address</label>
          <textarea type="text" class="form-control" name="address"id="validationTooltip03" style="height: 100px;" required></textarea>
          <div class="invalid-tooltip">
            Please provide a address.
          </div>
        </div>


        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form><!-- End Custom Styled Validation with Tooltips -->
      
    </div>
  </div>

  <footer id="" class="footer">
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

</body>

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