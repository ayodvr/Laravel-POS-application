@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sales Report</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Table</div>
              <div class="breadcrumb-item">Sales Report</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Customer List</h4> --}}
                  </div>
                  <div class="text-right">
                    <a href="{{route('sale_pdf')}}" class="btn btn-secondary buttons-pdf buttons-html5" style="margin-right: 30px;margin-top: 10px;">PDF</a>  
                </div>
                {{-- <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                    <a href="{{route('customers.create')}}" class="btn btn-outline-success pull-right">Add Customer</a>
                  </div> --}}
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Sold by</th>
                        <th>Sold to</th> 
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Dues</th> 
                        {{-- <th>Payment type</th>    --}}
                      </tr>
                    </thead>    
                    
                    <tbody>
                        @if(!empty($saleReport))
                        @foreach($saleReport as $value)
                      <tr>
                        <td>{{$value['created_at']->toFormattedDateString()}}</td>
                        <td>{{DB::table('sale_items')->where('sale_id', $value->id)->sum('quantity')}}</td>
                        <td>{{ $value->user['name'] }}</td>
                        <td>{{ $value->customer->name }}</td>
                        <td><span> &#x20A6;</span>{{number_format($value->grand_total, 2)}}</td>
                        <td><span> &#x20A6;</span>{{number_format($value->payment, 2)}}</td>
                        <td><span> &#x20A6;</span>{{number_format($value->dues, 2)}}</td>
                        {{-- <td>{{ $value->payment_type }}</td> --}}
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  {{-- <div class="pull-right">{{$customers->links()}}</div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection