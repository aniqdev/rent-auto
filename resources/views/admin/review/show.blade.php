@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="review-show-wrapp m-5 p-5 text-center">
        <a href="{{ route('admin.review') }}" class="review-back d-block text-left">
            <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "></path></g></svg></span>
            Zpět
        </a>
        <div class="row justify-content-around mb-5 pb-5 pt-5">
            <div class="col-2">
                <h3>Zakaznik :</h3>
            </div>
            <div class="col-3">
                <h3>{{$review->name}}</h3>
            </div>
            <div class="col-2">
                <h3>Nazev auta :</h3>
            </div>
            <div class="col-3">
                <h3>
                    {{$review->caravan->name}}
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="review-caravan-text col-6">
                <h3>Recenze na caravan</h3>
                <span class="text-start review-text-admin">
                    {{$review->recense_caravan}}
                </span>
                <div class="small-ratings mt-5">
                    <?php for($i = 1; $i <=5; $i++): ?>
                    <i class="fa fa-star {{ $review->rating_caravan >= $i  ? 'rating-color' : '' }}"></i>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="review-service-text col-6">
                <h3>Recenze na servis</h3>
                <span class="review-text-admin">
                    {{$review->recense_service}}
                </span>
                <div class="small-ratings mt-5">
                    <?php for($i = 1; $i <=5; $i++): ?>
                    <i class="fa fa-star {{ $review->rating_service >= $i  ? 'rating-color' : '' }}"></i>
                    <?php endfor; ?>
                </div>
            </div>
        </div>


        <div class="separator separator-dashed my-10"></div>

        <div class="row align-items-center p-5">
            <div class="col-4">
                <div class="form-check">
                    <form action="{{route('admin.reviewUpdateCaravan', $review)}}" method="POST">
                        @csrf
                        @if($review->public_caravan)
                            <button type="submit" name="public_caravan" class="btn btn-warning">
                                Odebrat
                            </button>
                        @else
                            <button type="submit" name="public_caravan" class="btn btn-primary">
                                Publikovat caravan
                            </button>
                        @endif
                    </form>
                </div>

            </div>
            <div class="col-4">
                <form action="{{ route('admin.reviewDelete', $review) }}" method="POST"
                onsubmit="if(!confirm('Vymazat?')) return false">
                @csrf
                @method('DELETE')
                <button class="btn text-danger"><i class="bi bi-trash text-danger"></i> Vymazat </button>
                </form>
            </div>
            <div class="col-4">
                <div class="form-check">
                    <form action="{{route('admin.reviewUpdateServis', $review)}}" method="POST">
                        @csrf
                        @if($review->public)
                            <button type="submit" name="public" class="btn btn-warning">
                            Odebrat
                            </button>
                        @else
                            <button type="submit" name="public" class="btn btn-primary">
                            Publikovat servis
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



{{-- asa --}}
@endsection
