@extends('layouts.app')
@section('title','Chat')

@section('content')


    <!-- DIRECT CHAT PRIMARY -->
    <div style="margin: 0px;padding:0px" class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Chat with {{\App\User::where('id',$id)->value('name')}}</h3>

            <div class="box-tools pull-right">


                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                        data-widget="chat-pane-toggle" data-original-title="Contacts">
                    <i class="fa fa-comments"></i></button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- Conversations are loaded here -->
            <div id="chatBox" class="direct-chat-messages">
            @foreach($data as $d)
                {{\App\Http\Controllers\ChatController::seen($d->id)}}
                @if(Auth::user()->id == $d->from)
                    <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">{{Auth::user()->name}}</span>
                                <span class="direct-chat-timestamp pull-left">{{\Carbon\Carbon::parse($d->created_at)->toDateTimeString()}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{url('/images/admin-lte/avatar.png')}}"
                                 alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{$d->message}}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>

                @else
                    <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">{{\App\User::where('id',$id)->value('name')}}</span>
                                <span class="direct-chat-timestamp pull-right">{{\Carbon\Carbon::parse($d->created_at)->toDateTimeString()}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{url('images/admin-lte/avatar1.png')}}"
                                 alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{$d->message}}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                @endif

            @endforeach
            <!-- /.direct-chat-msg -->


                <!-- /.direct-chat-msg -->
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
                <ul class="contacts-list">
                    @if(Auth::user()->type == "admin")

                        @foreach(\App\User::where('type','reseller')->get() as $reseller)
                            <li>
                                <a href="{{url('/chat')}}/{{\App\Http\Controllers\ChatController::createNode(Auth::user()->id,$reseller->id)}}/{{$reseller->id}}">
                                    <img class="contacts-list-img"
                                         src="{{url('/images/admin-lte/avatar2.png')}}"
                                         alt="User Image">

                                    <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              {{$reseller->name}}
                                @if($i = \App\Chat::where('node',$node = \App\Http\Controllers\ChatController::createNode(Auth::user()->id,$reseller->id))->where('read','no')->count() != 0)
                                    <label class="badge bg-red">{{\App\Http\Controllers\ChatController::notify($i,$node) }}</label>
                                @else
                                    {{\App\Http\Controllers\ChatController::notify($i,$node)}}
                                @endif

                            </span>

                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>




                        @endforeach

                    @elseif(Auth::user()->type == "reseller")



                        <li>
                            <a href="{{url('/chat')}}/{{\App\Http\Controllers\ChatController::createNode(Auth::user()->id,Auth::user()->ref)}}/{{Auth::user()->ref}}">
                                <img class="contacts-list-img"
                                     src="{{url('/images/admin-lte/avatar2.png')}}"
                                     alt="User Image">

                                <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              {{\App\User::where('id',Auth::user()->ref)->value('name')}}

                                @if($i = \App\Chat::where('node',$node=\App\Http\Controllers\ChatController::createNode(Auth::user()->id,Auth::user()->ref))->where('read','no')->count() != 0)
                                    <label class="badge bg-red">{{\App\Http\Controllers\ChatController::notify($i,$node) }}</label>
                                @else
                                    {{\App\Http\Controllers\ChatController::notify($i,$node)}}
                                @endif

                            </span>

                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>

                        @foreach(\App\User::where('ref',Auth::user()->id)->get() as $agent)

                            <li>
                                <a href="{{url('/chat')}}/{{\App\Http\Controllers\ChatController::createNode(Auth::user()->id,$agent->id)}}/{{$agent->id}}">
                                    <img class="contacts-list-img"
                                         src="{{url('/images/admin-lte/avatar2.png')}}"
                                         alt="User Image">

                                    <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              {{$agent->name}}
                                @if($i = \App\Chat::where('node',$node = \App\Http\Controllers\ChatController::createNode(Auth::user()->id,$agent->id))->where('read','no')->count() != 0)
                                    <label class="badge bg-red">{{\App\Http\Controllers\ChatController::notify($i,$node) }}</label>
                                @else
                                    {{\App\Http\Controllers\ChatController::notify($i,$node)}}
                                @endif

                            </span>

                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>

                        @endforeach

                    @elseif(Auth::user()->type == "agent")



                        <li>
                            <a href="{{url('/chat')}}/{{\App\Http\Controllers\ChatController::createNode(Auth::user()->id,Auth::user()->ref)}}/{{Auth::user()->ref}}">
                                <img class="contacts-list-img"
                                     src="{{url('/images/admin-lte/avatar2.png')}}"
                                     alt="User Image">

                                <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              {{\App\User::where('id',Auth::user()->ref)->value('name')}}
                                @if($i = \App\Chat::where('node',$node=\App\Http\Controllers\ChatController::createNode(Auth::user()->id,Auth::user()->ref))->where('read','no')->count() != 0)
                                    <label class="badge bg-red">{{\App\Http\Controllers\ChatController::notify($i,$node)}}</label>
                                @else
                                    {{\App\Http\Controllers\ChatController::notify($i,$node)}}
                                @endif

                            </span>

                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>




                @endif
                <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

            <div class="input-group">
                <input type="text" id="message" name="message" placeholder="Type Message ..."
                       class="form-control">
                <span class="input-group-btn">
                        <button id="send" class="btn btn-primary btn-flat">Send</button>
                      </span>
            </div>

        </div>
        <!-- /.box-footer-->
    </div>
    <!--/.direct-chat -->


@endsection


@section('js')
    <script>

        reload();

        function sendMessage() {
            $.ajax({
                type: 'POST',
                url: '{{url('/chat/insert')}}',
                data: {
                    'from': '{{Auth::user()->id}}',
                    'tot': '{{$id}}',
                    'message': $('#message').val()
                },
                success: function (data) {
                    if (data == "success") {
                        reload();
                    }
                }
            })
        }

        function reload() {
            $.ajax({
                type: 'POST',
                url: '{{url('/chat/get')}}',
                data: {
                    'to': '{{$id}}',
                    'from': '{{Auth::user()->id}}',
                    'nodeId': '{{\App\Http\Controllers\ChatController::createNode($id,Auth::user()->id)}}'
                },
                success: function (data) {
                    $('#chatBox').html(data);
                    var elem = document.getElementById('chatBox');
                    elem.scrollTop = elem.scrollHeight;
                },
                error: function (data) {
                    alert("Something went wrong");
                    console.log(data);
                }
            });
        }


        $('#message').bind('enterKey', function (e) {
            sendMessage();
            $('#message').val('');
        });

        $('#message').keyup(function (e) {
            if (e.keyCode == 13) {
                $(this).trigger("enterKey");
            }
        });

        $('#send').click(function () {
            sendMessage();
        });

        setInterval(function () {
            reload();
        }, 3000);
    </script>

@endsection










