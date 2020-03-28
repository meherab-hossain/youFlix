<?php

namespace App\Listeners\Users;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserChannel
{

   /* public function __construct()
    {
        //
    }*/


    public function handle($event)
    {
        /*$event->user->channel()->create([
            'name'=> $event->user->name
        ]);*/
        $event->user->channel()->create([
            'name' => $event->user->name
        ]);
    }
}
