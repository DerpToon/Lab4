@extends('layouts.app')

@section('title','Search')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="input-group">
            <input type="search" id="search" name="search" class="form-control rounded" placeholder="Search" />
        </div>
    </div>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody id='mycard'>
       
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
            fill(value);
        });

        function fill(value=''){
            $.ajax({
                type: "get",
                url: "/search",
                data: {'search':value},
                success: function (data) {
                    console.log(data);
                    $('#mycard').html(data);
                }
            });
        }
        fill();
    });

</script>

@endsection