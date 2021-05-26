@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Employee Details</h1>
        <div class="section-header-breadcrumb">  
          <div class="breadcrumb-item">Edit Employee</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">  
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    {!! Form::open(['route' => ['staffs.update', $staff->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}       
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_name', 'Full Name')}}
                            {{ Form::text('user_name',$staff->user_name,['class'=>'form-control','readonly'])}}
                          </div>
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_email', 'Email')}}
                            {{ Form::email('user_email',$staff->user_email,['class'=>'form-control','readonly'])}}
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('user_usertype', 'Role')}}
                            {{ Form::text('user_usertype',$staff->user_usertype,['class'=>'form-control','readonly'])}}
                          </div>
                          <div class="form-group col-md-6 col-12">
                            {{Form::label('address', 'Address')}}
                            {{ Form::text('address',$staff->address,['class'=>'form-control'])}}
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('phone', 'Phone')}}
                            {{ Form::text('phone',$staff->phone,['class'=>'form-control'])}}
                            </div>
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('city', 'City')}}
                            {{ Form::text('city',$staff->city,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                            {{Form::label('date_of_birth', 'Date Of Birth')}}
                            {{ Form::text('date_of_birth',$staff->date_of_birth,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('date_employed', 'Date Employed')}}
                                {{ Form::text('date_employed',$staff->date_employed,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('department', 'Department')}}
                                {{ Form::text('department',$staff->department,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('experience', 'Experience')}}
                                {{ Form::text('experience',$staff->experience,['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('status', 'Status')}}
                                {{ Form::text('status',$staff->status,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::file('photo')}}
                            </div>
                          </div>
                        </div>
                      </div>
                      {{Form::hidden('_method','PUT')}}
                      <div class="card-footer text-center">
                        {{Form::submit('Update Employee', ['class' =>'btn btn-success'])}}
                      </div>
                      {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection