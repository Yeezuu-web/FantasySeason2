<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;

class CandidatesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $candidates = Candidate::all();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function register()
    {
        return view('frontend.register');
    }
    public function registering(StoreCandidateRequest $request)
    {
        $cnadidate = Candidate::create($request->all());

        return response()->json($cnadidate);
    }

    public function show(Candidate $candidate)
    {
        //
    }

    public function edit(Candidate $candidate)
    {
        //
    }

    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    public function destroy(Candidate $candidate)
    {
        //
    }
}
