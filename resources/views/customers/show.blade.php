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