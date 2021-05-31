@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Products Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Table</div>
          <div class="breadcrumb-item">Products Table</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>List of Products</h4>
              </div>
              <form action="{{ route('products.dmp') }}" method="post">
                @csrf
              <div style="margin-right:25px;margin-top:10px;">
                <input type="submit" value="Delete Selected" class="btn btn-primary btn-sm ml-5">
                <a href="{{route('products.create')}}" class="btn btn-outline-success pull-right">Add Product</a>
              </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="checkAll"></th>
                          {{-- <th>Id</th> --}}
                          <th>Image</th>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Cost Price</th>
                          <th>Selling Price</th>
                          <th>Action</th>     
                        </tr>
                      </thead>
                      
                      <tbody>
                          @if(!empty($products))
                          @foreach($products as $product)
                        
                        <tr>
                          <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" 
                            value="{{$product->id}}"></td>
                          {{-- <td>{{$product->id}}</td> --}}
                          <td><img src="/storage/prod_image/{{$product->prod_image}}" style ="width:100px;padding:10px;border:none" alt="" class="img-fluid"></td>
                          <td>{{$product->uuid}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->categories->cat_name}}</td>
                          <td>{{$product->quantity > -1 ? $product->quantity : 0 }}</td>
                          <td>{{$product->cost_price}}</td>
                          <td>{{$product->selling_price}}</td>
                          <td>
                              <div class="btn-group dropright">
                                  <button type="button" class="btn btn-outline-dark">Action</button>
                                  <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
                                      data-toggle="dropdown">
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu dropright">
                                      <a href="/products/{{$product->id}}" class="btn-sm btn btn-outline-primary">View</a>
                                      <a href="/products/{{$product->id}}/edit" class="btn-sm btn btn-outline-info">Edit</a>
                                      <form action="{{ route('products.destroy' , $product->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                          <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                          data-name ="{{ $product->name }}" type="submit" style="margin-top: 5px">Delete</button>
                                      </form>
                                  </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{-- <div class="pull-right">{{$products->links()}}</div> --}}
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script language="javascript">
    $("#checkAll").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
  </script>
  @endsection