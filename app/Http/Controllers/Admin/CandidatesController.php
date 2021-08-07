<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyCandidateRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Yajra\DataTables\Facades\DataTables;

class CandidatesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('candidate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::with(['media'])->get();
        if ($request->ajax()) {
            $query = Candidate::with(['media'])->select('candidates.*');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'candidate_show';
                $editGate = 'candidate_edit';
                $deleteGate = 'candidate_delete';
                $crudRoutePart = 'candidates';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('manager_name', function ($row) {
                return $row->manager_name ? $row->manager_name : '';
            });
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('team_name', function ($row) {
                return $row->team_name ? $row->team_name : '';
            });
            $table->editColumn('fan_club', function ($row) {
                return $row->fan_club ? $row->fan_club : '';
                // $labels = [];
                // foreach ($row->users as $user) {
                //     $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $user->name);
                // }

                // return implode(' ', $labels);
            });
            $table->editColumn('link_by', function ($row) {
                return $row->link_by ? $row->link_by : '';
            });
            $table->editColumn('dob', function ($row) {
                return $row->dob ? $row->dob : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? $row->gender : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('apply_date', function ($row) {
                return $row->created_at ? $row->created_at : '';
            });
            $table->editColumn('bank', function ($row) {
                return $row->bank ? $row->bank : '';
            });
            $table->editColumn('account_no', function ($row) {
                return $row->account_no ? $row->account_no : '';
            });
            $table->editColumn('transaction', function ($row) {
                if ($photo = $row->transaction){
                    return '<img id="imgg_'.$row->id.'" calss="imgg" src="'.$photo->url.'" width="50px" height="50px" style="display: inline-block;" onclick="showimg(this)" alt="'.$row->manager_name.'" />';
                    // return sprintf('<img id="imgg.%s" calss="imgg" src="%s" width="50px" height="50px" style="display: inline-block;" onclick="showimg(%s, '%s.')">', $row->id, $photo->url, $row->id, $row->manager_name);
                }
                return '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'transaction']);

            return $table->make(true);
        }

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
        abort_if(Gate::denies('candidate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCandidateRequest $request)
    {
        Candidate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
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
            'tottenham' => 'Tottenham Hotspur',
            'liverpool' => 'Liverpool',
            'arsenal' => 'Arsenal',
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
