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
    @endsection