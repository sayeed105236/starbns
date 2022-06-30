<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index($id)
    {
      $users= User::where('sponsor',Auth::id())->get();
      // $placement= User::where('left_side','=','null')->orWhere('middle_side','=','null')->orWhere('right_side','=','null')->get();
      // dd($placement);
      return view('frontend.pages.sponsor_lists',compact('users'));
    }
    public function getUser(Request $request)
    {

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
    public function ResetPassword($id)
    {
      return view('frontend.pages.user-password');
    }
    public function ResetPasswordStore(Request $request)
    {
      $request->validate([
          'old_password' => 'required',
          'new_password' => 'required|min:5',
          'password_confirmation' => 'required|min:5',
      ]);
      $db_pass = Auth::user()->password;
      $current_password = $request->old_password;
      $newpass = $request->new_password;
      $confirmpass = $request->password_confirmation;

     if (Hash::check($current_password,$db_pass)) {
      if ($newpass === $confirmpass) {
          User::findOrFail(Auth::id())->update([
            'password' => Hash::make($newpass)
          ]);

          Auth::logout();

        return Redirect()->route('login')->with('password_updated','Your Password Change Successfully. Please Login With your New Password');;

      }else {


        return Redirect()->back()->with('password_error','New Password And Confirm Password Not Same');
      }
   }else {

    return Redirect()->back()->with('password_not_match','Old Password Not Match');
   }
    }
    public function UserProfile($id)
    {
      return view('frontend.pages.user-profile');
    }
    public function UpdateProfile(Request $request)
    {
      $user= User::find($request->id);
      $user->name=$request->name;
      $user->address= $request->address;
      $user->number=$request->number;
      $user->postal_code=$request->postal_code;
      $user->country=$request->country;
      $user->gender= $request->gender;
      if ($request->file('file1') != null) {
        $filename=null;
        $uploadedFile = $request->file('file1');
        $oldfilename = $deals['image'] ?? 'demo.jpg';

        $oldfileexists = Storage::disk('public')->exists('users/' . $oldfilename);

        if ($uploadedFile !== null) {

            if ($oldfileexists && $oldfilename != $uploadedFile) {
                //Delete old file
                Storage::disk('public')->delete('users/' . $oldfilename);
            }
            $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
            $filename = time() . '_' . $filename_modified;

            Storage::disk('public')->putFileAs(
                'users/',
                $uploadedFile,
                $filename
            );

            $data['image'] = $filename;
        } elseif (empty($oldfileexists)) {
            throw new GeneralException('Image not found!');
            //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
            //file check in storage

        }
      }
        if ($request->file('file1') != null)
        {
            $user->image= $filename;
        }
        $user->save();
          return Redirect()->back()->with('profile_updated','Profile Updated Successfully!!!');
    }
}
