@extends('admin.layouts.dashboard')

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
                    ajax: '{{ route('admin.clients.data') }}',
                    serverSide: true,
                    processing: true,
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'age', name: 'age'},
                        {data: 'gender', name: 'gender', render: setGender},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', width:'200px', orderable: false, searchable: false , render: drawButtons },
                    ]
                });

                function setGender(data, type, full, meta) {
                    return data == 1 ? 'female' : 'male';
                }

                function drawButtons(data, type, full, meta) {
                    return '<a href="/admin/clients/' + data +
                        '/edit/" class="btn btn btn-primary btn-sm btn-sm-table">' +
                        '<i class="fa fa-edit"></i>Edit</a>';
                }

            })
        </script>
@endsection

