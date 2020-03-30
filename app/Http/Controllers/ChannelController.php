<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\channels\UpdateChannelRequest;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
   public function  __construct()
   {
       $this->middleware('auth')->only('update');
   }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channels.show',compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        /*if ($request->hasFile('image')) {
            $channel->clearMediaCollection('images');

            $channel->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }*/


        if($request->hasFile('image')){
            $channel->clearMediaCollection('images');

            $channel->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }
        $channel->update([
           'name'=>$request->name,
           'description'=>$request->description
        ]);
        return redirect()->back();
       /* return redirect()->route('channels.index')
            ->with('message','information updated successfully');*/
       // dd($channel->media());
    }


    public function destroy($id)
    {
        //
    }
}
