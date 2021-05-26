@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add Category</h1>
        <div class="section-header-breadcrumb"> 
          <div class="breadcrumb-item">Add Category</div>
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
                    <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" class="form-control" name="cat_name">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="avatar">Choose Avatar</label>
                          <input type="file" class="form-control" name="cat_image" accept="cat_image/*"
                          onchange="document.getElementById('show').src = window.URL.createObjectURL(this.files[0])">
                          <br><div><img id="show" style="width: 100px"></div>
                        </div>
                        </div>  
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Add Category</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection