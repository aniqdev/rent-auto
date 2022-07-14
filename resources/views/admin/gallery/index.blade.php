@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="galleries-wrap p-5">
        @foreach ($galleries as $gallery)
        <div class="gallary-line row p-5 align-items-center">

            <div class="col-xl-1 gallery-reserv-num p-3">
                ID:
                {{$gallery->reservation_id}}
            </div>
            <div class="col-xl-1 gallery-reserv-name p-3">
                {{$gallery->reservation->name}}
            </div>
            <div class="col-xl-4 p-3 ">
                Caravan:
                {{$gallery->reservation->caravan->name}}
            </div>
            <div class="col-xl-4 gallery-img-itm p-3">
                <img data-fancybox="gallery" class="max-h-96" src="{{asset($gallery->url)}}" />
                {{-- <img src="{{asset($gallery->url)}}" alt=""> --}}
            </div>
            @if ($gallery->public_home == null)

            @endif

            <div class="col-xl-1 p-3">
                <form action="{{route('admin.galleryUpdate', $gallery)}}" method="POST"
                        >
                    @csrf
                    @if($gallery->public_home)
                        <button type="submit" name="public_home" class="btn btn-warning"
                        onclick="change_publicity(this, event, {{ $gallery->id }})"
                        data-public="{{ $gallery->public_home }}">
                            Odebrat
                        </button>
                    @else
                        <button type="submit" name="public_home" class="btn btn-primary"
                        onclick="change_publicity(this, event, {{ $gallery->id }})"
                        data-public="{{ $gallery->public_home }}">
                            Publikovat
                        </button>
                    @endif
                </form>
            </div>
            <div class="col-xl-1 p-3">
                <form action="{{ route('admin.galleryDelete', $gallery) }}" method="POST"
                onsubmit="if(!confirm('Vymazat?')) return false">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Vymazat</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>




</div>





@endsection
