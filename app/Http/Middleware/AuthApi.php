<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil API key dari header (pilih salah satu)
        $key = $request->header('X-API-KEY'); // contoh: X-API-KEY: rahasia123
        // atau kalau kamu mau pakai Authorization: Bearer xxx
        // $key = $request->bearerToken();

        // Ambil key yang benar dari .env
        $expected = env('API_KEY');

        // Kalau belum diset di .env, anggap salah (biar ga kebuka)
        if (!$expected) {
            return response()->json([
                'status' => 'error',
                'message' => 'API_KEY belum diset di .env',
            ], 500);
        }

        // Validasi
        if ($key !== $expected) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }
}