<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingFormRequest;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(10));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }


    // Show single listing
    public function show($id)
    {
        return view('listings.show', [
            'listing' => Listing::findOrFail($id)
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // Save create form
    public function store(ListingFormRequest $request)
    {
        $request->validated();
        // dd(auth()->id());
        Listing::create([
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'website' => $request->website,
            'logo' => $this->imageUpload($request),
            'email' => $request->email,
            'tags' => $request->tags,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        // if ($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }        

        return redirect('/')->with('message', 'Listing successfully created');
    }

    // Show Edit Form
    public function edit($id)
    {
        return view('listings.edit', [
            'listing' => Listing::where('id', $id)->first()
        ]);
    }

    public function update(ListingFormRequest $request, $id)
    {
        // Make sure logged in user is owner of the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $request->validated();

        Listing::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return back()->with('message', 'Listing successfully updated');
    }

    public function manage()
    {
        return view('user.listings', ['listings' => auth()->user()->listings()->get()]);
    }

    public function destroy($id)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        Listing::destroy($id);
        return redirect('/')->with('message', 'Listing successfully deleted');
    }

    private function imageUpload($request)
    {
        $newImageFile = uniqid() . '-' . $request->title . '-' . $request->logo->extension();

        return $request->logo->move(public_path('images'), $newImageFile);
    }
}
