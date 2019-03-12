@extends('layouts.bcd.index')

@section('title', 'MyBlog | All Post')

@section('content')

        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class="pull-left">
                                <a href="{{ route('bd.create') }}" class="btn btn-success">Add New</a>
                            </div>
                        </div>
                        <div class="pull-right" style="padding:7px 0;">
                            <?php $links = [] ?>
                            @foreach($statusList as $key => $value)
                                @if($value)
                                    <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                    <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                                @endif
                            @endforeach
                            {!! implode(' | ', $links) !!}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @include('bd.mt.message')
                            @if (! $posts->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                            @else
                                @if($onlyTrashed)
                                    @include('bd.mt.table-trash')
                                @else
                                    @include('bd.mt.table')
                                @endif
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{ $posts->links() }}
                            </div>
                            <div style="margin-top: 25px" class="pull-right">
                                <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>


@stop
