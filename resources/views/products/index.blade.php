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
              <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                <a href="{{route('products.create')}}" class="btn btn-outline-primary pull-right">Add Product</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Id</th>
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
                        <td>{{$product->id}}</td>
                        <td><img src="/storage/prod_image/{{$product->prod_image}}" style ="width:100px;padding:10px;border:none" alt="" class="img-fluid"></td>
                        <td>{{$product->uuid}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->categories->cat_name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->cost_price}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-outline-primary">Action</button>
                                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
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