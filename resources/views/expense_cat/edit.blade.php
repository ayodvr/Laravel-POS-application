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
                    {!! Form::open(['route' => ['expense_cat.update', $expense->id], 'method' => 'POST']) !!}         
                          <div class="card-body">
                            <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('name', 'Name')}}
                                    {{ Form::text('name',$expense->name,['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('description', 'Description')}}
                                    {{Form::text('description',$expense->description['class'=>'form-control'])}}
                                </div>
                              </div>
                          </div>
                        {{Form::hidden('_method','PUT')}}
                        <div class="card-footer text-center">
                   {{Form::submit('Submit', ['class' =>'btn btn-success'])}}
                    </div>
                    {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection