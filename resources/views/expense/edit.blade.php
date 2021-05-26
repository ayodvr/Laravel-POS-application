@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content"  ng-app="automateApp">
    <section class="section">
      <div class="section-header">
        <h1>Edit Expense</h1>
        <div class="section-header-breadcrumb"> 
          {{-- <div class="breadcrumb-item">Create Account</div> --}}
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
            <div class="card" ng-controller="automateController">
              <div class="padding-20">
                    <form method="POST" action="{{route('expense.update', $expense->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Select Category</label>
                            <select name="expense_category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($expense_cat as $value)
                                  <option value="{{$value->id}}" @if($value->id == $expense->expense_category_id) selected @endif>{{$value->name}}</option>
                               @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Payment Type</label>
                            <select name="payment_type" class="form-control">
                                <option value="">{{$expense->payment_type}}</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank_deposit">Bank Deposit</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{$expense->description}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="account_no">Total</label>
                            <span data-ng-bind=" qty * unit_price | currency"></span>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="number">Quantity</label>
                            <input type="number" class="form-control"  name="qty" ng-model= "qty" ng-init= "qty={{$expense->qty}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="balance">Payment</label>
                                <input type="number" class="form-control" name="payment" ng-model= "payment" ng-init= "payment={{$expense->payment}}">
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="email">Unit Amount</label>
                              <input type="number" class="form-control"  name="unit_price" ng-model= "unit_price" ng-init= "unit_price={{$expense->unit_price}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="balance">Dues</label>
                                <span data-ng-bind=" qty * unit_price - payment | currency"></span>
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