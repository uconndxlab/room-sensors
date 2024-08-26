<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ping;

class PingController extends Controller
{
    public function index()
    {
        $total_pings = Ping::count();
        $pings = Ping::latest()->paginate(100);
        return view('index', compact('total_pings', 'pings'));
    }


    public function api_ping(Request $request)
    {
        if ( !$request->has('api_key') || $request->api_key != env('PING_API_KEY') ) {
            return response()->json(['status' => 'error', 'message' => 'Invalid API key']);
        }

        if ( !$request->has('room') && !$request->has('Room') ) {
            return response()->json(['status' => 'error', 'message' => 'Room is required']);
        }
        $ping = new Ping();
        $ping->room = $request->Room ?? $request->room;
        $ping->motion = $request->Motion ?? $request->motion;
        $ping->alive = $request->Alive ?? $request->alive;
        $ping->humid = $request->Humid ?? $request->humid;
        $ping->temp = $request->Temp ?? $request->temp;
        $ping->error = $request->input('Error') ?? $request->input('error');
        $ping->save();
        return response()->json(['status' => 'success', 'message' => 'Ping added successfully']);
    }
}
