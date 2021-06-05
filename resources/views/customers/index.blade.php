@extends('layouts.master')
@section('content')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer Table</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Table</div>
              <div class="breadcrumb-item">Customer Table</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Customer List</h4> --}}
                  </div>
                  <div>
                    {{-- <a href="{{route('customer_pdf')}}" class="btn btn-secondary buttons-pdf buttons-html5" style="margin-right: 30px;margin-top: 10px;">PDF</a>   --}}
                </div>
                <div class="pull-right" style="margin-right:25px;margin-top:10px;">
                    <a href="{{route('customers.create')}}" class="btn btn-outline-success pull-right">Add Customer</a>
                  </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="save-stage" style="width:100%;">                   
                    <thead>
                      <tr>
                        <th></th>
                        {{-- <th>Avatar</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>     
                      </tr>
                    </thead>    
                    
                    <tbody>
                        @if(!empty($customers))
                        @foreach($customers as $customer)

                        <?php
                          $nameparts = explode(' ', trim($customer->name));
                          $firstname = array_shift($nameparts);
                          $lastname  = array_pop($nameparts);
                          $initials[$customer->name] = strtoupper((mb_substr($firstname,0,1) . mb_substr($lastname,0,1)));
                        ?>
                      <tr>
                        <td class="badges"><span class="badge badge-dark">{{$initials[$customer->name]}}</span></td>
                        {{-- <td><img src="/storage/avatar/{{$customer->avatar}}" style ="width:100px" alt="" class="img-fluid"></td> --}}
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">Action</button>
                            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-outline-dark" href="/customers/{{$customer->id}}">View</a>
                                <a class="dropdown-item btn btn-outline-info" href="/customers/{{$customer->id}}/edit">Edit</a>
                                <a class="dropdown-item">
                                    <form action="{{ route('customers.destroy' , $customer->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn-sm btn btn-outline-danger delete-confirm" 
                                        data-name ="{{ $customer->name }}" type="submit" style="margin-top: 5px">
                                        Delete</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </td>
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