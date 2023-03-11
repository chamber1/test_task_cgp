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
        <script src="{{ asset('js/client.js') }}"></script>
@endsection

