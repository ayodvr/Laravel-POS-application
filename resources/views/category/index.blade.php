@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Category Table</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Table</div>
              <div class="breadcrumb-item">Category Table</div>
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
                    <a href="{{route('categories.create')}}" class="btn btn-outline-success pull-right">Add Category</a>
                  </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Number of Product</th>
                        <th>Action</th>     
                      </tr>
                    </thead>
                    
                    <tbody>
                        @if(!empty($categories))
                        @foreach($categories as $category)
                      <tr>
                        <td>{{$category->id}}</td>
                        <td><img src="/storage/cat_image/{{$category->cat_image}}" style ="width:100px;padding:10px;border:none" alt="" class="img-fluid"></td>
                        <td>{{$category->cat_name}}</td>
                        <td>{{$category->products_count}}</td>
                        <td>
                        <div class="btn-group dropright">
                            <button type="button" class="btn btn-outline-dark">Action</button>
                            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropright">
                                <a class="dropdown-item btn btn-outline-info" href="/categories/{{$category->id}}/edit">Edit</a>
                                <a class="dropdown-item">
                                    <form action="{{ route('categories.destroy' , $category->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                        data-name ="{{ $category->cat_name }}" type="submit" style="margin-top: 5px">
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