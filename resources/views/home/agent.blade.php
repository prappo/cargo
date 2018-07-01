@extends('layouts.app')
@section('title','Home')

@section('content')
    <div class="wrapper" xmlns="http://www.w3.org/1999/html">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                <div class="box no-border">
                    <div class="box-body">
                        <div class="col-md-3">Length <input class="form-control" type="number" id="length"></div>
                        <div class="col-md-3">Width <input class="form-control" type="number" id="width"></div>
                        <div class="col-md-3">Height <input class="form-control" type="number" id="height"></div>
                        <div class="col-md-3">
                            <label></label>
                            <button class="btn btn-success btn-block" id="calculate"> Calculate</button>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div align="center" class="col-md-12">
                            <h4> Volume :
                                <div style="color: darkgreen" id="result"></div>
                            </h4>
                        </div>
                    </div>
                </div>

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection

@section('js')
    <script>
        $('#calculate').click(function () {
            var length = parseInt($('#length').val());
            var width = parseInt($('#width').val());
            var height = parseInt($('#height').val());

            var result = ( length * width * height) / 5000;
            $('#result').html(result);
        })
    </script>
@endsection
