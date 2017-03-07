@extends('layouts.app')

@section('content')
<div class="as">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$text->name}}</div>

                <div class="panel-body">
				{!!$text->body!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
