<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;


class InertiaController extends Controller
{
    public function index()
    {
        Log::info('InertiaController index called');
        return Inertia::render('HomePage');
    }
}
