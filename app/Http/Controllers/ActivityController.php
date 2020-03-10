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
     * @return Factory|View
     */
    public function index()
    {
        $activity = Activity::all();

        return view('partials.Activity.index', ['activities' => $activity, 'type' => 'create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('partials.Activity.form');
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
     * @param $id
     * @return void
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $activity = Activity::find($id);

        return view('partials.Activity.index', ['activities' => $activity, 'type' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required','max:255'],
            'description' => ['required','min:25'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $activity = Activity::find($id);

        $activity->title = $validated['title'];
        $activity->description = $validated['description'];
        $activity->image = $imageName;

        $activity->update();

        return redirect()->route('activity.index');
        //@todo add notification towards an email service because activity is updated

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        return redirect()->back();
    }
}
