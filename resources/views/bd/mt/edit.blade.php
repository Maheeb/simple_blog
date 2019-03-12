@extends('layouts.bcd.index')

@section('title', 'MyBlog | Edit Post')

@section('content')


      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($post, [
                  'method' => 'PATCH',
                  'route'  => ['bd.update', $post->id],
                  'files'  => TRUE,
                  'id' => 'post-form'
              ]) !!}

              @include('bd.mt.form')

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->


@endsection

@include('bd.mt.script')
