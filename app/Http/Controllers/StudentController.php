<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\User;

class StudentController extends Controller
{
    //

    public function studentUnauthorized(){
        return view('student.studentAccountApproval');
    }
    public function showStudentProfile($profileUuid)
    {
       $studentprofile=Auth()->user()->profile_id;
        if($studentprofile!== null){
            $studentProfile = StudentProfile::where('uuid', $profileUuid)->first();
            if ($studentProfile) {
                return view('student.studentprofile', ['studentProfile' => $studentProfile]);
            }
          
         }else{
            return redirect()->route('student.createprofile')->with('message', 'You dont have a profile. You can create it here.');
         }
        
    }
    public function showStudentEnrollment()
    {
        return view('student.studentenroll');
    }
    public function showStudentHome()
    {
        return view('student.studenthome');
    }
    public function showStudentProfileCreate()
    {
        $studentprofile=Auth()->user()->profile_id;
        if($studentprofile !== null){
            abort(403, 'Unauthorized');
        }
        
        else{
            return view('student.studentcreateprofile');
        }
       
    }
    public function generateUniqueRandomNumber()
    {
        do {
            $randomNumber = str_pad(mt_rand(10000, 9999999), 7, '0', STR_PAD_LEFT); // Convert random number to a string
        } while ($randomNumber <= "10000"); // Compare as strings to handle leading zeros
    
        // Check if the generated number already exists
        while (StudentProfile::where('student_id_number', $randomNumber)->exists()) {
            $randomNumber = str_pad(mt_rand(1000, 9999999), 7, '0', STR_PAD_LEFT); // Generate a new random number if it already exists
        }
    
        return $randomNumber;
    }

    public function storeStudentProfile(Request $request)
    {
        $student_id_number = $this->generateUniqueRandomNumber();
        // Validate the form input (you can add more validation rules)
  try{
    
    $request->validate([
        'avatar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        'first_name' => 'required|string|max:20',
        'middle_name' => 'required|string|max:20',
        'last_name' => 'required|string|max:20',
        'gender' => 'required|string|max:10',
        'users_contact_number' => 'required|string|max:11',
        'date_of_birth' => 'date',
        'father_fullname' => 'required|string|max:50',
        'mother_fullname' => 'required|string|max:50',
        'parent_contact_number' => 'required|string|max:11',
        'address' => 'required|string|max:255',
    
        // Add validation rules for other attributes
    ]);
    
    if ($request->hasFile('avatar')) {
        $path = $request->file('avatar')->store('profile', 'public');
    }
    // Create a new student profile
    $studentProfile = StudentProfile::create([
        'student_id_number' =>  $student_id_number,
        'uuid' => Str::uuid(),
        'first_name' => $request->input('first_name'),
        'middle_name' => $request->input('middle_name'),
        'last_name' => $request->input('last_name'),
        'gender' => $request->input('gender'),
        'users_contact_number' =>$request->input('users_contact_number'),
        'date_of_birth' => $request->input('date_of_birth'),
        'father_fullname' => $request->input('father_fullname'),
        'mother_fullname' =>$request->input('mother_fullname'),
        'parent_contact_number' => $request->input('parent_contact_number'),
        'address' => $request->input('address'),
        'avatar' => $path,
    
    ]);

    // Optionally, you can associate the student profile with a user here
    $user = auth()->user()->id;
   

   // $user->profiles()->save();

    $profileId = $studentProfile->id; // Replace with the actual profile ID you want to assign
    $users = User::find($user); // Replace $userId with the actual user ID

    if ($users) {
        $users->profile_id = $profileId;
        $users->save();
    } else {
    
    }



     return redirect('/student/home')->with('message', 'Student profile created successfully!');

  }catch(\Exception $e){
    return redirect()->back()->with('error', 'An error occurred while uploading the document.');
  }
    }

    public function updateStudentProfile($profileUuid, Request $request)
{
    $request->validate([
        'avatar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        'first_name' => 'required|string|max:20',
        'middle_name' => 'required|string|max:20',
        'last_name' => 'required|string|max:20',
        'gender' => 'required|string|max:10',
        'users_contact_number' => 'required|string|max:11',
        'date_of_birth' => 'date',
        'father_fullname' => 'required|string|max:50',
        'mother_fullname' => 'required|string|max:50',
        'parent_contact_number' => 'required|string|max:11',
        'address' => 'required|string|max:255',
        

        // Add validation rules for other attributes
    ]);

    $studentProfile = StudentProfile::where('uuid', $profileUuid)->first();

    try{
        $oldAvatarPath = $studentProfile->avatar;
    if ($request->hasFile('avatar')) {
        $path = $request->file('avatar')->store('profile', 'public');
    
    } else {
        $path = $request->user()->avatar;
    }
    if ($oldAvatarPath) {
        Storage::disk('public')->delete($oldAvatarPath);
    }
    
        if ($studentProfile) {
            $studentProfile->update([
                'avatar' => $path,
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'gender' => $request->input('gender'),
                'users_contact_number' =>$request->input('users_contact_number'),
                'date_of_birth' => $request->input('date_of_birth'),
                'father_fullname' => $request->input('father_fullname'),
                'mother_fullname' =>$request->input('mother_fullname'),
                'parent_contact_number' => $request->input('parent_contact_number'),
                'address' => $request->input('address'),
                // Update other attributes as needed
            ]);
            $studentProfile->save();
            //dd($studentProfile);
           return redirect()->route('student.profile', ['profileUuid' => $profileUuid])->with('message', 'Profile updated successfully.');
        } else {
    
           // dd($studentProfile);
            return redirect()->route('student.profile', ['profileUuid' =>$profileUuid])->with('error', 'Profile not found.');
        }
    }catch(\Exception $e) {
       // dd($request->all());
         return redirect()->route('student.profile', ['profileUuid' => $profileUuid])->with('error', 'An error occurred while updating the profile.');
    }
   
}
    public function showStudentProfiles($id)
{
    $studentProfile = StudentProfile::find($id);
    return view('student_profile_view', ['studentProfile' => $studentProfile]);
}
    


}
