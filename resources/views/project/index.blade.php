@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Suppliers Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Table</div>
          <div class="breadcrumb-item">Projects Table</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h4>List Of Suppliers</h4> --}}

              </div>
              <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                <form action="{{route('importProject')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                  <input type="submit" class="btn btn-primary ml-3" value="Upload File">
                </form>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Introduction</th>
                        <th>Location</th>
                        <th>Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @if(!empty($projects))
                        @foreach($projects as $project)

                      <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->introduction}}</td>
                        <td>{{$project->location}}</td>
                        <td>{{$project->cost}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-dark">Action</button>
                                    <button type="button" class="btn btn-outline-dark dropdown-toggle"
                                         data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                <a href="/project/{{$project->id}}/edit" class="dropdown-item btn btn-outline-info">Edit</a>
                                    <form action="{{ route('project.destroy' , $project->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="dropdown-item btn btn-outline-danger pull-right delete-confirm"
                                        data-name ="{{ $project->name }}" type="submit" style="margin-top: 5px">Trash</button>
                                    </form>
                            </div>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  {{-- <div class="pull-right">{{$suppliers->links()}}</div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection

