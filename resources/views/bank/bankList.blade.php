<label><i class="fa fa-key"></i>Bank Account</label>
<select id="banks" class="form-control">
    @foreach($data as $d)
        <option value="{{$d->id}}">{{$d->account}}</option>
    @endforeach
</select>

