@extends('layouts.purchase')
@section('content')
     
<div class="main-content" ng-app ='tutpos'>
	<section class="section">
	  <div class="section-header">
		<h1>Add Purchase</h1>
		<div class="section-header-breadcrumb">
		  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
		  <div class="breadcrumb-item"><a href="#">Purchase</a></div>
		  <div class="breadcrumb-item">Add Purchase</div>
		</div>
	  </div>
	  <div class="section-body">
		<div class="row" ng-controller="SearchPurchaseCtrl">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card" id="mycard-closable">
									<div class="card-header">
									  <h4>Products</h4>
									  <div class="card-header-action">
										<a data-collapse="#mycard-minimize" class="btn btn-icon btn-success" href="#"><i
											class="fas fa-minus"></i></a>
									  </div>
									</div>
									<div class="collapse show" id="mycard-minimize">
										&nbsp;
										<div class="search-group">
											<span class="nav-link nav-link-lg" id="search">
												<i class="fa fa-search" aria-hidden="false"></i>
											</span>
											<input style="color: black; width:80%" ng-model="searchKeyword" type="text" class="search-control" placeholder="Search" aria-label="search" aria-describedby="search">
										  </div>
									  <div class="card-body">
										<div class="row"  ng-repeat="product in products  | filter: searchKeyword | limitTo:10" style="float: left;padding:25px">
											<div >
											  <div class="main-link box">
											  <a href="#"><img class="img-responsive img-center" src="/storage/prod_image/@{{product.prod_image}}" alt=""
												ng-click="addReceivingTemp(product,newreceivingtemp)" style="width: 91px;image-background:white;"></a>
												<div class="text-center" style="margin-top: 5px"><p>@{{product.name}}</p></div>
											  </div>
											</div>
										</div>
									  </div>
									</div>
								  </div>
							</div>
						</div>
					</div>
				</div>
			</div>


		  <div class="col-lg-12 col-md-12 col-sm-12">
			{!! Form::open(['route'=> ['receiving.store'], 'method'=> 'POST']) !!}
			<div class="card">
			  <div class="card-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
					  <div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
									<table class="table table-striped">
										<thead>
										  <tr>
											<th scope="col">Id</th>
											<th scope="col">Product</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Total</th>
											<th scope="col">Remove</th>
										  </tr>
										</thead>
										<tbody>
											<tr ng-repeat="newreceivingtemp in receivingtemp">
											  <td>@{{newreceivingtemp.product_id}}</td>
											  <td>@{{newreceivingtemp.product.name}}</td>
											  <td>@{{newreceivingtemp.product.cost_price | currency}}</td>
											  <td><input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateReceivingTemp(newreceivingtemp)" ng-model="newreceivingtemp.quantity" size="2"></td>
											  <td>@{{newreceivingtemp.product.cost_price * newreceivingtemp.quantity | currency}}</td>
											  <td> <button class="btn btn-danger btn-xs" type="button" ng-click="removeReceivingTemp(newreceivingtemp.id)">
												<span class="fas fa-trash" aria-hidden="true"></span>
											</button></td>
											</tr>
										  </tbody>
									  </table>
								</table>
							  </div>
						</div>
					  </div>
					</div>
				  </div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						{{ Form::select(__('payment_type'), ['Cash' => __('Cash'), 'Cheque' => __('Cheque'), 'DebitCard' => __('Debit Card'), 
					'CreditCard' => __('Credit Card')], null, array('class' => 'form-control select2','placeholder'=>__('Payment Type'),'required')) }}
				</div> 
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="form-group">
						  <select class="form-control select2" name="supplier_id" required>
							<option value="">Select Supplier</option>
							@foreach($suppliers as $supplier)
							<option value="{{$supplier->id}}">{{$supplier->name}}</option>
							@endforeach
						  </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
					  <div class="form-group">
						<label>Amount Tendered</label>
						<input type="text" class="form-control" name="total" id="amount_tendered" ng-model="amount_tendered" required/>
					  </div>
				  </div>
				  <div class="col-lg-6 col-md-12 col-sm-12">
					  <div class="form-group">
						<label>Payment</label>
						<input type="text" class="form-control" name="payment" id="payment" ng-model='payment' required/>
					  </div>
				  </div>
			  </div>
			  <div class="row">
				<div class="col-md-12">
				  <div class="card">
					<div class="card-body">
					  <div class="form-group row mb-4">
						<label class="col-form-label col-12 col-md-3 col-lg-3">Note</label>
						<div class="col-md-12">
						  <textarea class="form-control" name="comments" id="comments"></textarea>
						</div>
					  </div>
					  <div class="form-group row mb-4">
						<div class="col-sm-12 col-md-7">
						  <button class="btn btn-lg btn-success">Pay</button>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-lg-3 col-md-12 col-sm-12">
				  <div class="form-group">
					<div class="input-group mb-3">
                        <input type="text" class="form-control" value="Total" aria-label="Amount (to the nearest dollar)" readonly>
                        <div class="input-group-append">
                          <span class="input-group-text">@{{sum(receivingtemp) | currency}}</span>
                        </div>
                      </div>
				  </div>
			  </div>
			  <div class="col-lg-3 col-md-12 col-sm-12">
				  <div class="form-group">
					<div class="input-group mb-3">
                        <input type="text" class="form-control" value="Amount Tendered" aria-label="Amount (to the nearest dollar)" readonly>
                        <div class="input-group-append">
                          <span class="input-group-text">@{{ amount_tendered | currency}}</span>
                        </div>
                      </div>
				  </div>
			  </div>
			  <div class="col-lg-3 col-md-12 col-sm-12">
				<div class="form-group">
				  <div class="input-group mb-3">
					  <input type="text" class="form-control" value="Payment" aria-label="Amount (to the nearest dollar)" readonly>
					  <div class="input-group-append">
						<span class="input-group-text">@{{ payment | currency}}</span>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12">
				<div class="form-group">
				  <div class="input-group mb-3">
					  <input type="text" class="form-control" value="Dues" aria-label="Amount (to the nearest dollar)" readonly>
					  <div class="input-group-append">
						<span class="input-group-text">@{{amount_tendered - payment | currency}}</span>
					  </div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		{!! Form::close() !!}
			</div>
		  </div>
	   </div>
	  </div>
	</section>
  </div>	 

@endsection