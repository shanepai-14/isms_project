@extends('layouts.studentlayout')
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
    $currentDate = date('Y-m-d'); // Get today's date
    $activeSemester;
    // Define the start dates of the two semesters
    $firstSemesterStart = date('Y') . '-06-01'; // Assuming format is Y-m-d
    $secondSemesterStart = date('Y') . '-01-01';
    
    if ($currentDate >= $firstSemesterStart && $currentDate < $secondSemesterStart) {
        $activeSemester = '1st Semester';
        
    } else {
        $activeSemester = '2nd Semester';
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
      <div class="row h-100">
      

        <div class="col-xl-12" >

          <div class="card h-100 w-100 d-inline-block">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="container mt-5 text-center position-relative">
                <div id="loading-screen" style="display:none;">
                    <div id="loading-spinner"></div>
                    <div id="loading-text">Loading...</div>
                  </div>
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
                                                <a href="#" class="btn btn-primary next-step" data-enrollment-type="college">Select</a>
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
                                    <div class="col-md-12" id="seniorHighCourses" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">HUMSS</h5>
                                                        <p class="card-text">Click here for HUMSS</p>
                                                        <a href="#" class="btn btn-primary next-step" data-course="STEM">HUMSS</a>
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
                                                        <a href="#" class="btn btn-primary select-year" data-year="1st Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">2nd Year</h5>
                                                        <p class="card-text">Click here for 2nd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="2nd Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">3rd Year</h5>
                                                        <p class="card-text">Click here for 3rd Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="3rd Year">Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card mb-3 custom-card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">4th Year</h5>
                                                        <p class="card-text">Click here for 4th Year</p>
                                                        <a href="#" class="btn btn-primary select-year" data-year="4th Year">Select</a>
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
            
                            <div class="form-step" id="step4" style="display: none;">
                                <h3>Step 4: Select Subjects</h3>
                                <div>
                                    {{-- <p>Enrollment Type: <span id="reviewEnrollmentType"></span></p>
                                    <p>Course: <span id="reviewCourse"></span></p>
                                    <p>Year: <span id="reviewYear"></span></p>
                                    <p>Subjects:</p>
                                    <ul id="reviewSubjects"></ul> --}}
                                    <table id="subjectTable" style="display:none;" class="table table-hover">
                                        <tr style="border: 1px solid #040404;
                                        text-align: left;">
                                         <th colspan="2"><?php echo $activeSemester; ?></th>
                                          <th colspan="2"> <span id="reviewYear"></span></th>
                                  
                                        </tr>
                                        <tr style="border: 1px solid #040404;
                                        text-align: left;">
                                         <th>Status</th>
                                          <th>Course Code</th>
                                          <th>Course Description</th>
                                          <th>Units</th>
                                        </tr>
                                       
                                       
                                      </table>

                                    <div id="subjectCheckboxes" style="display:none;"></div>
                                </div>
                             
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                              
                            </div>

            
                            <div class="form-step" id="step5" style="display: none;">
                                <h3>Step 5: Review Selection</h3>
                                <div>
                                    <p>Enrollment Type: <span id="reviewEnrollmentType"></span></p>
                            
                                
                                    <ul id="selectedSubjectsList"></ul>
                                    <table id="selectedCoursesTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th >Current Semester : <?php  echo  $activeSemester;?> </th>
                                                <th>Course : <span id="reviewCourse" name="reviewCourse"></span></th>
                                                <th>Year:<span id="reviewYear2" name="reviewYear2"></th>
                                              
                                            </tr>   
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody id="selectedCoursesBody"></tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="submit" class="btn btn-primary prev-step">submit</button>
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

    function showLoadingScreen() {
  $('#loading-screen').show();
}

function hideLoadingScreen() {
  $('#loading-screen').hide();
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
    var selectedCoursesBody = $('#selectedCoursesBody');
    selectedCoursesBody.empty();

    selectedCourses.forEach(function(course) {
        var row = $('<tr></tr>');
        
        row.append('<td style="display:none;">' + course.id + '</td>');
        row.append('<td>' + course.courseCode + '</td>');
        row.append('<td>' + course.courseDescription + '</td>');
        row.append('<td>' + course.units + '</td>');
        selectedCoursesBody.append(row);
    });

});


        $('.next-step').click(function() {

            if ($(this).data('enrollment-type')) {
                $('#reviewEnrollmentType').text($(this).data('enrollment-type'));
                if ($(this).data('enrollment-type') == 'college') {
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
                $('#reviewYear2').text($(this).data('year'));   
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
            checkbox = $('<tr style="border: 1px solid #040404; text-align: left;">' +
                            '<th colspan="2"><?php echo $activeSemester; ?></th>'+
                            '<th colspan="2"> <span id="reviewYear"></span></th>' +
                             
                        '</tr>'
                        +
                        '<tr style="border: 1px solid #040404; text-align: left;">' +
                                          '<th>Status</th>'+
                                          '<th>Course Code</th>'+
                                          '<th>Course Description</th>'+
                                          '<th>Units</th>'+
                             
                        '</tr>');
        checkboxesContainer.append(checkbox);



          }
         
          
        });

        $('#enrollmentForm').submit(function(e) {
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
        data: JSON.stringify(selectedCourses),
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

        $('.select-year').click(function() {
             year = $(this).data('year');
             semester = '<?php echo $activeSemester; ?>';
            $('#reviewYear').text(year);
            $('#reviewYear2').text(year);
            showLoadingScreen();
            $.ajax({
                url: '{{ route('get.subjects') }}', // Adjust the URL as per your routes
                type: 'GET',
                data: {
                    enrollmentType: $('#reviewEnrollmentType').text(),
                    courseCode: $('#reviewCourse').text(),
                    yearLevel: year,
                    activeSemester: semester,
                },
                  headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                success: function(response) {
                    var subjectList = $('#subjectCheckboxes');
                    subjectList.empty();
                    hideLoadingScreen();
                    subjects = response.data; // Assuming 'data' is an array of subjects

    // Assuming you have an element with the id 'subjectCheckboxes' where you want to append the checkboxes
  
    // Loop through the subjects and create checkboxes
  
    subjects.forEach(function(subject, index) {
        checkbox = $('<tr data-id='+ subject.id+'>' +
                            '<td><input type="checkbox" class="form-check-input" id="subject' + index + '" name="subject" value="' + subject.course_code + '"></td>' +
                            '<td class="course-code"><label class="form-check-label" for="subject' + index + '">'+ subject.course_code + '</label></td>' +
                            '<td class="course-description"><label class="form-check-label" for="subject' + index + '">'+ subject.course_description + '</label></td>' +
                            '<td  class="units"><label class="form-check-label" for="subject' + index + '">'+ subject.units + '</label></td>' +
                        '</tr');
        checkboxesContainer.append(checkbox);
       
    
    });
    duplicateChecker++;
    checkboxesContainer.show();
  

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


        // function updateSubjectReview() {
        //     var selectedSubjects = [];
        //     $('#year1Subjects input[type="checkbox"]:checked').each(function() {
        //         selectedSubjects.push($(this).val());
        //     });

        //     $('#year2Subjects input[type="checkbox"]:checked').each(function() {
        //         selectedSubjects.push($(this).val());
        //     });

        //     var subjectList = $('#reviewSubjects');
        //     subjectList.empty();

        //     for (var i = 0; i < selectedSubjects.length; i++) {
        //         var listItem = $('<li></li>');
        //         listItem.text(selectedSubjects[i]);
        //         subjectList.append(listItem);
        //     }
        // }
    }
    
    );

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