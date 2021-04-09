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
                  <h3 class="card-title">Update Admin Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if (Session::has('error_message'))
                  <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                    {{Session::get('error_message')}}
                  </div> 
                @endif

                @if (Session::has('success_message'))
                  <div class="alert alert-success" role="alert" style="margin-top: 10px;">
                    {{Session::get('success_message')}}
                  </div> 
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger "style="margin-top: 10px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="{{url('/admin/update-admin-details')}}" name="updateAdminDetails" id="updateAdminDetails" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Name</label>
                        <input type="text" name="name" id="name" value="{{Auth::guard('admin')->user()->name}}" class="form-control" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" name="email" id="email" value="{{Auth::guard('admin')->user()->email}}" class="form-control" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Type</label>
                        <input type="text" name="type" id="type" value="{{Auth::guard('admin')->user()->type}}" class="form-control" readonly="" >
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mobile Number</label>
                      <input type="number" name="mobile" id="mobile" value="{{Auth::guard('admin')->user()->mobile}}" class="form-control" required="" id="exampleInputPassword1" placeholder="Enter Currunt Password">
                    </div>
                    <span id="checkCurruntpwd"></span>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="password" name="status" id="status" class="form-control" id="exampleInputPassword1" placeholder="Enter New Password">
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image" id="image" value="{{Auth::guard('admin')->user()->image}}" class="form-control" id="exampleInputPassword1" placeholder="Enter Confirm Password">
                        @if(!empty(Auth::guard('admin')->user()->image))
                          <a href="">View Image</a>
                          <input type="hidden" name="currunt_admin_image" value="{{Auth::guard('admin')->user()->image}}">
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