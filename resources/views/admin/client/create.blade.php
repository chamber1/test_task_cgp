@extends('admin.layouts.dashboard')

@section('content')
    <section class="content-header">
        <span> Creating record </span>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{ Form::open(['onsubmit' => 'return false' ,'method' => 'post','id' => 'clientForm']) }}
                    @include('admin.client._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#clientForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.clients.store') }}',
                    data:{
                        _token: "{{ csrf_token() }}",
                        first_name: $('#first_name').val(),
                        last_name: $('#last_name').val(),
                        age: $('#age').val(),
                        gender: $( "#gender" ).val(),
                        phone: $( "#phone" ).val(),
                        email: $( "#email" ).val()
                     },
                    success: function (data) {
                     window.location.href = "{{ route('admin.clients.index') }}";
                    },
                    error: function (response) {
                        $('.text-danger').remove();
                        $.each(response.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger">' +error+ '</span>')
                        })
                    }
                });
            });
        });
    </script>
@endsection
