@extends('layouts.app')
@section('title','User List')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}
                <div class="box">

                    <div class="box-body">
                        <table id="mytable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $d)

                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->email}}</td>
                                    <td @if($d->type == "admin") style="background:green;color: white; font-weight: 700 "@endif>{{$d->type}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a target="_blank" href="{{url('/user')}}/{{$d->id}}/update"
                                               class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a data-id="{{$d->id}}" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Delete</a>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach

                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>

                            </tr>
                            </tfoot>
                        </table>
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
        $('.btn-danger').click(function () {
            var id = $(this).attr('data-id');
            if (confirm("Are you sure ?")) {
                $.ajax({
                    url: '{{url('/user/delete')}}',
                    type: 'POST',
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        if (data == "success") {
                            swal("Success", "Deleted !", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else {
                            swal("Warning !", data, "warning");
                        }
                    },
                    error: function (data) {
                        swal("Error", "Something went wrong", "error");
                        console.log(data.responseText);
                    }
                });
            } else {

            }

        });
    </script>

@endsection
