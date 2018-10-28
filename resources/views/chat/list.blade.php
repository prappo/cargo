@extends('layouts.app')
@section('title','Chat List')

@section('content')


    <!-- DIRECT CHAT PRIMARY -->
    <div style="margin: 0px;padding:0px" class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Chat</h3>

            <div class="box-tools pull-right">


                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                        data-widget="chat-pane-toggle" data-original-title="Contacts">
                    <i class="fa fa-comments"></i></button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- Conversations are loaded here -->


            <div class="direct-chat-messages">
                <br><br>

                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                        data-widget="chat-pane-toggle" data-original-title="Contacts">
                    <i class="fa fa-comments"></i> Click here To start conversation
                </button>
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
            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..."
                           class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
            </form>
        </div>
        <!-- /.box-footer-->

        <!--/.direct-chat -->


        @endsection

        @section('css')
            <style>

            </style>


@endsection
