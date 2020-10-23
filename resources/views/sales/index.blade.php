@extends('layouts.sale')
@section('content')
<div class="main-content"  ng-app="tutapos">
    <section class="section">
      <div class="section-body">
        <div class="row" ng-controller="SearchProductCtrl">
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
                                    <div class="text-center" style="margin-top: 5px"><p>@{{product.name}}</p></div>
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
                            <input value="{{Auth::user()->usertype}}" class="btn btn-dark" 
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
                            <button class="btn btn-outline-success" style="margin:2px;height:43px"><i class="fas fa-user-plus"></i></button>
                        </div> 
                    </div>
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="newsaletemp in saletemp">
                            <td>@{{newsaletemp.product_id}}</td>
                            <td>@{{newsaletemp.product.name}}</td>
                            <td>@{{newsaletemp.product.selling_price | currency}}</td>
                            <td><input type="text" style="text-align:center;width:50px;" autocomplete="off" name="quantity" ng-change="updateSaleTemp(newsaletemp)" ng-model="newsaletemp.quantity" size="2"></td>
                            <td>@{{newsaletemp.product.selling_price * newsaletemp.quantity | currency}}</td>
                            <td>
                                <button class="btn btn-danger btn-xs" type="button" ng-click="removeSaleTemp(newsaletemp.id)">
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
                           <div class="col-sm-8">
                               <p class="form-control-static subtotal"><b><input  style="width: 100px;height:20px;margin-left:200px;" 
                                 class="form-control" type="text" name="subtotal" value="@{{sum(saletemp)}}" readonly/></b>
                            </p>
                         </div>
                        </div>
                        <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                            <div class="col-sm-4">
                                <p>Flat Discount</p>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" style="width: 100px;height:20px" class="form-control" 
                                name="discount" id="add_discount" ng-model="add_discount" ng-init="add_discount =0" required/>
                            </div>
                            <div class="col-sm-4 text-right">
                                <p class="form-control-static"><b>@{{ (sum(saletemp)*add_discount_percent /100) + add_discount  | currency}}</b></p>
                            </div> 
                         </div>
                            <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Discount (%)</p>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" style="width: 100px;height:20px" class="form-control" 
                                    name="discount_percent" id="add_discount_percent" ng-model="add_discount_percent" ng-init="add_discount_percent =0" required/>
                                </div>   
                        </div>
                            <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Payment</p>
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" style="width: 100px;height:20px;"
                                    name="payment" id="add_payment" ng-model="add_payment" ng-init="add_payment =0" required/>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <p class="form-control-static"><b>@{{ add_payment | currency}}</b></p>    
                                </div>
                            </div>
                            <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                <div class="col-sm-4">
                                    <p>Tax</p>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <p class="form-control-static"><b>@{{ (0*(sum(saletemp))/100) | currency}}</b></p>
                                    </div>
                                </div>
                                <div class="row mx-0 px-3 py-2 font-weight-bold border-top border-bottom" style="height:40px">
                                    <div class="col-sm-4">
                                        <p>Due</p> 
                                    </div>
                                    
                                    <div class="col-sm-8 text-right">
                                         <p class="form-control-static">
                                        <b>@{{ (sum(saletemp) - add_payment - add_discount - (sum(saletemp)*add_discount_percent /100))+ (0*(sum(saletemp))/100) | currency}}</b>
                                    </p>
                                    </div>  
                                    
                                </div>
                            <div class="text-center">
                                <button class="btn btn-lg btn-success" type="submit" style="width:90%;margin:15px">Pay</button>
                            </div>
                      </div>
                    </div>
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
      </div>
    </section>
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i
            class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
                <div class="setting-panel-header">Theme Customizer</div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">Theme Layout</h6>
                    <div class="selectgroup layout-color w-50">
                        <label> <span class="control-label p-r-20">Light</span>
                            <input type="radio" name="custom-switch-input" value="1"
                            class="custom-switch-input" checked> <span
                            class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="selectgroup layout-color  w-50">
                        <label> <span class="control-label p-r-20">Dark&nbsp;</span>
                            <input type="radio" name="custom-switch-input" value="2"
                            class="custom-switch-input"> <span
                            class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Colors</h6>
                <div class="sidebar-setting-options">
                    <ul class="sidebar-color list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="blue">
                            <div class="blue"></div>
                        </li>
                        <li title="coral">
                            <div class="coral"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="allports">
                            <div class="allports"></div>
                        </li>
                        <li title="barossa">
                            <div class="barossa"></div>
                        </li>
                        <li title="fancy">
                            <div class="fancy"></div>
                        </li>
                    </ul>
                </div>
    
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Theme Colors</h6>
                <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="blue">
                            <div class="blue"></div>
                        </li>
                        <li title="coral">
                            <div class="coral"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="allports">
                            <div class="allports"></div>
                        </li>
                        <li title="barossa">
                            <div class="barossa"></div>
                        </li>
                        <li title="fancy">
                            <div class="fancy"></div>
                        </li>
                        <li title="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li title="orange">
                            <div class="orange"></div>
                        </li>
                        <li title="green">
                            <div class="green"></div>
                        </li>
                        <li title="red">
                            <div class="red"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Layout Options</h6>
                <div class="theme-setting-options">
                    <label> <span class="control-label p-r-20">Compact
                            Sidebar Menu</span> <input type="checkbox"
                        name="custom-switch-checkbox" class="custom-switch-input"
                        id="mini_sidebar_setting"> <span
                        class="custom-switch-indicator"></span>
                    </label>
                </div>
            </div>
            <div class="mt-3 mb-3 align-center">
                <a href="#"
                    class="btn btn-icon icon-left btn-outline-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                </a>
            </div>
        </div>
    </div>
  </div>
  @endsection