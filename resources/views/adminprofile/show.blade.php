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
                      <h2><a>{{$admin->user_name}}</a></h2>
                      </div>
                  </div>         			
              </div>
          </div>
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4>Personal Details</h4>
              </div>
              <div class="card-body">
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      User Id
                    </span>
                    <span class="float-right text-muted">
                      {{$admin->id}}
                    </span>
                  </p>
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
          </div>
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="padding-20">
                <div class="card-header">
                  <h4>More Details</h4>
                </div>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
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
                       <div class="col-md-3 col-6">
                        <strong>Company Name</strong>
                        <br>
                        <p class="text-muted">{{$admin->company_name}}</p>
                      </div>
                      <div class="col-md-12 col-12">
                       <h6 class="text-center">Objective</h6> 
                        <p class="text-muted">{{$admin->objective}}</p>
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
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i
            class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
                <div class="setting-panel-header">Theme Customizer</div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">Theme Layout</h6>
                    <div class="selectgroup layout-color w-50">
                        <label> <span class="control-label p-r-20">Light</span>
                            <input type="radio" name="custom-switch-input" value="1"
                            class="custom-switch-input" checked> <span
                            class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="selectgroup layout-color  w-50">
                        <label> <span class="control-label p-r-20">Dark&nbsp;</span>
                            <input type="radio" name="custom-switch-input" value="2"
                            class="custom-switch-input"> <span
                            class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Colors</h6>
                <div class="sidebar-setting-options">
                    <ul class="sidebar-color list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="blue">
                            <div class="blue"></div>
                        </li>
                        <li title="coral">
                            <div class="coral"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="allports">
                            <div class="allports"></div>
                        </li>
                        <li title="barossa">
                            <div class="barossa"></div>
                        </li>
                        <li title="fancy">
                            <div class="fancy"></div>
                        </li>
                    </ul>
                </div>
    
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Theme Colors</h6>
                <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="blue">
                            <div class="blue"></div>
                        </li>
                        <li title="coral">
                            <div class="coral"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="allports">
                            <div class="allports"></div>
                        </li>
                        <li title="barossa">
                            <div class="barossa"></div>
                        </li>
                        <li title="fancy">
                            <div class="fancy"></div>
                        </li>
                        <li title="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li title="orange">
                            <div class="orange"></div>
                        </li>
                        <li title="green">
                            <div class="green"></div>
                        </li>
                        <li title="red">
                            <div class="red"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Layout Options</h6>
                <div class="theme-setting-options">
                    <label> <span class="control-label p-r-20">Compact
                            Sidebar Menu</span> <input type="checkbox"
                        name="custom-switch-checkbox" class="custom-switch-input"
                        id="mini_sidebar_setting"> <span
                        class="custom-switch-indicator"></span>
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-3 align-center">
                <a href="#"
                    class="btn btn-icon icon-left btn-outline-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                </a>
            </div>
        </div>
    </div>
    @endsection