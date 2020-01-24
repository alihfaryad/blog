@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <input type="text" id="query" placeholder="Search" />
                <button class="btn btn-default" onclick="search()">Search</button>
                <ul class="list-group" id="result"></ul>
            </div>
        </div>
    </div>
</div>
<script>
function search(){
    var query = document.getElementById('query').value;
    $.ajax({
        url: "{{ route('search.results') }}",
        method: 'GET',
        data: {query:query},
        dataType: 'JSON',
        success:function(data){
            var html = '';
            for(a = 0; a < data.length; a++){
                html += '<li class="list-group-item"><a href="/'+data[a].URI+'">'+data[a].title+'</a>';
            }
            $('#result').html(html);
        }
    })
}
</script>
@endsection
