@extends('layouts.master')
@section('content')
{{-- <?php

// $staff_info = App\User::find($staff);
//dd($staff_info[1]->name);                        
?> --}}
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Staffs Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Table</div>
          <div class="breadcrumb-item">Staffs Table</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Staffs Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tableExport" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Usertype</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Restore</th> 
                        <th>Destroy</th>                      
                      </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($staff as $staff)
                      <tr>
                        <td>{{$staff->id}}</td>
                        <td><img src="/storage/photo/{{$staff->photo}}" style ="width:100px" alt="" class="img-fluid"></td>
                        <td>{{$staff->user_name}}</td>
                        <td>{{$staff->user_email}}</td>
                        <td>{{$staff->user_usertype}}</td>
                        <td>{{$staff->phone}}</td>
                        <td>{{$staff->department}}</td>
                        <td>
                        <a href="/staffs/restore/{{$staff->id}}" class="btn-sm btn btn-outline-success">Restore</a>
                        </td>
                        <td>
                        <a href="/staffs/kill/{{$staff->id}}" data-name ="{{ $staff->user_name }}" 
                            class="btn-sm btn btn-outline-danger destroy-confirm">
                            Destroy</a>
                        </td>
                        @endforeach
                      </tr>
                    </tbody>
                    
                  </table>
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
  </div>
  @endsection