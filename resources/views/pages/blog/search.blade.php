@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <input type="text" id="query" class="form-control" placeholder="Search" onkeyup="search()" autocomplete="off" />
            <div class="row" id="result" style="min-height: 50vh"></div>
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
                html += '<div class="col-sm-6 blog-card">'
                    + '<div class="blog-card-main">'
                        + '<div class="blog-card-header text-right">'
                        +  '<img src="/storage/cover_images/'+data[a].cover_image+'" class="img-fluid" />'
                        +'</div>'
                        +'<div class="blog-card-body">'
                            +'<h1 class="small-heading"><a href="/blog/'+data[a].URI+'"><span></span>'+data[a].title+'</a></h1>'
                            +'<p>'+data[a].body.split(/\s+/).slice(0,15).join(" ")+'</p>'
                        +'</div>'
                        +'<div class="blog-card-footer text-right">'
                            +'<span>'+data[a].read_time+' minutes read</span>'
                            +'<button class="btn btn-primary">Read More +</button>'
                        +'</div>'
                    +'</div>'
                +'</div>';
            }
            $('#result').html(html);
        }
    })
}
</script>
@endsection
