<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;

use App\Http\Requests;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);

        parent::__construct();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FlyerRequest|Request $request
     * @return Response
     */
    public function store(FlyerRequest $request)
    {
        $flyer = $this->user->publish(
            new Flyer($request->all())
        );

        flash()->success('Success!', 'Your flyer has been created!');

        return redirect(flyer_path($flyer));

    }
    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $street
     * @return Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
