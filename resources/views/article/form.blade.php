      <div class="form-group">
        @error('name')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        @error('category')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        {{ form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categories, null, ['class'=>'form-control',]) }}
      </div>
        @error('tags')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @foreach ($tags->all() as $tag)
      <div class="form-check form-check-inline">
          {{ Form::checkbox('tags[]', $tag->id, null, ['class'=>'form-check-input']) }}
          {{ Form::label('tags', $tag->name, ['class' => 'form-check-label)']) }}
      </div>
        @endforeach
      <div class="form-group">
        @error('body')
          <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        {{ Form::label('body', 'Текст') }}
        {{ Form::textarea('body', null, ['class'=>'form-control',]) }}
      </div>
