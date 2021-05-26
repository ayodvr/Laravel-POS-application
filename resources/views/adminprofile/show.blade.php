@extends('layouts.master')
@section('content')
<!-- Main Content -->
<?php
  $id = Auth::user()->id;
?>
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
                      <img alt="image" src="/storage/admin_image/{{$admin->admin_image}}" class="rounded-circle author-box-picture box-center mt-4">
                  </div>
                 <div class="row author-box">
                      <div class="page-inner box-center align-center">
                      <h2><a>{{auth()->user()->name}}</a></h2>
                      </div>
                  </div>         			
              </div>
          </div>
        <div class="row mt-sm-4">
          {{-- <div class="col-12 col-md-12 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4>Personal Details</h4>
              </div>
              <div class="card-body">
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      Full Name
                    </span>
                    <span class="float-right text-muted">
                    {{$admin->user_name}}   
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Email
                    </span>
                    <span class="float-right text-muted">
                      {{$admin->user_email}}
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Role
                    </span>
                    <span class="float-right text-muted">
                      {{$admin->user_usertype}}
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                    </span>
                    <span class="float-right text-muted">
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                <div class="card-header">
                  <h4>More Details</h4>
                </div>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                      <div class="col-md-3 col-6">
                        <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">{{auth()->user()->name}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Email</strong>
                        <br>
                        <p class="text-muted">{{$admin->user_email}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Role</strong>
                        <br>
                        <p class="text-muted">{{$admin->user_usertype}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Address</strong>
                        <br>
                      <p class="text-muted">{{$admin->address}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Phone</strong>
                        <br>
                        <p class="text-muted">{{$admin->phone}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>No of staffs</strong>
                        <br>
                        <p class="text-muted">{{$admin->no_of_staff}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <!--<a href="/adminprofile//edit" class="btn btn-info">Edit Account</a>-->
              <a href="/adminprofile/{{$id}}/destroy" data-name ="{{ $admin->user_name }}" class="btn btn-danger destroy-confirm">Delete Account</a>
             </div>
          </div>
        </div>
      </div>
    </section>
    @endsection