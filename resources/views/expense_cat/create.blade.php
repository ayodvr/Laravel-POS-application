@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content"  ng-app="automateApp">
    <section class="section">
      <div class="section-header">
        <h1>Expense Category</h1>
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
                    <form method="POST" action="{{route('expense_cat.store')}}">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                          <input type="text" class="form-control" name="name">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="description">Description</label>
                          <input type="text" class="form-control" name="description">
                        </div>
                        </div>  
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection