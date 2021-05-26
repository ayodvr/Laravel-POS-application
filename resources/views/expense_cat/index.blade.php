@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Expense Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Table</div>
              <div class="breadcrumb-item"></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Category List</h4> --}}
                  </div>
                  <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                    <a href="{{route('expense_cat.create')}}" class="btn btn-outline-primary pull-right">Add Expense</a>
                  </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>  
                      </tr>
                    </thead>
                    
                    <tbody>
                        @if(!empty($expenses))
                        @foreach($expenses as $expense)
                      <tr>
                        <td>{{$expense->id}}</td>
                        <td>{{$expense->name}}</td>
                        <td>{{$expense->description}}</td>
                        <td>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-outline-primary">Action</button>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropright">
                                <a class="dropdown-item btn btn-outline-info" href="/expense_cat/{{$expense->id}}/edit">Edit</a>
                                <a class="dropdown-item">
                                    <form action="{{ route('expense_cat.destroy' , $expense->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                        data-name ="?" type="submit" style="margin-top: 5px">
                                        Delete</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  {{-- <div class="pull-right">{{$categories->links()}}</div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection