@extends('layouts.bcd.index')

@section('title', 'MyBlog | Add new post')

@section('content')
    <section class="content">
        <div class="row">
            {!! Form::open([
                'method' => 'POST',
                'route'  => 'bd.store',
                'files'  => TRUE,
                'id' => 'post-form'
            ]) !!}


            @include('bd.mt.form')


            {!! Form::close() !!}
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
    @stop

@include('bd.mt.script')
