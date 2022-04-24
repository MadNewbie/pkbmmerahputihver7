<div class="row">
    <div class="form-group col-xs-12 col-md-4">
        {!! Form::label('name', 'Nama') !!}
        {!! Form::text('name', null, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-12 col-md-3">
        {!! Form::label('username', 'Username') !!}
        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-12 col-md-3">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['placeholder' => 'your.name@domain.com', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-md-5">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-12 col-md-5">
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>
@if(strtolower(Auth::user()->roles[0]->name) == "administrator" || strtolower(Auth::user()->roles[0]->name) == "developer")
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles, isset($userRole) ? $userRole : [], array('class' => 'form-control', 'multiple')) !!}
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="form-group col-xs-6 col-sm-2">
        <a href="{{URL::previous()}}" class="btn btn-primary" style="width:100%">Kembali</a>
    </div>
    <div class="form-group col-xs-6 col-sm-2">
        <button type="submit" class="btn btn-success" style="width:100%">Simpan</button>
    </div>
</div>