@extends('admin.layouts.dashboard')

@section('content')
    <section class="content-header">
        <span> Editing record # {{$client->id}} </span>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{ Form::model($client, array('onsubmit' => 'return false' ,'method' => 'post',)) }}
                    @include('admin.client._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
