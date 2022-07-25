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

        if (empty($request['quantity'])) {
            $quantidade = 1;
        } else {
            $quantidade = (int)$request['quantity'];
        }

        $event = Calendar::where('CalendarID', $request->id)->first();

        if (Session('cart.' .  $request->id)) {

            Session(
                [
                    'id' =>  $request->id,
                    'quantidade' => $quantidade,
                    'name' => $event->EventName,
                    'valor' => 20
                ],
            );
            $cart = session()->get('cart');
            return response()->json(['message' => 'Thank you!', $cart], 200);
        } else {
            // dd($event);
            Session([
                'cart.' .  $request->id =>
                [
                    'id' =>  $request->id,
                    'quantidade' => $quantidade,
                    'name' => $event->EventName,
                    'valor' => 20
                ]
            ]);
            Session(['cart.' .  $request->id . '.quantidade' => 1, 'valor' => (float)20.00]);
        }
        $cart = session()->get('cart');
        return response()->json(['message' => 'Thank you!', $cart], 200);
    }

    public function checkoutCart()
    {
        //session()->pull('cart', []);
        $session = session()->has('cart');
       // dd(session());
        if (!empty($session)) {
            $items = session()->get('cart');
            //dd($items);
            return view('cart.cart', compact('items'));
        } else {
            $items = null;
            return view('cart.cart', compact('items'));
        }
    }

    public function updateCart($id){

        $request->session()->forget($id);

        return response()->json('ok');
    }
}
