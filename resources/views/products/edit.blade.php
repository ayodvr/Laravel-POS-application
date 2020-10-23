@extends('layouts.master')
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li> {{$error}} </li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                <form method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" name="name" class="form-control" value="{{$product->name}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $product->cat_id) selected @endif>{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="cost_price">Cost Price</label>
                              <input type="number" class="form-control"  name="cost_price" value="{{$product->cost_price}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label for="selling_price">Cost Price</label>
                              <input type="number" class="form-control"  name="selling_price" value="{{$product->selling_price}}">
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="description">Description</label>
                          <textarea name="description"  class="form-control summernote-simple">{{$product->description}}</textarea>
                          </div> 
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label for="prod_image">Photo</label>
                          <input type="file" class="form-control" name="prod_image" value="{{$product->prod_image}}">
                        </div>
                    </div>
                     </div>
                    </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Update Product</button>
                      </div>
                    </form>
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