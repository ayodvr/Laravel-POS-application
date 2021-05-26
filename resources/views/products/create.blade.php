@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add Product</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>  
          <div class="breadcrumb-item">Add Product</div>
        </div>
      </div>
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
     <div class="alert alert-danger" style="width:50%; margin:auto">
                 {{$error}}</div>
         @endforeach
     @endif
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
          
           
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="category">Category</label>
                            <select name="cat_id" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row">   
                          <div class="form-group col-md-6 col-12">
                            <label for="description">Description</label>
                            <textarea class="form-control summernote-simple" name="description"></textarea>
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label for="quantity">Quantity</label>
                              <input type="number" value="0" class="form-control"  name="quantity">
                            </div>
                        </div>
                        <div class="row">  
                            <div class="form-group col-md-6 col-12">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" value="0" class="form-control" name="selling_price">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="city">Cost Price</label>
                                <input type="number" value="0" class="form-control" name="cost_price">
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label for="prod_image">Avatar</label>
                              <input name="prod_image" id="prod_image" type="file" class="form-control"
                              accept="prod_image/*" onchange="document.getElementById('pluck').src = window.URL.createObjectURL(this.files[0])">
                              <br><div><img id="pluck" style="width:100px"></div>
                              </div> 
                          </div> 
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Add Product</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection