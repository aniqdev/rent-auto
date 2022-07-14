<?php

namespace App\Http\Controllers;

use App\Models\{Notes, Reservation, User, Status};
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'reservation_id' => 'required',
			'note' => 'required|string|max:1000',
		];

        $data = $request->validate($rules);

        $data['user_id'] = auth()->user()->id;

        $note = Notes::create($data);



        return redirect()
            ->route('admin.rezervace.show', $data['reservation_id']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $notes = Notes::all();
        // $users = User::all();

        // return view('admin.blocks.notes-block', [
        //     'users' => $users,
        //     'notes' => $notes,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        // return view('admin.notes.edit', [
        //     'notes' => $notes,
        //     'note' => $notes->note,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {

        if ($note->user_id != auth()->user()->id) {
            redirect()->back()->withErrors('Nemáte oprávnění upravovat tento příspěvek');

        }else{
            $rules = [
                'note' => 'required|string|max:1000',
            ];

            $messages = [
                'note.required' => 'Fill note text',
            ];


            $data = $request->validate($rules, $messages);

            $saved = $note->update($data);
            flash('Poznámka byla úspěšně upravena')->success();
        }



        return redirect()->route('admin.rezervace.show', $note->reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        // dd($note);
        // $title = $notes->note;
        if ($note->user_id != auth()->user()->id) {
            redirect()->back()->withErrors('Nemáte právo tento příspěvek smazat');
        }else{
            $note->delete();
            flash('Poznámka byla úspěšně smazána ')->success();
        }



        return redirect()->route('admin.rezervace.show', $note->reservation->id);
    }
}
