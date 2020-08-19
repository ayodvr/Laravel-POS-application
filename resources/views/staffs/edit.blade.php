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
                    {!! Form::open(['route' => ['staffs.update', $staff->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}       
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_name', 'Full Name')}}
                            {{ Form::text('user_name',$staff->user_name,['class'=>'form-control','readonly'])}}
                          </div>
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_email', 'Email')}}
                            {{ Form::email('user_email',$staff->user_email,['class'=>'form-control','readonly'])}}
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_usertype', 'Role')}}
                            {{ Form::text('user_usertype',$staff->user_usertype,['class'=>'form-control','readonly'])}}
                          </div>
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('address', 'Address')}}
                            {{ Form::text('address',$staff->address,['class'=>'form-control'])}}
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('phone', 'Phone')}}
                            {{ Form::text('phone',$staff->phone,['class'=>'form-control'])}}
                            </div>
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('city', 'City')}}
                            {{ Form::text('city',$staff->city,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('date_of_birth', 'Date Of Birth')}}
                            {{ Form::text('date_of_birth',$staff->date_of_birth,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('date_employed', 'Date Employed')}}
                                {{ Form::text('date_employed',$staff->date_employed,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('department', 'Department')}}
                                {{ Form::text('department',$staff->department,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('experience', 'Experience')}}
                                {{ Form::text('experience',$staff->experience,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('status', 'Status')}}
                                {{ Form::text('status',$staff->status,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::file('photo')}}
                              <img src="/storage/photo/{{$staff->photo}}" style="width:80px" alt="staff_photo">
                            </div>
                          </div>
                        </div>
                      </div>
                      {{Form::hidden('_method','PUT')}}
                      <div class="card-footer text-center">
                        {{Form::submit('Update Profile', ['class' =>'btn btn-success'])}}
                      </div>
                      {!! Form::close() !!}
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