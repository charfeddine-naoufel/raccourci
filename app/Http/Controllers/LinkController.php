<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
// use Stevebauman\Location\Location;


use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->get();

        return view('home', compact('links'));
    }
    public function welcome()
    {
        $links = Link::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('links'));
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
        $request->validate([
            'url' => 'required|unique:links',
        ]);
        $userid = Auth::user()->id;
        $request['user_id'] = $userid;
        $request['url_shorted'] = 'goo.le/' . Str::random(6);
        $user_links_count = Link::where('user_id', $userid)->count();
        $total_links_count = Link::all()->count();
        $status = "error";
        $message = 'you have reached your limit.';
        if ($user_links_count < 5) {
            if ($total_links_count == 20) {
                $link = Link::oldest()->first();
                $link->delete();
            }
            Link::create($request->all());
            $status = "success";
            $message = 'Link has been created successfully.';
        }
        $links = Link::orderBy('created_at', 'desc')->get();

        return redirect()->route('home')->with(['links' => $links])
            ->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function createlog(Link $link)
    { 
        $acces_time = Carbon::now();
        $visited_link = $link->url;
        if (Auth::check())
        {
            $user_id = Auth::user()->id;
        }else{
            $user_id = 'guest';
        }
        $client_ip = request()->ip();
        //  $location = \Location::get($client_ip);

        //  $country = $location->countryName;
         $navigator = request()->header('User-Agent');
        
         Log::info( ["acces_time" => $acces_time,"visited_link" => $visited_link,"$user_id" => $user_id,"client_ip" => $client_ip,"navigator" => $navigator]);
         
         return redirect($link->url)->send();
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        
        $link->delete();
        $links = Link::orderBy('created_at', 'desc')->get();

        return redirect()->route('home')->with(['links' => $links])
            ->with('success', 'Link has been deleted successfully');
    }
}
