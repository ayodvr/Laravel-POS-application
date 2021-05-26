@extends('layouts.master')
@section('content')
{{-- <?php
// $staff = Staffs::find($id);                        
?> --}}
  <!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>  
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
          <div class="row mt-sm-4 background-image-body">
              <div class="col-md-12 col-lg-12 box-center">
                  <div class="row author-box">
                      <img alt="image" src="/storage/photo/{{$staff->photo}}" class="rounded-circle author-box-picture box-center mt-4">
                  </div>
                 <div class="row author-box">
                      <div class="page-inner box-center align-center">
                      <h2><a>{{$staff->user_name}}</a></h2>
                      </div>
                  </div>         			
              </div>
          </div>
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                <div class="card-header">
                  <h4>Personal Details</h4>
                </div>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                          <div class="col-md-3 col-6">
                            <strong>User Name</strong>
                            <br>
                            <p class="text-muted">{{$staff->user_name}}</p>
                          </div>
                      <div class="col-md-3 col-6">
                        <strong>Email</strong>
                        <br>
                      <p class="text-muted">{{$staff->user_email}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>User Type</strong>
                        <br>
                        <p class="text-muted"> {{$staff->user_usertype}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Mobile</strong>
                        <br>
                        <p class="text-muted">{{$staff->phone}}</p>
                      </div>
                       <div class="col-md-3 col-6">
                        <strong>Department</strong>
                        <br>
                        <p class="text-muted">{{$staff->department}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Address</strong>
                        <br>
                        <p class="text-muted">{{$staff->address}}</p>
                      </div>
                       <div class="col-md-3 col-6">
                        <strong>Location</strong>
                        <br>
                        <p class="text-muted">{{$staff->city}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection