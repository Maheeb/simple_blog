@extends('layouts.sight')

@section('content')

<div class="container">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header"><p><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></p></div>

        <div class="card-body">

            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                <h2>{{ ucfirst($type) }}</h2>

                @foreach($modelSearchResults as $searchResult)
                    <ul>
                        <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                    </ul>
                @endforeach
            @endforeach

        </div>
    </div>
    </div>
</div>
@stop