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
                    {!! Form::open(['route' => ['customers.update', $customer->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}         
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('name', 'Full Name')}}
                                {{ Form::text('name',$customer->name,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('email', 'Email')}}
                                {{ Form::email('email',$customer->email,['class'=>'form-control'])}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('phone_number', 'Phone Number')}}
                                {{ Form::text('phone_number',$customer->phone_number,['class'=>'form-control'])}}
                              </div>
                              <div class="form-group col-md-6 col-12">
                                {{Form::label('address', 'Address')}}
                                {{ Form::text('address',$customer->address,['class'=>'form-control'])}}
                              </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                {{Form::label('city', 'City')}}
                                {{ Form::text('city',$customer->city,['class'=>'form-control'])}}
                                </div>
                                <div class="form-group col-md-6 col-12">
                                {{Form::label('state', 'State')}}
                                {{ Form::text('state',$customer->state,['class'=>'form-control'])}}
                                  </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6 col-12">
                                {{Form::label('zip', 'Zip')}}
                                {{ Form::text('zip',$customer->zip,['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('company_name', 'Company Name')}}
                                    {{ Form::text('company_name',$customer->company_name,['class'=>'form-control'])}}
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('account', 'Account')}}
                                    {{ Form::text('account',$customer->account,['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('prev_balance', 'Previous Balance')}}
                                    {{ Form::number('prev_balance',$customer->prev_balance,['class'=>'form-control'])}}
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::label('payment', 'Payment')}}
                                    {{ Form::number('payment',$customer->payment,['class'=>'form-control'])}}
                                  </div>
                                  <div class="form-group col-md-6 col-12">
                                    {{Form::file('avatar')}}
                                  <img src="/storage/avatar/{{$customer->avatar}}" style="width:80px" alt="avatar">
                                </div>
                              </div>
                            </div>
                          </div>
                        {{Form::hidden('_method','PUT')}}
                        <div class="card-footer text-center">
                   {{Form::submit('Update Customer', ['class' =>'btn btn-success'])}}
                    </div>
                    {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection