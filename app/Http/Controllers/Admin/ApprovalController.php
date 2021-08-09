<?php

namespace App\Http\Controllers\admin;

use Gate;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Yajra\DataTables\Facades\DataTables;

class ApprovalController extends Controller
{
    use MediaUploadingTrait; 
    
    public function index(Request $request)
    {
        abort_if(Gate::denies('candidate_approve'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $candidates = Candidate::with(['media'])->get();

        if ($request->ajax()) {
            $query = Candidate::with(['media'])->select('candidates.*');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->addColumn('approve', '&nbsp;');

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
            });
            $table->editColumn('linkny', function ($row) {
                return $row->linkby ? $row->linkby : '';
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
                }
                return '';
            });
            $table->editColumn('status', function ($row) {
                if($row->status == 0){ 
                    return sprintf('<span class="badge badge-info">%s</span>', 'Pendding');
                }
                if($row->status == 1){ 
                    return sprintf('<span class="badge badge-success">%s</span>', 'Approved');
                }
                if($row->status == 2){ 
                    return sprintf('<span class="badge badge-danger">%s</span>', 'Rejected');
                }
            });
            $table->editColumn('approve', function ($row) {
                $viewGate = 'candidate_approve';
                return view('partials.datatablesApproval', compact(
                    'viewGate',
                    'row'
                ));
            });

            $table->rawColumns(['actions', 'placeholder', 'transaction', 'status', 'approve']);

            return $table->make(true);
        }

        return view('admin.approval.index', compact('candidates'));
    }

    public function update($id)
    {
        abort_if(Gate::denies('candidate_approve'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('candidate_approve'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($id){
            
            $candidate = Candidate::findOrFail($id);
            
            $candidate->update(['status' => '2']);

        }else{
            return false;
        }

        return response()->json($candidate);
    }

    public function pedding(){
        return response()->json(Candidate::where('status', 0)->count());
    }
    public function approved(){
        return response()->json(Candidate::where('status', 1)->count());
    }
    public function rejected(){
        return response()->json(Candidate::where('status', 2)->count());
    }
}
