@extends('layouts.app')
@section('title','Profile')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> Profile</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fa fa-user"></i> Name</label>
                                    <input class="form-control" type="text" id="name"
                                           value="{{\App\User::where('id',$userId)->value('name')}}"
                                           placeholder="Enter Agent Name">
                                </div>

                                <div class="form-group">
                                    <label><i class="fa fa-envelope"></i> Email</label>
                                    <input value="{{\App\User::where('id',$userId)->value('email')}}"
                                           class="form-control" type="email" id="email"
                                           placeholder="Enter Email Address">
                                </div>

                                <div class="form-group">
                                    <label><i class="fa fa-key"></i> Password</label>
                                    <input class="form-control" type="password" id="password"
                                           placeholder="Enter Email Address">
                                </div>


                                <!-- /.form-group -->
                            </div>


                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                        <div class="col-md-6">
                            <button id="update" class="btn btn-block btn-success"><i class="fa fa-save"></i> Update
                                Profile
                            </button>
                        </div>
                    </div>
                </div>

                {{-- block 1 end--}}

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection

@section('js')

    <script>
        $('.select2').select2();

        $('#update').click(function () {


            $.ajax({
                url: '{{url('/profile/update')}}',
                type: 'POST',
                data: {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'id': "{{$userId}}"
                },
                success: function (data) {
                    if (data == "success") {
                        swal("Success", "Profile Information updated Successfully", "success");

                        setTimeout(function () {
                            location.reload();
                        }, 2000);

                    }
                    else {
                        swal("Warning!", data, "warning");
                    }
                },
                error: function (data) {
                    alert("Something went wrong");
                    console.log(data.responseText);
                }
            })
        });

    </script>
@endsection

















