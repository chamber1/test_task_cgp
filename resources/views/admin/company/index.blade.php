@extends('admin.layouts.dashboard')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="pull-right">
                    <a href="{{ route('admin.companies.create') }}" class="btn btn btn-primary">
                        <i class="material-icons add">Create company</i>
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

                $('#company-table').DataTable({
                    ajax: '{{ route('admin.companies.data') }}',
                    serverSide: true,
                    processing: true,
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', width:'200px', orderable: false, searchable: false , render: drawButtons },
                    ]
                });

                function drawButtons(data, type, full, meta) {
                    return '<a href="/admin/companies/' + data +
                        '/edit/" class="btn btn btn-primary btn-sm btn-sm-table">' +
                        '<i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;' +
                        '<button onclick="deleteConfirm('+data+
                        ')"  class="btn btn btn-danger btn-sm delete-modal btn-sm-table">Delete</button>';
                }
            });

            function deleteConfirm(company_id) {
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
                            url: '{{ route('admin.companies.delete') }}',
                            data: {
                                _token: "{{ csrf_token() }}",
                                company_id: company_id
                            },
                            success: function (response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    //confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location='{{ route('admin.companies.index') }}'
                                });
                            }
                        });
                    }
                });
            }

        </script>
@endsection

