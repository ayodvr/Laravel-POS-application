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
                             {{$sales['created_at']->toDayDateTimeString()}}<br>
                               Status: Paid - {{$sales['created_at']->toFormattedDateString()}}<br>
                               Employee: {{ $sales->user->name}}
                        </address>
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                      <div class="card-header">
                        <strong>Billed To:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            {{ $sales->customer->name}}<br>
                            @if(!empty($sales->customer->address))
                            {{ $sales->customer->address}}
                            @endif
                            </address>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-md-4">
                      <div class="card">
                      <div class="card-header">
                        <strong>Shipped To:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            {{ $sales->customer->name}}<br>
                            @if(!empty($sales->customer->address))
                            {{ $sales->customer->address}}
                            @endif
                        </address>
                      </div>
                    </div>
                  </div> --}}
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <strong>Invoice Details:</strong>
                      </div>
                      <div class="card-body">
                        <address>
                            Invoice #: SALE{{$saleItemsData->sale_id}}<br>
                        Invoice Date: {{$sales['created_at']->toDayDateTimeString()}}<br>
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
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Price</th>
                      {{-- <th class="text-right">Totals</th> --}}
                    </tr>
                    @foreach($saleItems as $value)
                    <tr>
                      <td>{{$value->product->name}}</td>
                      <td class="text-center">{{$value->quantity}}</td>
                      <td class="text-center"><span> &#x20A6;</span>@money($value->selling_price)</td>
                      {{-- <td class="text-right"><span> &#x20A6;</span>@money($value->total_selling)</td> --}}
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    {{-- <div class="section-title">Payment Method</div>
                    <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                      invoices.</p>
                    <div class="images">
                      <img src="assets/img/cards/visa.png" alt="visa">
                      <img src="assets/img/cards/jcb.png" alt="jcb">
                      <img src="assets/img/cards/mastercard.png" alt="mastercard">
                    </div> --}}
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                        {{-- <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Sub Total</div>
                            <div class="invoice-detail-value"><span> &#x20A6;</span>{{ $sales->grand_total }}</div>
                          </div> --}}
                        @if(!empty($sales->payment ))
                        <div class="invoice-detail-name">Payment</div>
                        <div class="invoice-detail-value"><span> &#x20A6;</span>@money($sales->payment)</div>
                        @endif
                    </div>
                      @if(!empty($sales->payment) && $sales->payment < $sales->grand_total)
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Dues</div>
                        <div class="invoice-detail-value"><span> &#x20A6;</span>@money($sales->dues)</div>
                      </div>
                      @endif
                      {{-- <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Tax</div>
                        <div class="invoice-detail-value"><span> &#x20A6;</span>{{ $sales->tax }}</div>
                      </div>
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Discount</div>
                        <div class="invoice-detail-value"><span> &#x20A6;</span>{{ $sales->discount }}</div>
                      </div> --}}
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                      <div class="invoice-detail-value invoice-detail-value-lg"><span> &#x20A6;</span>@money($sales->discount + $sales->grand_total - $sales->tax)</div>
                    </div>
                  </div>
                </div>
              </div>
            </div><hr>
            <div class="row mt-4">
                <div class="text-md-right">
                    <div class="float-lg-left">
                    <button  class="btn btn-success btn-icon icon-right" data-toggle="modal" data-target="#exampleModalCenter"
                      ><i class="fas fa-credit-card"></i>Pay</button>
                      <button class="btn btn-light btn-icon icon-left"><i class="fas fa-print"></i>Print invoice</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <input type="hidden" name="firstname" value="{{ $sales->customer->name }}"> {{-- required --}}
                <input type="hidden" name="email" value="{{ $sales->customer->email }}"> {{-- required --}}
                <input type="hidden" name="orderID" value="{{ $saleItemsData->sale_id }}">
                <input type="hidden" name="amount" value="{{ $sales->grand_total * 100 }}"> {{-- required in kobo --}}
                <input type="hidden" name="quantity" value="{{ $value->quantity }}">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="text-center">Checkout</h5>
                </div>
              </div>
              <br>
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                      <th>Image</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      {{-- <th class="text-right">Totals</th> --}}
                    </tr>
                    @foreach($saleItems as $value)
                    <tr>
                      <td><img src="/storage/prod_image/{{$value->product->prod_image}}" alt="product" 
                        style ="width:50px;padding:10px;border:none"></td>
                      <td>{{$value->product->name}}</td>
                      <td>{{$value->quantity}}</td>
                      <td><span> &#x20A6;</span>@money($value->selling_price)</td>
                      {{-- <td class="text-right"><span> &#x20A6;</span>@money($value->total_selling)</td> --}}
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-center">Total</h4>
                    <h5 class="text-center">₦ @money($sales->grand_total)</h5> 
                </div>
              </div>
              <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
