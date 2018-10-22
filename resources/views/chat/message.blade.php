@foreach($data as $d)
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
                <span class="direct-chat-name pull-left">{{\App\User::where('id',$d->to)->value('name')}}</span>
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