@extends('layouts.master')
@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Invoice</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Invoice</div>
        </div>
      </div>
      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="invoice-title">
                          <div class="login-invoice login-invoice-color">
                            <img alt="image" src="assets/img/logo.png" height="30" />
                                  Grexa
                          </div>
                            </div>
                    </div>
                    <div class="col-md-8 align-right">
                        <address>
                             INVOICE<br>
                             {{$receiving['created_at']->toDayDateTimeString()}}<br>
                               Status: Paid - {{$receiving['created_at']->toFormattedDateString()}}<br>
                               Employee: {{ $receiving->user->name}}
                        </address>
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                      <div class="card">
                      <div class="card-header">
                        <strong>Billed To:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            {{ $receiving->supplier->name}}<br>
                            @if(!empty($receiving->supplier->address))
                            {{ $receiving->supplier->address}}
                            @endif
                            </address>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card">
                      <div class="card-header">
                        <strong>Shipped To:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            {{ $receiving->supplier->name}}<br>
                            @if(!empty($receiving->supplier->address))
                            {{ $receiving->supplier->address}}
                            @endif
                        </address>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <strong>Invoice Details:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            Invoice #: SALE{{$receivingItemsData->receiving_id}}<br>
                        Invoice Date: {{$receiving['created_at']->toDayDateTimeString()}}<br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                      <th>Item</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-right">Totals</th>
                    </tr>
                    @foreach($receivingItems as $value)
                    <tr>
                      <td>{{$value->product->name}}</td>
                      <td class="text-center"><span> $</span>{{$value->cost_price}}</td>
                      <td class="text-center">{{$value->quantity}}</td>
                      <td class="text-right"><span> $</span>{{$value->total_cost}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="section-title">Payment Method</div>
                    <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                      invoices.</p>
                    <div class="images">
                      <img src="assets/img/cards/visa.png" alt="visa">
                      <img src="assets/img/cards/jcb.png" alt="jcb">
                      <img src="assets/img/cards/mastercard.png" alt="mastercard">
                    </div>
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                        <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Amount Tendered</div>
                            <div class="invoice-detail-value"><span> $</span>{{$receiving->total}}</div>
                        </div>
                        <div class="invoice-detail-name">Payment</div>
                        <div class="invoice-detail-value"><span> $</span>{{ $receiving->payment }}</div>
                      </div>
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Dues</div>
                        <div class="invoice-detail-value"><span> $</span>{{ $receiving->dues }}</div>
                      </div>
                  </div>
                </div>
              </div>
            </div><hr>
            <div class="row mt-4">
                <div class="text-md-right">
                    <div class="float-lg-left">
                    <a href="{{route('receiving.index')}}"><button  class="btn btn-success btn-icon icon-left"><i class="fas fa-credit-card"></i>New Purchase</button></a>
                      <button class="btn btn-light btn-icon icon-left"><i class="fas fa-print"></i>Print invoice</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
