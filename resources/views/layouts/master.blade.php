<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>
      @yield('title')
    </title>
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/iziToast.css') }}">
  <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
   <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/weather-icon/css/weather-icons-wind.min.css')}}">
  {{-- <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css')}}" rel="stylesheet" /> --}}
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/Ico/sales.ico')}}' />
</head>

<body>
                    @include('includes.main_nav')
                    @yield('content')
                    @include('includes.footer')

<script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
  <script src="{{asset('assets/bundles/echart/echarts.js')}}"></script>
  <script src="{{ asset('js/iziToast.js') }}"></script>
  @include('vendor.lara-izitoast.toast')
  <script src="{{asset('assets/bundles/chartjs/chart.min.js')}}"></script>
  <script src="{{('assets/js/page/portfolio.js')}}"></script>
  {{-- <script>
    $('.select2').select2();
</script> --}}
<script>
$(function() {
   $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="{{asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/bundles/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{asset('js/angular.min.js')}}"></script>
  <script src="{{asset('js/automate.js')}}"></script>
  <script src="{{asset('js/protractor.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}}"></script>
  <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  @include('sweetalert::alert')
  <script>
          // Form method for delete/trash 
            $('.delete-confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete ${name}?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
              if (willDelete) {
                form.submit();
              }
            });
          });

            // link method for delete/trash
            $('.destroy-confirm').on('click', function (event) {
              var name = $(this).data("name");
              event.preventDefault();
              const url = $(this).attr('href');
                swal({
                    title:  `Are you sure you want to delete ${name}?`,
                    text: 'This profile and records will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
              });
        });
  </script>
</body>
</html>
<script>
  // Ajax call for registering users
  $(document).ready(function(){
      $('#regModal').on('submit',function(event){
          event.preventDefault();
          // $('.alert-danger').hide();
          //  $('.alert-danger').html('');
          $.ajax({
              url: "{{ url('/store')}}",
              method: "post",
              data:$('#regModal').serialize(),
              beforeSend:function(){  
                $('#insert').val("Registering");  
            },
              success:function(data){
                //console.log(result);
                $('#regModal')[0].reset();
                $('.alert-success').show();
                $('.alert-success').html(data.success_info).delay(10000).fadeOut();
              },
              error: function (request, status, error) {
                json = $.parseJSON(request.responseText);
                $.each(json.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<h6>'+value+'</h6>').delay(10000).fadeOut();           
                });  
             }
          });
      });
  });
</script>

<div id="registerModal" class="modal fade">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <div class="modal-body">
            <div class="text-center">
              <div class="alert alert-success" style="display:none"></div>   
              <div class="alert alert-danger" style="display:none">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
            </div>
              <div class="card">
                <div class="card-header card-header-auth">
                  <h4>{{ __('Register') }}</h4>
                </div>
                <div class="card-body">
                  <form method="POST" id="regModal">
                      @csrf
                      <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="invalid-feedback">
                      </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="email">{{ __('UserType') }}</label>
                      <select id="usertype" class="form-control @error('usertype') is-invalid @enderror" name="usertype">
                                      <option value="">Select User</option>
                                      <option value="User">User</option>                 
                      </select>
                      @error('usertype')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="invalid-feedback">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="password" class="d-block">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" data-indicator="pwindicator"
                          name="password" autocomplete="new-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        <div id="pwindicator" class="pwindicator">
                          <div class="bar"></div>
                          <div class="label"></div>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="password-confirm" class="d-block">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" data-indicator="pwindicator" 
                        name="password_confirmation" autocomplete="new-password">
                        @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="insert" id="insert" value="Register" class="btn btn-auth-color btn-lg btn-block">
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
         </div>
        </div>
      </div>
