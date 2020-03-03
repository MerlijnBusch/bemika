<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Rules\AppLocaleLanguage;
use App\Rules\ColorCode;
use App\Rules\Gender;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PatientController extends Controller
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
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request)
    {

        $patient = Patient::where('user_id', Auth::id())->orderBy('name', 'ASC')->get();
        return response()->json($patient);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('partials.Patient.form', ['type' => 'Create']);
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
            'name' => ['required','max:255'],
            'lang' => [new AppLocaleLanguage],
            'gender' => [new Gender],
            'birthday' => ['date'],
            'color_code' => [new ColorCode, 'required'],
        ]);

        $patient = new Patient;

        $patient->name = $validated['name'];
        $patient->lang = $validated['lang'];
        $patient->gender = $validated['gender'];
        $patient->birthday = $validated['birthday'];
        $patient->color_code = $validated['color_code'];
        $patient->user_id = Auth::id();

        $patient->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return Response
     */
    public function show(Patient $patient)
    {
        //http://127.0.0.1:8000/patient/show/some Patient name 0 route toward here
        dd($patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('partials.Patient.form', ['patient' => $patient, 'type' => 'Edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required','max:255'],
            'lang' => [new AppLocaleLanguage],
            'gender' => [new Gender],
            'birthday' => ['date'],
            'color_code' => [new ColorCode, 'required'],
        ]);

        $patient = Patient::find($id);

        $patient->name = $validated['name'];
        $patient->lang = $validated['lang'];
        $patient->gender = $validated['gender'];
        $patient->birthday = $validated['birthday'];
        $patient->color_code = $validated['color_code'];

        $patient->update();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param patient $patient
     * @return Response
     */
    public function destroy(patient $patient)
    {
        //
    }
}
