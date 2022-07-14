@extends('admin.layouts.app')

@section('content')
{{-- $reservation->id
<div class="col-md-12">
    <form  action="#" method="POST" class="form-group col-md-12" >
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <label class="font-weight-bold" for="note">Interní poznámka:</label>
        <input class="form-control" name="note" id="note" cols="30" rows="10" value="{{ $notes->note }}" type="text">
        <button type="submit" class="btn btn-success mt-5">Přidat poznámku</button>
    </form>
</div> --}}


<form class="form-group col-md-12" action="{{ route('notes.update'), $note->note }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label class="font-weight-bold" for="note">Interní poznámka:</label>
    <input class="form-control" name="note" id="note" cols="30" rows="10" value="{{ $notes->note }}" type="text">
    <button type="submit" class="btn btn-success mt-5">Přidat poznámku</button>
</form>

@endsection
