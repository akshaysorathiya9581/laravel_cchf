<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationCatalogController extends Controller
{
    /**
     * Display a donation catalog page
    */
    public function index()
    {
        return view (
            'frontend.templates.masbia-template.donation-catalog'
        );
    }
}
