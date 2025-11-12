<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $guests = $request->input('guests', 1);

        $availableRooms = [];
        
        if ($checkIn && $checkOut) {
            $availableRooms = Room::whereDoesntHave('bookings', function($query) use ($checkIn, $checkOut) {
                $query->where('check_out', '>', $checkIn)
                    ->where('check_in', '<', $checkOut);
            })->where('is_available', true)
            ->where('capacity', '>=', $guests)
            ->get();
        }

        return view('bookings.create', compact('availableRooms', 'checkIn', 'checkOut', 'guests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'integer|min:0',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        $room = Room::findOrFail($validated['room_id']);
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $nights = $checkIn->diffInDays($checkOut);
        $totalPrice = $nights * $room->price_per_night;

        $booking = new Booking([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'special_requests' => $validated['special_requests'] ?? null,
        ]);

        $booking->save();

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully!');
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return view('bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        $this->authorize('update', $booking);
        
        if ($booking->status === 'pending' || $booking->status === 'confirmed') {
            $booking->update(['status' => 'cancelled']);
            return back()->with('success', 'Booking has been cancelled.');
        }

        return back()->with('error', 'Cannot cancel this booking.');
    }
}
