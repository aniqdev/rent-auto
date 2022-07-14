<div class="row mb-5 pb-5">
    {{-- <div class=" mb-2 d-block"> --}}
        <div class="col-md-8">
            <span class="notes-block-span-name font-weight-bold ">{{ $note->author->name ?? 'None'}}</span>
            <span class="notes-block-span-last-name font-weight-bold px-3 ">{{ $note->author->last_name ?? 'None' }}</span>
            <span class="notes-block-span-date text-primary ">{{  $note->updated_at->format('d-m-Y') }}</span>
            <span class="notes-block-span-date text-warning ">{{  $note->updated_at->format('H:i') }}</span>
        </div>


        <div class="col-md-2">
            <button class="notes-block-update btn text-primary"  data-toggle="modal" data-target="#exampleModal_{{ $note->id }}"><i class="bi bi-pencil text-primary"></i>Upravit</button>
        </div>
        <form action="{{ route('notes.destroy', $note) }}" method="POST"
        onsubmit="if(!confirm('Vymazat?')) return false">
        @csrf
        @method('DELETE')
        <button class="btn text-danger"><i class="bi bi-trash text-danger"></i> Vymazat </button>
        </form>

    {{-- </div> --}}
    <div class="col-md-12">
        <span class="notes-block-span-text ">{{ $note->note }}</span>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal_{{ $note->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" name="note" id="" cols="30" rows="10">{{ $note->note }}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>
