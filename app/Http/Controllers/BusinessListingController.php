<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessImage;
use App\BusinessPhone;
use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BusinessListingController extends Controller
{
    /**
     * View all business listings.
     *
     * @return Application|Factory|JsonResponse|View
     */
    public function index()
    {
        $listings = Business::with(['phones', 'images', 'categories'])->get();
        $categories = Category::all();

        if (request()->expectsJson()) {
            return Response::json($listings, 200);
        }

        return view('admin.listings.index', compact('listings', 'categories'));
    }

    /**
     * Store a new business listing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function store(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|unique:businesses,name',
            'phones' => 'required',
            'email' => 'required|string|email',
            'address' => 'required',
            'categories' => 'required',
            'website_url' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);

        $phones = explode(',', $request->phones);

        try {
            $business = Business::create($request->except(['_token', 'categories', 'phones', 'images']));

            $business->categories()->attach($request->categories);

            collect($phones)->each(static function ($phone) use ($business) {
                $phoneRecord = new BusinessPhone(['phone' => $phone]);
                $business->phones()->save($phoneRecord);
            });

            foreach ($request->file('images') as $image) {
                $filePath = $image->store('businesses/' . Str::snake($business->name), 'public');

                BusinessImage::create([
                    'file_path' => $filePath,
                    'business_id' => $business->id,
                ]);
            }

            return Redirect::back();
        } catch (\Exception $exception) {
            Log::error("An error occured while creating business listing: {$exception->getTraceAsString()}");

            return Redirect::back();
        }
    }

    /**
     * Show a single business listing.
     *
     * @param Business $business
     * @return Application|Factory|View
     */
    public function show(Business $business)
    {
        return view('admin.listings.show', [
            'listing' => $business
        ]);
    }

    /**
     * Update a business listing.
     *
     * @param Request $request
     * @param Business $business
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function update(Request $request, Business $business): ?\Illuminate\Http\RedirectResponse
    {
        try {
            $business->update($request->except('_token'));

            return Redirect::route('admin.listings.index');
        } catch (\Exception $exception) {
            Log::error("Unable to update listing: {$exception->getTraceAsString()}");

            return Redirect::back();
        }
    }

    /**
     * Deactivate a listing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $listing = Business::find($request->listingId);

        $listing->delete();

        return Redirect::back();
    }

    /**
     * Delete a listing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        $listing = Business::find($request->listingId);

        $listing->forceDelete();

        return Redirect::back();
    }
}
