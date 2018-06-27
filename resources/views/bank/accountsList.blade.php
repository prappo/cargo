@extends('layouts.app')
@section('title','Account List')

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
                                <th>Account</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->account}}</td>
                                    <td>{{$d->description}}</td>
                                    <td>
                                        <button data-id="{{$d->id}}" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-times"></i> Delete
                                        </button>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Account</th>
                                <th>Description</th>
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
            $.ajax({
                type: 'POST',
                url: '{{url('/bank/account/delete')}}',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (data == "success") {
                        location.reload();
                    } else {
                        alert(data);
                    }
                },
                error: function (data) {
                    alert("Something went wrong");
                    console.log(data.responseText);

                }
            })
        })
    </script>

@endsection












