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
          	<div class="col-md-4">
              <div class="card">
              <div class="card-header">
                  <h4>Monthly Budget Summary</h4>
                </div>
                
                <div class="card-body card-type-4">
                  <div class="row pt-3 pb-3">
                    <div class="col-auto">
                      <div class="card-square l-bg-green text-white">
                        <i class="fas fa-align-justify"></i>
                      </div>
                    </div>
                    <div class="col">
                    <div class="font-weight-bold">Products</div>
                    <div class="progress" data-height="5">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="20%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-small float-right font-weight-bold text-muted">{{$items}} Items</div>
                    </div>
                  </div>
                  <div class="row pt-3 pb-3">
                    <div class="col-auto">
                      <div class="card-square l-bg-cyan text-white">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                    <div class="col">
                    <div class="font-weight-bold">Staffs</div>
                    <div class="progress" data-height="5">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="15%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-small float-right font-weight-bold text-muted">{{$staff}} Staffs</div>
                    </div>
                  </div>
                  <div class="row pt-3 pb-3">
                    <div class="col-auto">
                      <div class="card-square l-bg-orange text-white">
                      
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                    <div class="col">
                    <div class="font-weight-bold">Customers</div>
                    <div class="progress" data-height="5">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="30%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-small float-right font-weight-bold text-muted">{{$customers}} Customers</div>
                    </div>
                  </div>
                  <div class="row pt-3 pb-3">
                    <div class="col-auto">
                      <div class="card-square l-bg-purple text-white">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                    </div>
                    <div class="col">
                    <div class="font-weight-bold">Sales</div>
                    <div class="progress" data-height="5">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="58%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-small float-right font-weight-bold text-muted">&#x20A6; {{$sales}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Monthly Sales</h4>
                </div>
                <div class="card-body">
                 	<div id="monthlySalesChart"></div>
                </div>
              </div>
            </div>
           </div>
           {{-- <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Yearly Sales</h4>
                </div>
                <div class="card-body">
                  <div id="yearlySalesChart"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
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
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td>#TD1230</td>
                        <td>John Mitchell</td>
                        <td>150$</td>
                        <td>2020-01-20</td>
                        <td>
                            <div class="badge badge-success badge-shadow">Paid</div>
                        </td>
                        <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        
                        </td>
                      </tr>
                      <tr>
                        <td>#TD1231</td>
                        <td>Henry Smith</td>
                        <td>250$</td>
                        <td>2020-01-08</td>
                        <td>
                            <div class="badge badge-info badge-shadow">Refund</div>
                        </td>
                        <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        
                        </td>
                      </tr>
                       <tr>
                        <td>#TD1232</td>
                        <td>Barry Hick</td>
                        <td>350$</td>
                        <td>2019-12-29</td>
                        <td>
                            <div class="badge badge-success badge-shadow">Paid</div>
                        </td>
                        <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        
                        </td>
                      </tr>
                       <tr>
                        <td>#TD1233</td>
                        <td>Ronald Taylor</td>
                        <td>435$</td>
                        <td>2020-02-02</td>
                        <td>
                            <div class="badge badge-danger badge-shadow">Chargeback</div>
                        </td>
                        <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        
                        </td>
                      </tr>
                      <tr>
                        <td>#TD1234</td>
                        <td>Ava Johnson</td>
                        <td>220$</td>
                        <td>2020-02-27</td>
                        <td>
                            <div class="badge badge-info badge-shadow">Refund</div>
                        </td>
                        <td>
                          <div class="media-cta-square">
                        	<a href="#" class="btn btn-outline-primary">Detail</a>
                      	</div>
                        
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </section>
	  </div>
@endsection