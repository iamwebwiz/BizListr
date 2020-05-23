<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class BusinessListingController extends Controller
{
    public function index()
    {
        $listings = Business::all();

        return view('admin.listings.index', compact('listings'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function deactivate(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}
