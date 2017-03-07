@extends("layouts.app")



@section("content")

<div class="as">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Добро пожаловать на сайт!</div>

                <div class="panel-body">
                   @foreach($all as $one)
<div class = "products">
<h2> {{$one->name}}</h2>
</div>

@if($one->picture)
<img src = "{{asset('uploads/thumb/'.$one->picture)}}" />
@else
	<img src = "{{asset('no_photo.png')}}"/>
@endif
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection