@extends('layouts.studentlayout')
@section('content')
<main id="main" class="main">

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
      <div class="row h-100">
      

        <div class="col-xl-12" >

          <div class="card h-100 w-100 d-inline-block">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="container mt-5 text-center">
                <form id="enrollmentForm" method="post" class="mx-auto">
                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-step" id="step1">
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
                                                <a href="#" class="btn btn-primary next-step" data-enrollment-type="College">Select</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-step" id="step2" style="display: none;">
                                <h3>Step 2: Select Course</h3>
                                <div class="row justify-content-center">
                                    <!-- For College Enrollment -->
                                    <div class="col-lg-12" id="collegeCourses" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BSIT</h5>
                                                        <p class="card-text">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BSIT">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BSED</h5>
                                                        <p class="card-text ">BACHELOR OF SECONDARY EDUCATION</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BSED">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title pb-0 mb-0">BEED</h5>
                                                        <p class="card-text">BACHELOR OF ELEMENTARY EDUCATION</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="BEED">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body ">
                                                        <h5 class="card-title pb-0 mb-0">AB-THEOLOGY</h5>
                                                        <p class="card-text">BACHELOR OF ARTS IN THEOLOGY</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="THEO">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- For Senior High Enrollment -->
                                    <div class="col-md-6" id="seniorHighCourses" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">ABM</h5>
                                                        <p class="card-text">Click here for ABM</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="ABM">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">ICT</h5>
                                                        <p class="card-text">Click here for ICT</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="ICT">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                            </div>
            
                            <div class="form-step" id="step3" style="display: none;">
                                <h3>Step 3: Select Year</h3>
                                <div class="row justify-content-center">
                                    <!-- For College Enrollment -->
                                    <div class="col-md-6" id="collegeYears" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">1st Year</h5>
                                                        <p class="card-text">Click here for 1st Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="1">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">2nd Year</h5>
                                                        <p class="card-text">Click here for 2nd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="2">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">3rd Year</h5>
                                                        <p class="card-text">Click here for 3rd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="3">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">4th Year</h5>
                                                        <p class="card-text">Click here for 4th Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="4">Select</a>
                                                    </div>
                                                </div>
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
                                                        <a href="#" class="btn btn-primary select-year" data-year="11">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Grade 12</h5>
                                                        <p class="card-text">Click here for Grade 12</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="12">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                            </div>
            
                            <div class="form-step" id="step4" style="display: none;">
                                <h3>Step 4: Select Subjects</h3>
                                <div id="year1Subjects" class="subject-checkboxes" style="display: none;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject1" name="subject" value="Subject 1">
                                        <label class="form-check-label" for="subject1">Subject 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject2" name="subject" value="Subject 2">
                                        <label class="form-check-label" for="subject2">Subject 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject3" name="subject" value="Subject 3">
                                        <label class="form-check-label" for="subject3">Subject 3</label>
                                    </div>
                                </div>
                                <div id="year2Subjects" class="subject-checkboxes" style="display: none;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject4" name="subject" value="Subject 4">
                                        <label class="form-check-label" for="subject4">Subject 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject5" name="subject" value="Subject 5">
                                        <label class="form-check-label" for="subject5">Subject 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="subject6" name="subject" value="Subject 6">
                                        <label class="form-check-label" for="subject6">Subject 6</label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                              
                            </div>
            
                            <div class="form-step" id="step5" style="display: none;">
                                <h3>Step 5: Review Selection</h3>
                                <div>
                                    <p>Enrollment Type: <span id="reviewEnrollmentType"></span></p>
                                    <p>Course: <span id="reviewCourse"></span></p>
                                    <p>Year: <span id="reviewYear"></span></p>
                                    <p>Subjects:</p>
                                    <ul id="reviewSubjects"></ul>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
        var currentStep = 1;

        $('.next-step').click(function() {
            if ($(this).data('enrollment-type')) {
                $('#reviewEnrollmentType').text($(this).data('enrollment-type'));
                if ($(this).data('enrollment-type') == 'College') {
                    $('#collegeCourses').show();
                    $('#collegeYears').show();
                    $('#seniorHighCourses').hide();
                    $('#seniorHighYears').hide();
                } else if ($(this).data('enrollment-type') == 'Senior High') {
                    $('#collegeCourses').hide();
                    $('#collegeYears').hide();
                    $('#seniorHighCourses').show();
                    $('#seniorHighYears').show();
                }
            }
            if ($(this).data('course')) {
                $('#reviewCourse').text($(this).data('course'));
            }
            if ($(this).data('year')) {
                $('#reviewYear').text($(this).data('year'));
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
        });

        $('#enrollmentForm').submit(function(e) {
            e.preventDefault();
            var course = $('#course').val();
            $('#reviewCourse').text(course);
            $('#step'+currentStep).hide();
            $('#step5').show();
            $('.progress-bar').css('width', '100%');
        });

        $('.select-year').click(function() {
            var year = $(this).data('year');
            $('#reviewYear').text('Year ' + year);

            $('.subject-checkboxes').hide();
            $('#year'+year+'Subjects').show();
            $('#step'+currentStep).hide();
            $('#step4').show();
            $('.progress-bar').css('width', '80%');
        });

        $('#year1Subjects input[type="checkbox"]').change(function() {
            updateSubjectReview();
        });

        $('#year2Subjects input[type="checkbox"]').change(function() {
            updateSubjectReview();
        });

        function updateSubjectReview() {
            var selectedSubjects = [];
            $('#year1Subjects input[type="checkbox"]:checked').each(function() {
                selectedSubjects.push($(this).val());
            });

            $('#year2Subjects input[type="checkbox"]:checked').each(function() {
                selectedSubjects.push($(this).val());
            });

            var subjectList = $('#reviewSubjects');
            subjectList.empty();

            for (var i = 0; i < selectedSubjects.length; i++) {
                var listItem = $('<li></li>');
                listItem.text(selectedSubjects[i]);
                subjectList.append(listItem);
            }
        }
    });
</script>
  
@endsection
{{-- <script>
  $(document).ready(function() {
      $('#changePasswordButton').click(function() {
          var formData = $('#passwordUpdateForm').serialize();
          
          $.ajax({
              url: $('#passwordUpdateForm').attr('action'),
              type: 'PUT',
              data: formData,
              success: function(response) {
                  // Handle success response
                  if (response.status === 'password-updated') {
                      // Show success message here
                  }
              },
              error: function(error) {
                  // Handle error response
              }
          });
      });
  });
</script> --}}