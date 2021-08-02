<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CandidatesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::with(['media'])->get();

        return view('admin.candidates.index', compact('candidates'));
    }

    public function register()
    {
        return view('frontend.register');
    }
    public function registering(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->all());

        if ($request->input('transaction', false)) {
            $candidate->addMedia(storage_path('tmp/uploads/' . basename($request->input('transaction'))))->toMediaCollection('transaction');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $candidate->id]);
        }

        return response()->json($candidate);
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

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('candidate_create') && Gate::denies('candidate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Candidate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function registerFan($club)
    {
        
        $data = [
            'mancity' => 'Man City',
            'chelsea' => 'Chelsea',
            'manunited' => 'Man United',
            'arsenal' => 'Arsenal',
            'liverpool' => 'Liverpool'
        ];

        $fanClub = '';

        if(array_key_exists($club, $data)){
            foreach($data as $key => $d){
                if($club == $key){
                    $fanClub = $d;
                }
            }
        }else{
            return redirect()->route('candidate');
        }

        return view('frontend.register-fan', compact('fanClub', 'club'));
    }
}
