@extends('app')

@section('content')
    <div class="home_title" style="margin-top:-10px;">
        <span></span>
        <h2>{{$page->name}}</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!!$page->content!!}
            </div>
        </div>
    </div>
@endsection

