<div class="form-group">
    @error('name')
    <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    @error('slug')
    <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
