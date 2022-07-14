<?php

namespace App\Http\Controllers;

use App\Models\{ClientGallery, Reservation, Caravan};
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientGalleryRequest;

class ClientGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client-gallery.index');
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

        $this->validate($request, [
            'gallery' => 'required',
            'gallery.*' => 'image'
        ],[
            'gallery.required' => 'Povinné pole',
            'gallery.*.image' => 'Špantny format',
        ]);

        dump($_FILES);

        dd($request->file('gallery'));

        if($request->hasfile('gallery'))
        {
            if(count($request->file('gallery')) > 10){
                return redirect()->back()->withErrors('Maximálně 10 fotek!')->withInput($request->all());
            }
            foreach($request->file('gallery') as $key => $file)
            {
                $path = $file->store('client-gallery', 'public');
                $gallery_image = new  ClientGallery();
                $gallery_image->reservation_id = $request->get('reservation_id');
                $gallery_image->url = '/storage/'.$path;
                $gallery_image->save();


            }
        }

        // ClientGallery::create($data);



        return redirect()
            ->route('client-gallery.thanks');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientGallery  $clientGallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::withTrashed()
        ->findOrFail($id);


        $sign = hash_hmac('sha256', $id, env('HMAC_SECRET'), true);

        $sign = $this->base64url_encode($sign);

        if ($sign === request('sign')) {
            return view('client-gallery.show')
            ->with('reservation', $reservation);
        }else{
            return abort(401);
        }


        return view('client-gallery.show', [
            'reservation' => $reservation,
        ]);
    }


    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientGallery  $clientGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientGallery $clientGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientGallery  $clientGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientGallery $clientGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientGallery  $clientGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientGallery $clientGallery)
    {
        //
    }

    public function thanks()
    {
        return view('client-gallery.thanks');
    }

}
