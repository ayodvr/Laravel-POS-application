@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li> {{$error}} </li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                <form method="POST" action="{{route('suppliers.update',$supplier->id)}}" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" name="name" class="form-control" value="{{$supplier->name}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{$supplier->company_name}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$supplier->email}}">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="phone">Phone</label>
                          <input type="text" class="form-control" name="phone" value="{{$supplier->phone}}">
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="address">Address</label>
                              <input type="text" class="form-control"  name="address" value="{{$supplier->address}}">
                            </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control"  name="city" value="{{$supplier->city}}">
                                </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="state">State</label>
                                <input type="text" class="form-control"  name="state" value="{{$supplier->state}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label for="country">Country</label>
                              <input type="text" class="form-control"  name="country" value="{{$supplier->country}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="state">Previous Balance</label>
                            <input type="number" class="form-control"  name="prev_balance" value="{{$supplier->prev_balance}}">
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label for="country">Payment</label>
                          <input type="number" class="form-control"  name="payment" value="{{$supplier->payment}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="state">Account</label>
                        <input type="account" class="form-control"  name="account" value="{{$supplier->account}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label for="country">Comments</label>
                      <input type="text" class="form-control"  name="comments" value="{{$supplier->comments}}">
                    </div>
                </div>
                        <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control"  name="postal_code" value="{{$supplier->postal_code}}">
                                </div>
                             <div class="form-group col-md-6 col-12">
                                    <label for="sup_img">Photo</label>
                                    <input type="file" class="form-control" name="sup_img" value="{{$supplier->sup_img}}">
                            </div>
                        </div>
                     </div>
                    </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Update Supplier</button>
                      </div>
                    </form>
              </div>
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
    @endsection