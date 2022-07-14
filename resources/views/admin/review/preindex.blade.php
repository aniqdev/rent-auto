@extends('admin.layouts.app')

@section('content')

<div class="container">

        <div class="review-wrapp pt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="title text-center">
                        <h3>Review Servis CZ</h3>
                    </div>
                    <div class="review-block">
                        <div class="review-block-head">
                            <div class="review-name">
                                {{$review->name}}
                            </div>
                            <div class="review-date">
                                {{$review->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                        <div class="review-text">
                            {{$review->recense_service}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title text-center">
                        <h3>Review Caravan CZ</h3>
                    </div>
                    <div class="review-block">
                        <div class="review-block-head">
                            <div class="review-name">
                                {{$review->name}}
                            </div>
                            <div class="review-date">
                                {{$review->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                        <div class="review-text">
                            {{$review->recense_caravan}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="title text-center">
                        <h3>Review Servis Tenerife</h3>
                    </div>
                    <div class="review-block">
                        @if ($review->reservation->caravan->tenerife == 1)
                        <div class="review-block-head">
                            <div class="review-name">
                                {{$review->name}}
                            </div>
                            <div class="review-date">
                                {{$review->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                        <div class="review-text">
                            {{$review->recense_caravan}}
                        </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title text-center">
                        <h3>Review Caravan Tenerefie</h3>
                    </div>
                    <div class="review-block">
                        <div class="review-block-head">
                            <div class="review-name">
                                {{$review->name}}
                            </div>
                            <div class="review-date">
                                {{$review->created_at->format('Y-m-d')}}
                            </div>
                        </div>
                        <div class="review-text">
                            {{$review->recense_caravan}}
                        </div>
                    </div>
                </div>
            </div>











            {{-- @foreach ($reviews as $review)
            @if ($review->public == 1 )
            <a href="{{ route('admin.reviewShow', $review) }}"
            class="row review-block m-5 p-5 align-items-center public-bg " >
            {{ $review->reservation->caravan->tenerife == 1 ? 'text-danger' : '' }}
                <div class="col-2">
                    {{$review->name}}
                </div>
                <div class="col-4 elipsis" title="{{$review->recense_caravan}}">
                    {{$review->recense_caravan}}
                </div>
                <div class="col-4 elipsis" title="{{$review->recense_service}}">
                    {{$review->recense_service}}
                </div>
                <div class="col-2 text-right">
                    {{$review->created_at}}
                </div>
            </a>
            @else
            <a href="{{ route('admin.reviewShow', $review) }}" class="row review-block m-5 p-5 align-items-center">
                <div class="col-2">
                    {{$review->name}}
                </div>
                <div class="col-4 elipsis" title="{{$review->recense_caravan}}">
                    {{$review->recense_caravan}}
                </div>
                <div class="col-4 elipsis" title="{{$review->recense_service}}">
                    {{$review->recense_service}}
                </div>
                <div class="col-2 text-right">
                    {{$review->created_at->format('Y-m-d')}}
                </div>
            </a>
            @endif
            @endforeach --}}
        </div>
    {{-- </div> --}}
</div>


@endsection
