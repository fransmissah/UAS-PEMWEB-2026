<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * GET /api/bookings
     * Optional: ambil semua data booking
     */
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Booking::orderByDesc('id')->get(),
        ]);
    }

    /**
     * POST /api/bookings
     * Simpan data booking dari form Feane
     */
    public function store(Request $request)
    {
        // validasi input
        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'phone'        => 'required|string|max:30',
            'email'        => 'required|email|max:100',
            'persons'      => 'required|integer|min:1|max:20',
            'booking_date' => 'required|date',
        ]);

        // simpan ke database
        $booking = Booking::create($validated);

        // response sukses
        return response()->json([
            'status'  => 'ok',
            'message' => 'Booking berhasil disimpan',
            'data'    => $booking,
        ], 201);
    }
}