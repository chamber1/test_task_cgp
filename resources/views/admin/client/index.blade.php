@extends('admin.layouts.dashboard')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="pull-right">
                    <a href="{{ route('admin.clients.create') }}" class="btn btn btn-primary">
                        <i class="material-icons add">Create client</i>
                    </a>
                    <br><br>
                </div>
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
                        '<i class="fa fa-edit"></i>Edit</a>' +
                        '<button onclick="deleteConfirm('+data+
                        ')"  class="btn btn btn-danger btn-sm delete-modal btn-sm-table">Delete</button>';
                }
            });

            function deleteConfirm(client_id) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure you want to delete this record?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                   if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.clients.delete') }}',
                            data: {
                                _token: "{{ csrf_token() }}",
                                client_id: client_id
                            },
                            success: function (response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    //confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location='{{ route('admin.clients.index') }}'
                                });
                            }
                        });
                    }
                });
            }

        </script>
@endsection

