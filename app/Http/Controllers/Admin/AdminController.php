<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }
    // ['email'=>$data['email'],'password'=>$data['password']]
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $validatedData = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            // echo "<pre>";print_r($data);die;
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                // Session::flash('error_message', 'Invalid Email or Password');
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('admin.animated_admin_login');
        
    

    }

    public function setting()
    {
        // echo "<pre>";
        // print_r(Auth::guard('admin')->user());die;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_setting')->with(compact('adminDetails'));
    }

    
    public function checkCurruntPassword(Request $request){
        $data = $request->all();
        // echo "<pre>"; print_r($data);die;
        if(Hash::check($data['currunt_password'],Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }

    }

    public function UpdateCurruntPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(Hash::check($data['currunt_password'],Auth::guard('admin')->user()->password)){

                if($data['new_password']==$data['confirm_password']){

                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    Session::flash('success_message', 'Password has been updated successfuly!');
                }else{
                    Session::flash('error_message', 'New Password and Confirm password not match!');
                }
                    
            }else{

                Session::flash('error_message', 'Your currunt password is incorrect');
            }
            return redirect()->back();

        }

    }


    public function UpdateAdminDetails(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rules = [
                // 'name' => 'required|regex:/^[\PL\s\-]+$/u',
                'mobile' => 'required|numeric'
            ];
            $customMessages = [
                'name.required' => 'Name is required',
                'name.alpha' => ' Valid Name is required',
                'mobile.required' => ' Mobile is required',
                'mobile.numeric' => ' Valid Mobile is required',
            ];
            $this->validate($request,$rules,$customMessages);

            //update admin details

            Admin::where('email',Auth::guard('admin')->user()->email)
            ->update(['name'=>$data['name'],'mobile'=>$data['mobile']]);
            session::flash('success_message','Admin details updated successfully!');
            return redirect()->back();
        }
        return view('admin.update_admin_details');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
