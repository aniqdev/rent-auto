@extends('admin.layouts.app')

@section('content')

<div class="container">

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Zákazník</th>
                    <th>Recenze caravan</th>
                    <th>Rating caravan</th>
                    <th>Recenze firma</th>
                    <th>Rating firma</th>
                    <th>Pujčovna</th>
                    <th>Vytvořena</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)

                <tr class="bg-white">

                    @if ($review->public == 1 || $review->public_caravan == 1 )

                    <td class="align-middle public-bg">
                        <a href="{{ route('admin.reviewShow', $review) }}">
                        {{$review->reservation_id}}
                        </a>
                    </td>
                    <td class="align-middle public-bg">
                        {{$review->name}}
                    </td>
                    <td class="align-middle public-bg" title="{{$review->recense_caravan}}">
                        {{$review->recense_caravan}}
                    </td>
                    <td class="align-middle public-bg text-center" title="{{$review->rating_caravan}}">
                        {{$review->rating_caravan}}
                    </td>
                    <td class="align-middle public-bg" title="{{$review->recense_service}}">
                        {{$review->recense_service}}
                    </td>
                    <td class="align-middle  public-bg text-center" title="{{$review->rating_service}}">
                        {{$review->rating_service}}
                    </td>
                    @if ($review->reservation->caravan->tenerife === 1)
                    <td class="align-middle public-bg" title="Tenerife">
                        Tenerife
                    </td>
                    @else
                    <td class="align-middle public-bg" title="Praha">
                        Praha
                    </td>
                    @endif
                    <td class="align-middle public-bg">
                        {{$review->created_at}}
                    </td>
                    @else
                    <td class="align-middle">
                        <a href="{{ route('admin.reviewShow', $review) }}">
                        {{$review->reservation_id}}
                        </a>
                    </td>
                    <td class="align-middle">
                        {{$review->name}}
                    </td>
                    <td class="align-middle" title="{{$review->recense_caravan}}">
                        {{$review->recense_caravan}}
                    </td>
                    <td class="align-middle text-center" title="{{$review->rating_caravan}}">
                        {{$review->rating_caravan}}
                    </td>
                    <td class="align-middle" title="{{$review->recense_service}}">
                        {{$review->recense_service}}
                    </td>
                    <td class="align-middle text-center" title="{{$review->rating_service}}">
                        {{$review->rating_service}}
                    </td>
                    @if ($review->reservation->caravan->tenerife === 1)
                    <td class="align-middle" title="Tenerife">
                        Tenerife
                    </td>
                    @else
                    <td class="align-middle" title="Praha">
                        Praha
                    </td>
                    @endif
                    <td class="align-middle">
                        {{$review->created_at}}
                    </td>
                    @endif
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
