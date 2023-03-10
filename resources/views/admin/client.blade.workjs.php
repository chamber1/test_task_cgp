@extends('admin/layouts/dashboard')

@section('header_styles')


@endsection

@section('content')

    {{ $dataTable->table() }}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.noConflict();

            $('#client-table').DataTable({
                ajax: '/test',
                serverSide: true,
                processing: true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'dob', name: 'dob'}
                ]
            });
        })
    </script>

@endsection

@section('footer_scripts')



@endsection
