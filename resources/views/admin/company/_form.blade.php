<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Please fill  this form</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="form-group">
            <label for="name">Company name</label>
            {{ Form::text('name', null, array('id' => 'name','class' => 'form-control', 'placeholder'=>'Enter company name')) }}
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            {{ Form::text('phone', null, array('id' => 'phone','class' => 'form-control', 'placeholder'=>'Enter phone number')) }}
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            {{ Form::text('email', null, array('id' => 'email','class' => 'form-control', 'placeholder'=>'Enter email')) }}
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="{{ route('admin.companies.index')}}" class="btn btn-danger">Cancel</a>
        <button class="btn btn-primary">Save</button>
    </div>

</div>
<!-- /.card -->
