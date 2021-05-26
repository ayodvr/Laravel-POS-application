@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>  
          <div class="breadcrumb-item">Edit Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
          
           
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    <form method="POST" action="{{route('update', ['id'=>$admin->id])}}" enctype="multipart/form-data">
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
                          <input type="text" class="form-control" name="address" value="{{$admin->address}}">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control"  name="phone" value="{{$admin->phone}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="no_of_staff">No of staff</label>
                                <input type="text" class="form-control" name="no_of_staff" value="{{$admin->no_of_staff}}">
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="objective">Objective</label>
                               <textarea class="form-control summernote-simple" name="objective">{{$admin->objective}}</textarea>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="company_name" value="{{$admin->company_name}}">
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="admin_image">Photo</label>
                            <input type="file" class="form-control" name="admin_image" value="{{$admin->admin_image}}">
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Update Profile</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection