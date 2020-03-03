<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified', 'isUserActive']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('partials.Activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','max:255'],
            'description' => ['required','min:25'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $activity = new Activity;

        $activity->title = $validated['title'];
        $activity->description = $validated['description'];
        $activity->image = $imageName;

        $activity->save();

        return redirect()->route('dashboard');
        //@todo add notification towards an email service because new activity is created
    }

    /**
     * Display the specified resource.
     *
     * @param activity $activity
     * @return void
     */
    public function show(activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param activity $activity
     * @return void
     */
    public function edit(activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param activity $activity
     * @return void
     */
    public function update(Request $request, activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param activity $activity
     * @return void
     */
    public function destroy(activity $activity)
    {
        //
    }
}
