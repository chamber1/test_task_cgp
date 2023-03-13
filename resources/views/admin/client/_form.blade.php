<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Please fill  this form</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="form-group">
            <label for="first_name">First name</label>
            {{ Form::text('first_name', null, array('id' => 'first_name','class' => 'form-control', 'placeholder'=>'Enter first name')) }}
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            {{ Form::text('last_name', null, array('id' => 'last_name','class' => 'form-control', 'placeholder'=>'Enter last name')) }}
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            {!! Form::text('age', null, array('id' => 'age','class' => 'form-control', 'placeholder'=>'Enter age')) !!}
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            {{ Form::select('gender', array('1' => 'Female', '2' => 'Male'),'2', array('id' => 'gender','class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            {{ Form::text('phone', null, array('id' => 'phone','class' => 'form-control', 'placeholder'=>'Enter phone number')) }}
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            {{ Form::text('email', null, array('id' => 'email','class' => 'form-control', 'placeholder'=>'Enter email')) }}
        </div>
        <div class="form-group">
            <label for="companies">Company</label>
            {{Form::select('sports',$companiesList,$clientCompanies ?? null,array('id' => 'companies','multiple'=>'multiple','name'=>'companies[]','class' => 'form-control'))}}
        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="{{ route('admin.clients.index')}}" class="btn btn-danger">Cancel</a>
        <button class="btn btn-primary">Save</button>
    </div>

</div>
<!-- /.card -->
