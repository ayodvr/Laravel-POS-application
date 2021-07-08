@extends('layouts.sale')
@section('content')
<div class="main-content"  ng-app="tutapos" ng-cloak>
    <section class="section">
        <div class="section-header">
            <h1>Add Sales</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Sales</a></div>
              <div class="breadcrumb-item">Add Sales</div>
            </div>
          </div>
          <?php
          $user = Auth::user();
          $role = $user['usertype'];
          ?>
   @if ($role == 'Admin' || $role == 'User')    
      <div class="section-body">
        <div class="row" ng-controller="SearchProductCtrl" ng-cloak>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      <div class="bootstrap snippet">
                        <div id="portfolio" class="gray-bg padding-top-bottom">
                            <div class="search-group">
                                <span class="nav-link nav-link-lg" id="search">
                                    <i class="fa fa-search" aria-hidden="false"></i>
                                </span>
                                <input style="color: black" ng-model="searchKeyword" type="text" class="search-control" placeholder="Search Product" aria-label="search" aria-describedby="search">
                              </div>
                            <div class="row"  ng-repeat="product in products  | filter: searchKeyword | limitTo:10" style="float: left;padding:25px">
                                <div >
                                  <div class="main-link box">
                                  <a href="#"><img class="img-responsive img-center" src="/storage/prod_image/@{{product.prod_image}}" alt=""
                                    ng-click="addSaleTemp(product, newsaletemp)" style="width: 91px;image-background:white;"></a>
                                    <div class="text-center" style="margin-top: 5px"><p ng-cloak>@{{product.name}}</p></div>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route'=> ['sales.store'], 'method'=> 'POST']) !!}
                <div class="card" style="height: 100%">
                    <div class="card-header">
                        <div>
                            <input value="{{ $role }}" class="btn btn-dark" 
                            style="width: 100px;margin:5px;border-radius:5px;color:white"readonly>
                        </div>
                        <div style="margin-right:5px">
                        {{ Form::select(__('payment_type'), ['Cash' => __('Cash'), 'Cheque' => __('Cheque'), 'DebitCard' => __('Debit Card'), 
                        'CreditCard' => __('Credit Card')], null, array('class' => 'form-control select2','style'=>'width: 150px;margin:5px;border-radius:5px','placeholder'=>__('Payment Type'),'required')) }}
                        </div>
                        <div>
                            <select class="form-control select2" style="width: 150px;border-radius:5px" name="customer_id" required>
                            <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a href="#" data-toggle="modal" data-target="#customerModal" style="margin:2px;height:43px" class="btn btn-success"><i class="fas fa-user-plus" style="margin-top:10px"></i></a>
                        </div> 
                    </div>
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            {{-- <th scope="col">Id</th> --}}
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="newsaletemp in saletemp">
                            {{-- <td ng-cloak>@{{newsaletemp.product_id}}</td> --}}
                            <td ng-cloak>@{{newsaletemp.product.name}}</td>
                            <td ng-cloak>@{{newsaletemp.product.selling_price | currency:'&#x20A6;'}}</td>
                            <td><input type="text" style="text-align:center;width:50px;" autocomplete="off" name="quantity" ng-change="updateSaleTemp(newsaletemp)" ng-cloak ng-model="newsaletemp.quantity" size="2"></td>
                            <td ng-cloak>@{{newsaletemp.product.selling_price * newsaletemp.quantity | currency:'&#x20A6;'}}</td>
                            <td>
                                <button class="btn btn-danger btn-xs" type="button" ng-cloak ng-click="removeSaleTemp(newsaletemp.id)">
                                    <span class="fas fa-trash" aria-hidden="true"></span>
                                </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="margin-top:40%;height:40px">
                        <div class="col-sm-4">
                            <h6>Sub Total</h6>
                        </div>
                           <div class="col-sm-8" ng-cloak>
                               <p class="form-control-static subtotal"><b><input  style="width: 100px;height:20px;margin-left:200px;" 
                                 class="form-control" type="text" name="subtotal" value="@{{sum(saletemp)}}" readonly/></b>
                            </p>
                         </div>
                        </div>
                        {{-- <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                            <div class="col-sm-4">
                                <p>Flat Discount</p>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" style="width: 100px;height:20px" class="form-control" 
                                name="discount" id="add_discount" ng-model="add_discount" ng-init="add_discount =0" required/>
                            </div>
                            <div class="col-sm-4 text-right">
                                <p class="form-control-static"><b>@{{ (sum(saletemp)*add_discount_percent /100) + add_discount  | currency:'&#x20A6;'}}</b></p>
                            </div> 
                         </div> --}}
                            {{-- <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Discount (%)</p>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" style="width: 100px;height:20px" class="form-control" 
                                    name="discount_percent" id="add_discount_percent" ng-model="add_discount_percent" ng-init="add_discount_percent =0" required/>
                                </div>   
                        </div> --}}
                            <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Payment</p>
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" style="width: 100px;height:20px;"
                                    name="payment" id="add_payment" ng-model="add_payment" ng-init="add_payment =0" required/>
                                </div>
                                <div class="col-sm-4 text-right" ng-cloak>
                                    <p class="form-control-static"><b>@{{ add_payment | currency:'&#x20A6;'}}</b></p>    
                                </div>
                            </div>
                            {{-- <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Tax</p>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <p class="form-control-static"><b>@{{ (0*(sum(saletemp))/100) | currency:'&#x20A6;'}}</b></p>
                                    </div>
                                </div>
                                <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                    <div class="col-sm-4">
                                        <p>Due</p> 
                                    </div>
                                    
                                    <div class="col-sm-8 text-right">
                                         <p class="form-control-static">
                                        <b>@{{ (sum(saletemp) - add_payment - add_discount - (sum(saletemp)*add_discount_percent /100))+ (0*(sum(saletemp))/100) | currency:'&#x20A6;'}}</b>
                                    </p>
                                    </div>  
                                    
                                </div> --}}
                            <div class="text-center mt-5">
                                <button class="btn btn-lg btn-success" type="submit" style="width:90%;margin:15px">Make Payment</button>
                            </div>
                      </div>
                    </div>
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endif
      </div>
    </section>
  </div>
  @endsection

  <div id="customerModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
            <div class="modal-body">
              <div class="text-center">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div> 
              <div class="card">
                <div class="card-header card-header-auth">
                  <h4 style="text-align: center">{{ __('Add Customer') }}</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('customers.store')}}">
                      @csrf
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Full Name</label>
                        <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone_number">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address">
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Add Customer</button>
                      </div>
                  </form>
                </div>
              </div>
              </div>
              </div>
           </div>
          </div>
        </div>