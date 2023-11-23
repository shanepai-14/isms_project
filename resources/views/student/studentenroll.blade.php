@extends('layouts.studentlayout')
@section('title', 'Enrollment')
<head>
    <link href="{{ asset('assets/table/css/style.css') }}" rel="stylesheet">
  </head>
@section('content')
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin: 20px
  }
  
  td, th {
    border: 1px solid #0e0d0d;
    text-align: left;
    padding: 8px;
  }
  
  #loading-screen {
  position: absolute; /* Set the position to absolute */
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  transform: translate(-50%, -50%); /* Center the div perfectly */
  background: rgba(255, 255, 255, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

#loading-spinner {
  border: 4px solid rgba(255, 255, 255, 0.3);
  border-top: 4px solid #000;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#loading-text {
  margin-top: 10px;
  font-size: 18px;
}


  </style>
    
<main id="main" class="main">
    <?php 
    $currentMonth = date('m'); // Get today's date
    $activeSemester;
    // Define the start dates of the two semesters

    
    if ($currentMonth >= 7 && $currentMonth <= 12) {
        $activeSemester = '1st Semester';
    } else if ($currentMonth >= 1 && $currentMonth <= 6) {
        $activeSemester = '2nd Semester';
    } else {
        return 'Invalid date';
    }

    ?>
      
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Student Information</li>
          <li class="breadcrumb-item active">Enroll</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
      

        <div class="col-xl-12" >

          <div class="card h-100 w-100 d-inline-block">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="container mt-5 text-center position-relative">
                <div id="loading-screen" style="display:none; z-index:2;">
                    <div id="loading-spinner"></div>
                    <div id="loading-text">Loading...</div>
                  </div>
                <form id="enrollmentForm" method="post" class="mx-auto">
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            
                    <div class="row justify-content-center">
                      
                        <div class="col-lg-12">
                        
                            <div class="col-lg-8 mx-auto align-items-center form-step" id="step1">
                                <h3>Step 1: Select Enrollment Type</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-3 custom-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Senior High</h5>
                                                <p class="card-text">Click here for Senior High Enrollment</p>
                                                <a href="#" class="btn btn-primary next-step" data-enrollment-type="Senior High">Select</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="card mb-3 custom-card">
                                            <div class="card-body">
                                                <h5 class="card-title">College</h5>
                                                <p class="card-text">Click here for College Enrollment</p>
                                                <a href="#" class="btn btn-primary next-step" data-enrollment-type="college">Select</a>
                                            </div>
                                        </div>
                                    </div>
                                    <select name="cars" id="SemesterSelect">
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                      </select>
                                </div>
                            </div>


                            
            
                            <div class="col-lg-8 mx-auto align-items-center form-step" id="step2" style="display: none;">
                                <h3>Step 2: Select Course</h3>
                                <div class="row justify-content-center">
                                    <!-- For College Enrollment -->
                                    <div class="col-lg-12" id="collegeCourses" style="display: none;">
                                        <div class="row">
                                       
                                            <div class="col-sm-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BSED-MATH</h5>
                                                        <p class="card-text ">BACHELOR OF SECONDARY <br>EDUCATION MAJOR IN MATH</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BSED-MATH">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BSED-ENGLISH</h5>
                                                        <p class="card-text ">BACHELOR OF SECONDARY <br>EDUCATION MAJOR IN ENGLISH</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BSED-ENGLISH">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BEED</h5>
                                                        <p class="card-text">BACHELOR  <br>OF<br> ELEMENTARY EDUCATION</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BEED">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BSIT</h5>
                                                        <p class="card-text">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BSIT">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body ">
                                                        <h5 class="card-title pb-0 mb-0">AB-THEOLOGY</h5>
                                                        <p class="card-text">BACHELOR  OF <br>ARTS IN<br> THEOLOGY</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="AB-THEOLOGY">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- For Senior High Enrollment -->
                                    <div class="col-md-12" id="seniorHighCourses" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">HUMSS</h5>
                                                        <p class="card-text">Click here for HUMSS</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="HUMMS">HUMSS</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">STEM</h5>
                                                        <p class="card-text">Click here for STEM</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="STEM">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">GAS</h5>
                                                        <p class="card-text">Click here for GAS</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="GAS">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                         <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">ABM</h5>
                                                        <p class="card-text">Click here for ABM</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="ABM">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">TVL-ICT</h5>
                                                        <p class="card-text">Click here for ICT</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="ICT">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                            </div>
            
                            <div class="col-lg-12 mx-auto align-items-center form-step " id="step3" style="display: none;">
                                <h3>Step 3: Select Year</h3>
                                <div class="row justify-content-center">
                                    <!-- For College Enrollment -->
                                    <div class="col-md-8" id="collegeYears" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card mb-2 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">1st Year</h5>
                                                        <p class="card-text">Click here for 1st Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="1st Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card mb-2 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">2nd Year</h5>
                                                        <p class="card-text">Click here for 2nd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="2nd Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card mb-2 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">3rd Year</h5>
                                                        <p class="card-text">Click here for 3rd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="3rd Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card mb-2 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">4th Year</h5>
                                                        <p class="card-text">Click here for 4th Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="4th Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!-- For Senior High Enrollment -->
                                    <div class="col-md-6" id="seniorHighYears" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Grade 11</h5>
                                                        <p class="card-text">Click here for Grade 11</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="Grade 11">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Grade 12</h5>
                                                        <p class="card-text">Click here for Grade 12</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="Grade 12">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                            </div>
            
                            <div class="container form-step w-100 " id="step4" style="display: none; width:100%">
                                <h3>Step 4: Select Subjects</h3>
                                <div class="row w-100">
                                  
                                      <section class="col ftco-section mt-0 p-0 w-100">
                                        <div class="container w-100">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="table-wrap">
                                                <table class="table table-responsive-xl w-100 m-0 table table-hover">
                                                 
                                                  <thead>
                                                    <tr >
                                                     <th colspan="2"><?php echo $activeSemester; ?></th>
                                                      <th colspan="2"> <span id="reviewYear"></span></th>
                                                    </tr>
                                                    <tr>
                                                      <th>Select</th>
                                                      <th>Course Code</th>
                                                      <th>Course Description</th>
                                                      <th>Units</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="subjectTable">
                                                  
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <button type="button" class="btn btn-primary prev-step m-3">Previous</button>
                                      <button type="button" class="btn btn-primary next-step m-3">Next</button>
                                      </section>
                                  
                                      
                                    </div>
                             
                              
                              
                            </div>

            
                            <div class="container form-step" id="step5" style="display: none;">
                                <h3>Step 5: Review Selection</h3>
                                <div class="row"> 
                                    <p>Enrollment Type: <span id="reviewEnrollmentType"></span></p>
                            
                                    <section class="col ftco-section mt-0 p-0 w-100">
                                        <div class="container w-100">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="table-wrap">
                                                <table id="selectedCoursesTable" class="table table-responsive-xl w-100 m-0 table table-hover">
                                                 
                                                  <thead>
                                                    <tr>
                                                        <th colspan="2" class="p-0" ><h6 style="color: rgb(24, 24, 24)7, 26, 26)">Course : <span id="reviewCourse" name="reviewCourse"></span> <span id="reviewYear2" name="reviewYear2"></h6></th>
                                                      
                                                      <th class="p-0" style="color: rgb(24, 24, 24)7, 26, 26)"><h6>Current Semester : <?php  echo  $activeSemester;?> </h6></th>
                                                    </tr>  
                                                    <tr>
                                                        <th>Course Code</th>
                                                        <th>Course Description</th>
                                                        <th>Units</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="selectedCoursesBody">
                                                  
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </section>

                                    
                                </div>
                                <button type="button" class="btn btn-primary prev-step m-3">Previous</button>
                                <button type="submit" class="btn btn-primary next-step m-3" id="senoirhighbtn" style="display: none">submit</button>
                                <button type="button" class="btn btn-primary" id="collegebtn" data-toggle="modal" data-target="#myModal" style="display: none;">
                                    Next
                                  </button>
                                  
                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Student Type</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row m-3">
                                            <h7>Are you a Regular or Irregular Student?</h7>
                                           </div>
                                       <div class="row">
                                        <div class="col-md-6">
                                            <div class="card mb-3 custom-card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Regular</h5>
                                                    <p class="card-text">Click here if you are Regular</p>
                                                    <a href="#" class="btn btn-primary next-step" data-student-type="regular">Regular</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mb-3 custom-card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Irregular</h5>
                                                    <p class="card-text">Click here if you are Irregular</p>
                                                    <a href="#" class="btn btn-primary next-step" data-student-type="irregular">Irregular</a>
                                                </div>
                                            </div>
                                        </div>
                                       </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                            </div>

                            <div class="container form-step" id="step6" style="display: none;">
                                <h3>Uploading Enrollment</h3>
                              

                                  
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script type="text/javascript">
   $.noConflict();
   jQuery(document).ready(function($) {
    var courses;
   var year;
   var semester;
   var subjects ="";
   var checkbox;
    var duplicateChecker = 0;
    var checkboxesContainer = $('#subjectTable'); 
    var selectedCourses;
    var currentStep = 1;
    var studentType ;
    var selectedCoursesBody = $('#selectedCoursesBody');
    function showLoadingScreen() {
  $('#loading-screen').show();
}

function hideLoadingScreen() {
  $('#loading-screen').hide();
}

function sendStatus(status) {

$('#myModal').modal('hide');
}

$(document).on('click', 'input[name="subject"]', function() {
   
    $('#reviewCourse').text(courses);
    var selectedCheckboxes = $('#subjectTable input[name="subject"]:checked');
    selectedCourses = [];
    selectedCheckboxes.each(function() {
        var id = $(this).closest('tr').data('id');
        var courseCode = $(this).closest('tr').find('.course-code').text();
        var courseDescription = $(this).closest('tr').find('.course-description').text();
        var units = $(this).closest('tr').find('.units').text();
        

        var courseInfo = {
            id: id,
            courseCode: courseCode,
            courseDescription: courseDescription,
            units: units,
            course : $('#reviewCourse').text(),
            year: year,
            semester :semester,
            enrollment_type : $('#reviewEnrollmentType').text(),
          
        };
         console.log(selectedCourses);
        selectedCourses.push(courseInfo);
    });

    selectedCoursesBody.empty();

    selectedCourses.forEach(function(course) {
        var row = $('<tr></tr>');
        
        row.append('<td class="pt-3 pb-3" style="display:none;">' + course.id + '</td>');
        row.append('<td class="pt-3 pb-3">' + course.courseCode + '</td>');
        row.append('<td class="pt-3 pb-3">' + course.courseDescription + '</td>');
        row.append('<td class="pt-3 pb-3">' + course.units + '</td>');
        selectedCoursesBody.append(row);
    });

});


        $('.next-step').click(function() {

            if ($(this).data('enrollment-type')) {
                $('#reviewEnrollmentType').text($(this).data('enrollment-type'));
                if ($(this).data('enrollment-type') == 'college') {
                    $('#collegeCourses').show();
                    $('#collegeYears').show();
                    $('#senoirhighbtn').hide();
                    $('#collegebtn').show();
                    $('#seniorHighCourses').hide();
                    $('#seniorHighYears').hide();
                    selectedCoursesBody.empty();
                } else if ($(this).data('enrollment-type') == 'Senior High') {
                    $('#collegeCourses').hide();
                    $('#collegeYears').hide();
                    $('#collegebtn').hide();
                    $('#senoirhighbtn').show();
                    $('#seniorHighCourses').show();
                    $('#seniorHighYears').show();
                    selectedCoursesBody.empty();
                }
            }
            if ($(this).data('course')) {
                $('#reviewCourse').text($(this).data('course'));
            }
            if ($(this).data('year')) {
                $('#reviewYear').text($(this).data('year'));    
                $('#reviewYear2').text($(this).data('year'));   
            }
            if ($(this).data('student-type')) {
              if($(this).data('student-type') == 'regular' || $(this).data('student-type') == 'irregular' ){
                $('#myModal').modal('hide');
                studentType = $(this).data('student-type');
                console.log(studentType);
                $.ajax({
        url: '{{ route('student.enroll') }}', // Replace with your actual endpoint
        type: 'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        contentType: 'application/json',
        data: JSON.stringify({
        selectedCourses: selectedCourses,
        student_type: studentType
  }),
        success: function(response) {
            // Handle success response from the backend
            console.log('Data sent successfully:', response);
            hideLoadingScreen();
            window.location.href = "{{ route('student.enrollmentlist') }}";
        },
        error: function(error) {
            // Handle error response from the backend
            console.error('Error sending data:', error);
            hideLoadingScreen();
            console.log(selectedCourses);
            console.log(studentType);
        }
    });
                
              }
            }



            $('#step'+currentStep).hide();
            $('#step'+(currentStep+1)).show();
            $('.progress-bar').css('width', (currentStep+1)*20+'%');
            currentStep++;


        });

        $('.prev-step').click(function() {
            $('#step'+currentStep).hide();
            $('#step'+(currentStep-1)).show();
            $('.progress-bar').css('width', (currentStep-1)*20+'%');
            currentStep--;

           
          if(currentStep == 3){
           
            checkboxesContainer.empty();

            selectedCoursesBody.empty();

          }
         
          
        });


        $('#enrollmentForm').submit(function(e) {
             $('#myModal').modal('hide');
            e.preventDefault();
           var data ;
           showLoadingScreen();

            $.ajax({
        url: '{{ route('student.enroll') }}', // Replace with your actual endpoint
        type: 'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        contentType: 'application/json',
        data: JSON.stringify({
        selectedCourses: selectedCourses,
        student_type: studentType
  }),
        success: function(response) {
            // Handle success response from the backend
            console.log('Data sent successfully:', response);
            hideLoadingScreen();
            window.location.href = "{{ route('student.enrollmentlist') }}";
        },
        error: function(error) {
            // Handle error response from the backend
            console.error('Error sending data:', error);
            hideLoadingScreen();
            console.log(selectedCourses);
            console.log(data);
        }
    });


            courses = $('#course').val();
            $('#reviewCourse').text(courses);
            $('#step'+currentStep).hide();
            $('#step5').show();
            $('.progress-bar').css('width', '100%');

        });

        $('.select-year').click(function(){
            showLoadingScreen();
            
            var selectElement = document.getElementById('SemesterSelect');
           var selectedValue = selectElement.options[selectElement.selectedIndex].value;
             year = $(this).data('year');

             semester = '<?php echo $activeSemester; ?>';
             var secondsem = "2nd Semester";
            $('#reviewYear').text(year);
            $('#reviewYear2').text(year);
            console.log(year);
            console.log($('#reviewEnrollmentType').text()+" entype");
            console.log($('#reviewCourse').text()+" course");
            console.log(year +" year");
            console.log(selectedValue +" select sem");
            var  checked;
            if($('#reviewEnrollmentType').text() == 'Senior High'){
                checked = 'checked';
            }else{
                checked = '';
            }
              
            $.ajax({
                url: '{{ route('get.subjects') }}', // Adjust the URL as per your routes
                type: 'GET',
                data: {
                    enrollmentType: $('#reviewEnrollmentType').text(),
                    courseCode: $('#reviewCourse').text(),
                    yearLevel: year,
                    activeSemester: selectedValue,
                },
                  headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                success: function(response) { 
                    subjects = response.data; 
    subjects.forEach(function(subject, index) {
        checkbox = $('<tr data-id='+ subject.id+'>' +
                            '<td class="pt-3 pb-3"><label class="checkbox-wrap checkbox-primary mb-0 mt-2">'+
										  '<input type="checkbox" class="form-check-input" id="subject' + index + '" name="subject" value="' + subject.course_code + '"'+checked+'>'+
										  '<span class="checkmark"></span>'+
										'</label>'+
                                        '</td>' +
                            '<td class="course-code pt-3 pb-3"><label class="form-check-label" for="subject' + index + '">'+ subject.course_code + '</label></td>' +
                            '<td class="course-description pt-3 pb-3 pr-0"><label class="form-check-label" for="subject' + index + '">'+ subject.course_description + '</label></td>' +
                            '<td  class="units pt-3 pb-3 "><label class="form-check-label" for="subject' + index + '">'+ subject.units + '</label></td>' +
                        '</tr');
        checkboxesContainer.append(checkbox);
       
    
    });
    duplicateChecker++;
    checkboxesContainer.show();
  
              hideLoadingScreen();
    // Show the checkboxes container
               console.log(semester);
              console.log(duplicateChecker);
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                    hideLoadingScreen();
                }
            });

            




            $('.subject-checkboxes').hide();
            $('#year'+year+'Subjects').show();
            $('#step'+currentStep).hide();
            $('#step4').show();
            $('.progress-bar').css('width', '80%');
            currentStep++;
        });


    }
    
    );

</script>
  
@endsection
