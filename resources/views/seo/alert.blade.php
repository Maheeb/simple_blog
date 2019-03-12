
@if ($term = request('term'))
    <div class="alert alert-info">
        <p>Search Results for: <strong>{{ $term }}</strong></p>
    </div>
@endif
