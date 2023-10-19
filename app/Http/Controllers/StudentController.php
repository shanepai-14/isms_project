<?php

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;

class StudentController extends Controller
{
    //
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

    public function storeStudentProfile(Request $request)
    {
        // Validate the form input (you can add more validation rules)
        $request->validate([
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
    
        // Create a new student profile
        $studentProfile = StudentProfile::create([
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
            // Add other attributes as needed
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
            // Handle the case where the user with $userId was not found
        }


    
         return redirect('/student/home')->with('message', 'Student profile created successfully!');
    }

    public function updateStudentProfile($profileUuid, Request $request)
{
    $request->validate([
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
        if ($studentProfile) {
            $studentProfile->update([
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
