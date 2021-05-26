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
          <div class="breadcrumb-item">Suppliers Table</div>
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
                <a href="{{route('suppliers.create')}}" class="btn btn-outline-success pull-right">Add Supplier</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>     
                      </tr>
                    </thead>
                    
                    <tbody>
                        @if(!empty($suppliers))
                        @foreach($suppliers as $supplier)
                      
                      <tr>
                        <td>{{$supplier->id}}</td>
                        <td><img src="/storage/sup_img/{{$supplier->sup_img}}" style ="width:100px" alt="" class="img-fluid"></td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->company_name}}</td>
                        <td>{{$supplier->email}}</td>
                        <td>{{$supplier->phone}}</td>
                        <td>{{$supplier->address}}</td>
                        <td>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-outline-dark">Action</button>
                            <button type="button" class="btn btn-outline-dark dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropright">
                                <a href="/suppliers/{{$supplier->id}}/edit" class="btn-sm btn btn-outline-info">Edit</a>
                                    <form action="{{ route('suppliers.destroy' , $supplier->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm btn btn-outline-danger pull-right delete-confirm" 
                                        data-name ="{{ $supplier->name }}" type="submit" style="margin-top: 5px">Trash</button>
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