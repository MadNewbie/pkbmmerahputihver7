@section('css-include-before')
<link rel="stylesheet" href="{{asset('vendor/summernote/css/summernote.min.css')}}">
@endsection
<div class="row">
    <div class="form-group col-xs-12 col-sm-10">
        {!! Form::label('title', 'Judul') !!}
        {!! Form::text('title', null, ['placeholder' => 'Judul', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-sm-10">
        {!! Form::label('thumb_img', 'Gambar Thumbnail') !!}
        {!! Form::file('thumb_img', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-sm-10">
        {!! Form::label('isPublic', 'Publikasi Artikel?') !!}
        {!! Form::select('isPublic', $isPublicSelect, null,['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-sm-10">
        {!! Form::label('description', 'Deskripsi Program') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-6 col-sm-2">
        <a href="{{URL::previous()}}" class="btn btn-primary" style="width:100%">Kembali</a>
    </div>
    <div class="form-group col-xs-6 col-sm-2">
        <button type="submit" class="btn btn-success" style="width:100%">Simpan</button>
    </div>
</div>