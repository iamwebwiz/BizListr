<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('businesses')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories,name'
        ]);

        Category::create($request->except('_token'));

        return Redirect::back();
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return Redirect::back();
    }
}
