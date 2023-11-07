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
<style>
  #snackbar {
  display: none;
  min-width: 250px;
  padding: 16px;
  border-radius: 4px;
  background-color: #333;
  color: #fff;
  text-align: center;
  position: fixed;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  
}
  .profile-pic-wrapper {
  height: 40vh;
  width: 100%;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.pic-holder {
  text-align: center;
  position: relative;
  border-radius: 50%;
  width: 150px;
  height: 150px;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.pic-holder .pic {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  -o-object-position: center;
  object-position: center;
}

.pic-holder .upload-file-block,
.pic-holder .upload-loader {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(90, 92, 105, 0.7);
  color: #f8f9fc;
  font-size: 12px;
  font-weight: 600;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
}

.pic-holder .upload-file-block {
  cursor: pointer;
}

.pic-holder:hover .upload-file-block,
.uploadProfileInput:focus ~ .upload-file-block {
  opacity: 1;
}

.pic-holder.uploadInProgress .upload-file-block {
  display: none;
}

.pic-holder.uploadInProgress .upload-loader {
  opacity: 1;
}

/* Snackbar css */


@-webkit-keyframes fadein {
  from {
    bottom: 0;
    opacity: 0;
  }
  to {
    bottom: 30px;
    opacity: 1;
  }
}

@keyframes fadein {
  from {
    bottom: 0;
    opacity: 0;
  }
  to {
    bottom: 30px;
    opacity: 1;
  }
}

@-webkit-keyframes fadeout {
  from {
    bottom: 30px;
    opacity: 1;
  }
  to {
    bottom: 0;
    opacity: 0;
  }
}

@keyframes fadeout {
  from {
    bottom: 30px;
    opacity: 1;
  }
  to {
    bottom: 0;
    opacity: 0;
  }
}

</style>

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
   
      <p>You need to complete the registration to procced to dashboard </p>
      @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
      
  @endif
      <!-- Custom Styled Validation with Tooltips -->
      <form class="row g-3 needs-validation" enctype="multipart/form-data"  action="{{ route('storeStudentProfile') }}" method="POST" novalidate>
        @csrf

        <div class="profile-pic-wrapper">
          <div class="pic-holder">
            <!-- uploaded pic shown here -->
            <img id="profilePic" class="pic" src="{{ asset('assets/images/student.jpg')}}">
            
            <img id="preview" class="pic" src="#" style="display: none;">

            <input class="uploadProfileInput" type="file" name="avatar" id="newProfilePhoto" accept="image/*" style="opacity: 0;"onchange="getImagePreview(event)"/>
            <label for="newProfilePhoto" class="upload-file-block">
              <div class="text-center">
                <div class="mb-2">
                  <i class="fa fa-camera fa-2x"></i>
                </div>
                <div class="text-uppercase">
                  Update <br /> Profile Photo
                </div>
              </div>
            </label>
          </div>
        
          </hr>
          <p class=" text-center small">Required: Upload ID picture </p>
        </div>
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
        </div >
        <div class="col-md-12 mb-0 pb-0">  <h5 class="card-title pb-0 mb-0">Required Documents</h5> <p class="pt-0 mb-0" style="font-size: 14px; color:red;">
          Note : Upload in PDF format</p> </div>
          

<div class="col-md-3 position-relative">
  <label class="form-label" for="customFile">PSA Birth<span style="font-size:14px; color:red;"> (Required for New Students)</span></label>
  <input type="file" class="form-control" name="psaBirth_doc" id="customFile" />
</div>
<div class="col-md-3 position-relative">
  <label class="form-label" for="customFile">Good moral <span style="font-size:14px; color:red;"> (Required for New Students)</span></label>
  <input type="file" class="form-control" name="goodMoral_doc"id="customFile" />
</div>
<div class="col-md-3 position-relative">
  <label class="form-label" for="customFile">TOR/Report Card<span style="font-size:14px; color:red;"> (Required for New Students)</span></label>
  <input type="file" class="form-control" name="tor_doc" id="customFile" />
</div>
<div class="col-md-3 position-relative">
  <label class="form-label" for="customFile">Form 137<span style="font-size:14px; color:red;"> (Required for New Students)</span></label>
  <input type="file" class="form-control" name="form137_doc" id="customFile" />
</div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </form><!-- End Custom Styled Validation with Tooltips -->
      
    </div>
  </div>
  <div id="snackbar" style="display: none; font-size:13px"></div>

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
  <script>


// document.addEventListener("change", function(event) {
//   if (event.target.classList.contains("uploadsdsProfileInput")) {
//     var triggerInput = event.target;
//     var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic").src;
//     var holder = triggerInput.closest(".pic-holder");
//     var wrapper = triggerInput.closest(".profile-pic-wrapper");
    
//     var alerts = wrapper.querySelectorAll('[role="alert"]');
//     alerts.forEach(function(alert) {
//       alert.remove();
//     });

//     triggerInput.blur();
//     var files = triggerInput.files || [];
//     if (!files.length || !window.FileReader) {
//       return;
//     }
    
//     if (/^image/.test(files[0].type)) {
//       var reader = new FileReader();
//       reader.readAsDataURL(files[0]);

//       reader.onloadend = function() {
//         holder.classList.add("uploadInProgress");
//         holder.querySelector(".pic").src = this.result;

//         var loader = document.createElement("div");
//         loader.classList.add("upload-loader");
//         loader.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
//         holder.appendChild(loader);

//         setTimeout(function() {
//           holder.classList.remove("uploadInProgress");
//           loader.remove();

//           var random = Math.random();
//           if (random < 0.9) {
//             wrapper.innerHTML += '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
//             triggerInput.value = "";
//             setTimeout(function() {
//               wrapper.querySelector('[role="alert"]').remove();
//             }, 3000);
//           } else {
//             holder.querySelector(".pic").src = currentImg;
//             wrapper.innerHTML += '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
//             triggerInput.value = "";
//             setTimeout(function() {
//               wrapper.querySelector('[role="alert"]').remove();
//             }, 3000);
//           }
//         }, 1500);
//       };
//     } else {
//       wrapper.innerHTML += '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
//       setTimeout(function() {
//         var invalidAlert = wrapper.querySelector('[role="alert"]');
//         if (invalidAlert) {
//           invalidAlert.remove();
//         }
//       }, 3000);
//     }
//   }
// });

function getImagePreview(event){
  var image =URL.createObjectURL(event.target.files[0]);
   var oldAvatar = document.getElementById('profilePic'); 
  var previewElement = document.getElementById('preview');  
  
  oldAvatar.style.display = 'none'; 
  previewElement.style.display = 'block'; 
  previewElement.src = image;
  showSnackbar("ID picture updated successfully");
  
}
function showSnackbar(message) {
  var snackbar = document.getElementById("snackbar");
  snackbar.style.display = "block";
  snackbar.textContent = message;
  // After 3 seconds, hide the snackbar
  setTimeout(function(){
    snackbar.style.display = "none";
  }, 3000);
}
  </script>