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
          <div class="col-12 col-md-12 col-lg-4">  
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}         
                          <div class="card-body">
                            <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('cat_name', 'Name')}}
                                    {{ Form::text('cat_name',$category->cat_name,['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('cat_image', 'Image')}}
                                    {{Form::file('cat_image',['class'=>'form-control'])}}
                                </div>
                              </div>
                          </div>
                        {{Form::hidden('_method','PUT')}}
                        <div class="card-footer text-center">
                   {{Form::submit('Update Category', ['class' =>'btn btn-success'])}}
                    </div>
                    {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection