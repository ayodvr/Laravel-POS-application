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
                <form method="POST" action="{{route('suppliers.update',$supplier->id)}}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" name="name" class="form-control" value="{{$supplier->name}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{$supplier->company_name}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$supplier->email}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="phone">Phone</label>
                          <input type="text" class="form-control" name="phone" value="{{$supplier->phone}}">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="address">Address</label>
                              <input type="text" class="form-control"  name="address" value="{{$supplier->address}}">
                            </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control"  name="city" value="{{$supplier->city}}">
                                </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="state">State</label>
                                <input type="text" class="form-control"  name="state" value="{{$supplier->state}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label for="country">Country</label>
                              <input type="text" class="form-control"  name="country" value="{{$supplier->country}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="state">Previous Balance</label>
                            <input type="number" class="form-control"  name="prev_balance" value="{{$supplier->prev_balance}}">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label for="country">Payment</label>
                          <input type="number" class="form-control"  name="payment" value="{{$supplier->payment}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="state">Account</label>
                        <input type="account" class="form-control"  name="account" value="{{$supplier->account}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label for="country">Comments</label>
                      <input type="text" class="form-control"  name="comments" value="{{$supplier->comments}}">
                    </div>
                </div>
                        <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control"  name="postal_code" value="{{$supplier->postal_code}}">
                                </div>
                             <div class="form-group col-md-6 col-12">
                                    <label for="sup_img">Photo</label>
                                    <input type="file" class="form-control" name="sup_img" value="{{$supplier->sup_img}}">
                            </div>
                        </div>
                     </div>
                    </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Update Supplier</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection