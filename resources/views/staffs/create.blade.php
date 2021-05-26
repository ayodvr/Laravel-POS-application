@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add Employee</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>  
          <div class="breadcrumb-item">Add Employee</div>
        </div>
      </div>
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
     <div class="alert alert-danger" style="width:50%; margin:auto">
                 {{$error}}</div>
         @endforeach
     @endif
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
          
           
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    <form method="POST" action="{{route('staffs.store')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Role</label>
                            <input type="text" class="form-control" value="{{Auth::user()->usertype}}" readonly>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="phone">Phone</label>
                              <input type="phone" class="form-control"  name="phone">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="no_of_staff">City</label>
                                <input type="text" class="form-control" name="city">
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth">
                              </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="admin_image">Date Employed</label>
                              <input type="date" class="form-control" name="date_employed">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="company_name">Department</label>
                                <input type="text" class="form-control"  name="department">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="admin_image">Experience</label>
                              <input type="text" class="form-control" name="experience">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="company_name">Status</label>
                                <input type="text" class="form-control"  name="status">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="photo">Photo</label>
                              <input name="photo" id="photo" type="file" class="form-control"
                              accept="photo/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                              <br><div><img id="output" style="width:100px"></div>
                              </div>
                          </div>  
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Add Employee</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection