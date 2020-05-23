<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use Illuminate\Http\Request;

class BusinessListingController extends Controller
{
    public function index()
    {
        $listings = Business::all();
        $categories = Category::all();

        return view('admin.listings.index', compact('listings', 'categories'));
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
