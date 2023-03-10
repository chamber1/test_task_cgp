@extends('admin/layouts/dashboard')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $.noConflict();

                $('#client-table').DataTable({
                    ajax: '/admin/data',
                    serverSide: true,
                    processing: true,
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'age', name: 'age'},
                        {data: 'gender', name: 'gender'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                    ]
                });
            })
        </script>
@endsection

