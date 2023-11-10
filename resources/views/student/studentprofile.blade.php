@extends('layouts.studentlayout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

      
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ asset('storage/' . $studentProfile->avatar)}}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->name }}</h2>
              <h3>{{ ucfirst(Auth::user()->role) }}</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

             

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
               

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->last_name ." ". $studentProfile->first_name ." , ". $studentProfile->middle_name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->gender}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of birth</div>
                    <div class="col-lg-9 col-md-8">{{ \Carbon\Carbon::parse($studentProfile->date_of_birth)->format('F d, Y') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact No.</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->users_contact_number}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->address}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Father's name</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->father_fullname}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mother's name</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->mother_fullname}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Parent's Contact No.</div>
                    <div class="col-lg-9 col-md-8">{{ $studentProfile->parent_contact_number}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data"  action="{{route('student.profileupdate', ['profileUuid' =>$studentProfile->uuid])}}">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{ asset('storage/' . $studentProfile->avatar)}}" id="oldAvatar" alt="Profile">
                        <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
                        <div class="pt-2">
                         <label for="fileUpload">
                     <i class="btn btn-primary btn-sm bi bi-upload">
                          </i>
                         </label>
                         <input type="file" id="fileUpload" name="avatar" accept="image/*" style="display:none;" onchange="getImagePreview(event)">
                        
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="first_name" type="text" class="form-control" id="fullName" value="{{$studentProfile->first_name}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middle_name" type="text" class="form-control" id="middle_name" value="{{$studentProfile->middle_name}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="last_name" type="text" class="form-control" id="middle_name" value="{{$studentProfile->last_name}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="validationTooltip04" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                     <div class="col-md-8 col-lg-9"> 
                      <select class="form-select " name="gender" id="validationTooltip04" required>
                        <option selected value="{{$studentProfile->gender}}"> {{ $studentProfile->gender}}</option>
                      @if($studentProfile->gender == 'Male')
                      <option>Female</option>
                      @else
                      <option>Male</option>
                      @endif
                    </select>
                  </div>
                      <div class="invalid-tooltip">
                        Please select a Gender.
                      </div>
                    </div>

                    

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Date of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date_of_birth" type="date" class="form-control" id="Job" value="{{ $studentProfile->date_of_birth}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Contact No.</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="users_contact_number" type="number" class="form-control" id="Country" value="{{ $studentProfile->users_contact_number}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{ $studentProfile->address}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Father's name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father_fullname" type="text" class="form-control" id="father_fullname" value="{{ $studentProfile->father_fullname}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Mother's name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mother_fullname" type="text" class="form-control" id="Email" value="{{ $studentProfile->mother_fullname}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Parent's Contact number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="parent_contact_number" type="number" class="form-control" id="Twitter" value="{{ $studentProfile->parent_contact_number}}">
                      </div>
                    </div>

                 

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
             

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="passwordUpdateForm"  method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current_password" type="password" class="form-control" id="currentPassword">
                      </div>
                      <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="newPassword">
                      </div>
                      <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                      </div>
                      <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="text-center">
                      <button type="submit" id="changePasswordButton" class="btn btn-primary">Change Password</button>
                      
            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Saved.') }}</p>
        @endif
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection
<script>
//  document.querySelector("label[for='fileUpload']").addEventListener('click', function() {
//     document.getElementById('fileUpload').click();

//     console.log('wewewe');

    
// });
// document.getElementById('fileUpload').addEventListener('change', function(e) {
//     var imgPreview = document.getElementById('preview');
//     imgPreview.src = URL.createObjectURL(e.target.files[0]);
//     imgPreview.onload = function() {
//         URL.revokeObjectURL(imgPreview.src) // Free memory
//     }
//     console.log(imgPreview.src);
// });


function getImagePreview(event){
  var image =URL.createObjectURL(event.target.files[0]);
   var oldAvatar = document.getElementById('oldAvatar'); 
  var previewElement = document.getElementById('preview');  
  oldAvatar.style.display = 'none'; 
  previewElement.style.display = 'block'; 
  previewElement.src = image;
}

</script>