@extends('layouts.admin_layouts.admin_layout') 
 
@section('content')
    

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Setting v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Reset Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if (Session::has('error_message'))
                  <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                    {{Session::get('error_message')}}
                  </div> 
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success_message'))
                  <div class="alert alert-success" role="alert" style="margin-top: 10px;">
                    {{Session::get('success_message')}}
                  </div> 
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="{{url('/admin/update-currunt-pwd')}}" name="updatePasswordForm" id="updatePasswordForm" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Name</label>
                        <input type="text" name="name" id="name" value="{{$adminDetails->name}}" class="form-control" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" name="email" id="email" value="{{$adminDetails->email}}" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Type</label>
                        <input type="text" name="type" id="type" value="{{$adminDetails->type}}" class="form-control" readonly="">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Currunt Password</label>
                      <input type="password" name="currunt_password" id="currunt_password"  class="form-control" id="exampleInputPassword1" placeholder="Enter Currunt Password">
                    </div>
                    <span id="checkCurruntpwd"></span>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" id="exampleInputPassword1" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
            </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>

  @endsection