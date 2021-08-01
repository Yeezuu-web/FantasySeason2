<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function index()
    {
        return view('admin.candidates.index');
    }

    public function store(Request $request)
    {
        //
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
