@extends('layouts.master')
@section('content')

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
                      <img alt="image" src="/storage/avatar/{{$customer->avatar}}" class="rounded-circle author-box-picture box-center mt-4">
                  </div>
                 <div class="row author-box">
                      <div class="page-inner box-center align-center">
                      <h2><a>{{$customer->name}}</a></h2>
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
                            <strong>Id</strong>
                            <br>
                          <p class="text-muted">{{$customer->id}}</p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">{{$customer->name}}</p>
                          </div>
                      <div class="col-md-3 col-6">
                        <strong>Email</strong>
                        <br>
                      <p class="text-muted">{{$customer->email}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Account</strong>
                        <br>
                        <p class="text-muted"> {{$customer->account}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Previous Balance</strong>
                        <br>
                        <p class="text-muted">{{$customer->prev_balance}}</p>
                      </div>
                       <div class="col-md-3 col-6">
                        <strong>Payment</strong>
                        <br>
                        <p class="text-muted">{{$customer->payment}}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Address</strong>
                        <br>
                        <p class="text-muted">{{$customer->address}}</p>
                      </div>
                       <div class="col-md-3 col-6">
                        <strong>Location</strong>
                        <br>
                        <p class="text-muted">{{$customer->city}}</p>
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