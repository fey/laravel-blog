      <div class="form-group">
        @error('name')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        @error('body')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        {{ Form::label('body', 'Текст') }}
        {{ Form::textarea('body',null,['class'=>'form-control',]) }}
      </div>
