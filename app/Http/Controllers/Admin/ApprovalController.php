<?php

namespace App\Http\Controllers\admin;

use Gate;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ApprovalController extends Controller
{
    use MediaUploadingTrait; 
    
    public function index()
    {
        abort_if(Gate::denies('candidate_aprove'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $candidates = Candidate::with(['media'])->get();

        return view('admin.approval.index', compact('candidates'));
    }

    public function update($id)
    {
        abort_if(Gate::denies('candidate_aprove'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($id){
            
            $candidate = Candidate::findOrFail($id);
            
            $candidate->update(['status' => '1']);

        }else{
            return false;
        }

        return response()->json($candidate);
    }

    public function reject($id)
    {
        abort_if(Gate::denies('candidate_aprove'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($id){
            
            $candidate = Candidate::findOrFail($id);
            
            $candidate->update(['status' => '2']);

        }else{
            return false;
        }

        return response()->json($candidate);
    }
}
