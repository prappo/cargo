<table style="width: 100%" id="mytable" class="table table-bordered table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>#ID</th>
        <th>First Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Cap</th>
        <th>Action</th>

    </tr>
    </thead>

    <tbody>

    @foreach($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->surname}}</td>
            <td>{{$d->phone}}</td>
            <td>{{$d->date_of_birth}}</td>
            <td>{{$d->address}}</td>
            <td>{{$d->cap}}</td>
            <td>
                <button data-id="{{$d->id}}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> This</button>
            </td>
        </tr>

    @endforeach


    </tbody>

    <tfoot>
    <tr>
        <th>#ID</th>
        <th>First Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Cap</th>
        <th>Action</th>

    </tr>
    </tfoot>
</table>

<script>
    $('.btn-xs').click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{url('/customer/get/info')}}",
            type: 'POST',
            data: {
                'id': id
            },
            success: function (data) {
                if (data.status == "success") {
                    $('#customerId').val(id);
                    $('#cName').val(data.name);
                    $('#cSurname').val(data.surname);
                    $('#cPhone').val(data.phone);
                    $('#cCity').val(data.city);
                    $('#cCountry').val(data.country);
                    $('#cAddress').val(data.address);
                    $('#cCap').val(data.cap);
                }
            }, error: function (data) {
                console.log(data.responseText);
            }

        });
        $.ajax({
            type: 'POST',
            url: '{{url('/receivers/get')}}',
            data: {
                'customerId': id
            },
            success: function (data) {
                $('#receiverInfoDiv').html(data);
            },
            error: function (data) {
                swal("Error", "Something went wrong", "error");
                console.log(data.responseText);
            }
        });
    });
</script>