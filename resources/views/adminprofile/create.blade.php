@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Create Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>  
          <div class="breadcrumb-item">Create Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
          </div>
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Full Name</label>
                          <input type="text" class="form-control" value="{{Auth::user()->name}}"readonly >
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Role</label>
                            <input type="text" class="form-control" value="{{Auth::user()->usertype}}" readonly>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="phone">Phone</label>
                              <input type="phone" class="form-control  @error('phone') is-invalid @enderror"  name="phone">
                              @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="no_of_staff">No of staff</label>
                                <input type="text" class="form-control @error('no_of_staff') is-invalid @enderror" name="no_of_staff">
                             @error('no_of_staff')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="objective">Objective</label>
                               <textarea class="form-control summernote-simple  @error('objective') is-invalid @enderror" name="objective" name="objective"></textarea>
                               @error('objective')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                            <div class="form-group col-md-6 col-12">
                              <input name="admin_image" id="admin_image" type="file" accept="admin_image/*"
                              onchange ="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                              <br><div><img id="output" style="width:100px"></div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control  @error('company_name') is-invalid @enderror"  name="company_name">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Create Profile</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection