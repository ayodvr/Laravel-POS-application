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
                        {{-- <th>Id</th> --}}
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
                        {{-- <td>{{$rec['user_id']}}</td> --}}
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
  </div>

  @endsection