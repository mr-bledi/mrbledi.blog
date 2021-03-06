@extends('main')
@section('title', 'Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
  <div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

      {{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top']) }}
      {{ Form::text('slug', null, ["class" => 'form-control']) }}

      {{ Form::label('tags', 'Tags:', ["class" => 'form-spacing-top']) }}
      {{ Form::select('tags[]', $tags, null, ['class' => 'selecr2-multi form-control', 'multiple' => 'multiple']) }}


      {{ Form::label('category_id', 'Category:') }}
      {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

      {{ Form::label('featured_image', 'Uploade Featured Image:') }}
      {{ Form::file('featured_image') }}

      {{ Form::label('body', 'Body:', ["class" => 'form-spacing-top']) }}
      {{ Form::textarea('body', null, ["class" => 'form-control']) }}
    </div>

    <div class="col-md-4" style="padding: 15px;">
      <div class="panel panel-default">
        <div class="panel-body">
          <dl class="dl-horizontal">
            <dt>Created at</dt>
            <dd>{{  date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
          </dl>

          <dl class="dl-horizontal">
            <dt>Last Updated</dt>
            <dd>{{  date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
          </dl>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block' )) !!}
            </div>
            <div class="col-sm-6">
              {{ Form::submit('Update', ["class" => 'btn btn-success btn-block'])}}
            </div>
          </div>
      </div>
    </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}
  {!! Html::script('js/tinymce/tinymce.min.js') !!}
  {!! Html::script('js/tinymce/jquery.tinymce.min.js') !!}

  <script>tinymce.init({
     selector:'textarea',
      plugins: 'link code',
      menubar: false
    });
 </script>


  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
  </script>
@endsection
