@extends('admin.layouts.dashboard')

@section('content')
    <section class="content-header">
        <span> Creating company </span>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{ Form::open(['onsubmit' => 'return false' ,'method' => 'post','id' => 'companyForm']) }}
                    @include('admin.company._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#companyForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.companies.store') }}',
                    data:{
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        phone: $( '#phone' ).val(),
                        email: $( '#email' ).val()
                     },
                    success: function (data) {
                        window.location.href = "{{ route('admin.companies.index') }}";
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
