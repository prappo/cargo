<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <strong>Version</strong> 3
    </div>
    <strong>Developed by </strong><a href="http://prappo.github.io" target="_blank">Prappo</a>
</footer>

<iframe class="float" style="overflow: hidden" src="http://localhost:8000/chat/list" width="300"
        height="370" frameBorder="0">Browser not compatible.
</iframe>
@if(\App\ChatNotify::where('userId',Auth::user()->id)->sum('count') > 0)
    <a id="btnFloat" class="btnFloat bg-red">
        <i class="fa fa-comments my-float"></i>
        <label>{{\App\ChatNotify::where('userId',Auth::user()->id)->sum('count')}}</label>

    </a>
@else
    <a id="btnFloat" class="btnFloat">
        <i class="fa fa-comments my-float"></i>

    </a>

@endif
