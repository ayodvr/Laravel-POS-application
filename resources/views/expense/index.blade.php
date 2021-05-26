@extends('layouts.master')
@section('content')
<?php



?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Expense</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Table</div>
          <div class="breadcrumb-item">Expense Table</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Expense List</h4>
              </div>
              <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                <a href="{{route('expense.create')}}" class="btn btn-outline-primary pull-right">Add Expense</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Dues</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Created By</th> 
                        <th>Action</th>    
                      </tr>
                    </thead>
                    
                    <tbody>
                        @if(!empty($expenses))
                        @foreach($expenses as $expense)
                      <tr>
                        <td>{{$expense['created_at']->diffForHumans()}}</td>
                        <td>{{$expense->qty}}</td>
                        <td>{{$expense->unit_price}}</td>
                        <td>{{$expense->total}}</td>
                        <td>{{$expense->payment}}</td>
                        <td>{{$expense->dues}}</td>
                        <td>{{$expense->expense_category->name}}</td>
                        <td>{{$expense->payment_type}}</td>
                        <td>{{auth()->user()->usertype}}</td>
                        <td>
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-outline-primary">Action</button>
                                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropright">
                                    <a href="/expense/{{$expense->id}}/edit" class="btn-sm btn btn-outline-info">Edit</a>
                                    <form action="{{ route('expense.destroy' , $expense->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                        data-name ="?" type="submit" style="margin-top: 5px">Delete</button>
                                    </form>
                                </div>
                            </div>
                         </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  {{-- <div class="pull-right">{{$products->links()}}</div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection