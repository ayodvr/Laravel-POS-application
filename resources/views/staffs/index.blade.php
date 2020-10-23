@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Employee Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Table</div>
          <div class="breadcrumb-item">Employee Table</div>
        </div>
      </div>
      @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
        @endif
      <div class="section-body">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif 
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>List Of Employees</h4>
              </div>
              <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                <a href="#" data-toggle="modal" data-target="#registerModal" class="btn btn-outline-primary pull-right">Add Employee</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>change Status</th>
                        <th>Action</th>     
                      </tr>
                    </thead>
                    
                    <tbody>
                        @if(!empty($recs))
                        @foreach($recs as $rec)
                      
                      <tr>
                        <td>{{$rec['user_id']}}</td>
                        <td><img src="/storage/photo/{{$rec['photo']}}" style ="width:100px" alt="" class="img-fluid"></td>
                        <td>{{$rec['name']}}</td>
                        <td>{{$rec['email']}}</td>
                        <td>{{$rec['usertype']}}</td>
                        <td>{{$rec['phone']}}</td>
                        <td>{{$rec['department']}}</td>
                        <td class="badges">@if($rec['status'] == 0) <span class="badge badge-danger">Inactive</span> 
                        @else <span class="badge badge-success">Active</span> @endif</td>
                        <td>
                        <a href="{{route ('changeStatus', ['id' => $rec['user_id']])}}"><input type="button" 
                                value=" @if($rec['status'] == 1) Deactivate  @else Activate @endif" 
                                class=" @if($rec['status'] == 1) btn-sm btn btn-outline-danger  @else btn-sm btn btn-outline-success @endif"/>
                            </a>
                        </td>
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">Action</button>
                            <button type="button" class="btn btn-outline-dark dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @if(isset($rec) && !empty($rec["phone"] && $rec["department"]))
                                <a href="/staffs/{{$rec['id']}}" class="dropdown-item btn btn-outline-info">View</a>
                                @endif
                                @if(isset($rec) && !empty($rec["phone"] && $rec["department"]))
                                <a href="/staffs/kill/{{$rec['user_id']}}" data-name ="{{ $rec['name'] }}" 
                                class="dropdown-item btn btn-outline-danger destroy-confirm">
                                    Delete
                                </a>
                                @endif
                                 @if(isset($rec) && empty($rec["phone"] && $rec["department"]))
                                 <form action="{{ route('staffs.destroy' , $rec['user_id']) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                    data-name ="{{ $rec['name'] }}" type="submit" style="margin-top: 5px">Delete</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                  {{-- <div class="pull-right">{{$data->links()}}</div> --}}
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