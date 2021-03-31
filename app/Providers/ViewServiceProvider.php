<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use App\Message;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //will show the number of unopened messages
        
        View::composer('inc.navbar', function ($view) {

            if (Auth::check())
            {
                //count the number of unopened messages
                $messages = Message::where('id_recipient', auth()->user()->id)->where('opened', 0)->get();

                $number_of_messages = count($messages);
                
                return $view->with('number_of_messages', $number_of_messages);
            }
            
        });
    }
}
