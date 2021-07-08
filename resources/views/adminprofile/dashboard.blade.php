@extends('layouts.master')
@section('content')
    <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 style="font-family: Arial, Helvetica, sans-serif">Welcome, {{ Auth::user()->usertype }}</h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
              <div class="card card-primary">
                <div class="pricing">
                  <div class="pricing-price bg-purple">
                    <br>
                    <i class="fas fa-cart-arrow-down" style="width: 200px"></i>
                    <div class="package-name">Total Sales</div>
                  <div class="package-price"><b>&#x20A6;{{ number_format($sales)}}</b></div>
                   </div>
                </div> 
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <div class="card card-secondary">
                <div class="pricing">
                  <div class="pricing-price bg-teal">
                    <br>
                    <i class="fas fa-align-justify"></i>
                    <div class="package-name">Products</div>
                  <div class="package-price"><b>{{$items}}</b></div>
                   </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <div class="card card-danger">
                <div class="pricing">
                  <div class="pricing-price bg-dark-pink">
                    <br>
                    <i class="fas fa-users"></i>
                    <div class="package-name">Staffs</div>
                  <div class="package-price"><b>{{$staff}}</b></div>
                   </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <div class="card card-warning">
                <div class="pricing">
                  <div class="pricing-price bg-purple">
                    <br>
                    <i class="fas fa-users"></i>
                    <div class="package-name">Customers</div>
                  <div class="package-price"><b>{{$customers}}</b></div>
                   </div>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Latest Transcation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive mt-1">
                    <table class="table table-striped">
                      <tr>
                        <th>Order ID</th>
                        <th>Billing Name</th>
                        <th>Total</th>
                        <th>Due Date</th>
                        <th>Payment Status</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                      @foreach($latest as $sales)
                        <tr>
                        <td>{{$sales->uuid}}</td>
                        <td>{{$sales->customer->name}}</td>
                        <td><span> &#x20A6;</span>@money($sales->grand_total)</td>
                        <td>{{$sales['created_at']->toDayDateTimeString()}}</td>
                        <td>
                            @if($sales->status == 1)
                            <div class="badge badge-success badge-shadow">Paid</div>
                            @else
                            <div class="badge badge-danger badge-shadow">Unpaid</div>
                            @endif
                        </td>
                        {{-- <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        </td> --}}
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User Activity</h4>
                  </div>
                  <div class="card-body">
						      <div class="timeline-activity">
                            <div class="activity-item1">
                                    <div class="text-muted">01-03-2020</div>
                                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                            </div>
                            <div class="activity-item2">
                                    <div class="text-muted">15-03-2020</div>
                                    <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                            </div>
                            <div class="activity-item3">
                                    <div class="text-muted">11-04-2020</div>
                                    <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                            </div>
                            <div class="activity-item4">
                                    <div class="text-muted">21-04-2020</div>
                                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                            </div>
                        </div>
                        </div>
                  </div>
                </div>
          </div>
        </section>
	  </div>
@endsection