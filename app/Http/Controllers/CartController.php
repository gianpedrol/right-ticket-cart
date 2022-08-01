<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Event;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $events = Event::from('yb_tkt_event as event')
            ->select('event.EventID', 'event.EventName', 'event.StartDate', 'event.EndDate', 'ticket.Price', 'ticket.ThumbImage')
            ->leftJoin('yb_tkt_ticket as ticket', 'event.EventID',  '=',  'ticket.TicketID')
            ->get();

        foreach ($events as $data) {
            $data['ticketType'] = DB::table('yb_tkt_ticket as ticket')->select('ticket.TicketName')->where('ticket.TicketID', $data->EventID)->get();
        }

        return view('cart.index', compact('events'));
    }

    public function addCart(Request $request)
    {

        $event = Event::where('EventID', $request->id)->first();

        $cart = session()->get('cart', []);

        $cart[$event->EventID] = [
            "id" => $event->EventID,
            "name" => $event->EventName,
        ];


        session()->put('cart', $cart);
        return response()->json(['message' => 'Thank you!', $cart], 200);
    }

    public function checkoutCart()
    {
        //session()->pull('cart', []);
        $session = session()->has('cart');
        // dd(session());
        if (!empty($session)) {
            $items = session()->get('cart');
            // dd($items);
            return view('cart.cart', compact('items'));
        } else {
            $items = null;
            return view('cart.cart', compact('items'));
        }
    }

    public function updateCart($id, Request $request)
    {

        $items = session()->get('cart');

        $request->session()->forget('cart', [$id]);

        if (!empty($session)) {
            $items = session()->get('cart');
            //dd($items);
            return view('cart.cart', compact('items'));
        } else {
            $items = null;
            return view('cart.cart', compact('items'));
        }
    }

    public function showEvent($id)
    {
        $event = Event::from('yb_tkt_event as event')
            ->select('event.EventID', 'event.EventName', 'event.Description', 'event.Disclaimer', 'event.StartDate', 'event.EndDate', 'ticket.Price', 'ticket.ThumbImage', 'event.StoreID', 'event.CategoryID')
            ->leftJoin('yb_tkt_ticket as ticket', 'event.EventID',  '=',  'ticket.TicketID')
            ->where('event.EventID', '=', $id)
            ->get();


        foreach ($event as $data) {
            $data['ticketType'] = DB::table('yb_tkt_ticket as ticket')->where('ticket.StoreID', $data->StoreID)->get();
        }

        return view('cart.cart', compact('event'));
    }
}
