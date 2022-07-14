@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="col-12">
        Foto
        <img src="{{asset($gallery->url)}}" alt="">
    </div>

</div>



@endsection
