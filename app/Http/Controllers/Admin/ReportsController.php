<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Carbon\Carbon;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;

class ReportsController extends Controller
{
    public function index(Request $request)
    {   
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbiden');
       
        if($request->ajax()) {
            $query = Candidate::select('candidates.*');
            $table = Datatables::of($query);

            $table->editColumn('id', function($row) {
                return $row->id ? $row->id : '' ;
            });
            $table->editColumn('manager_name', function($row) {
                return $row->manager_name ? $row->manager_name : '' ;
            });
            $table->editColumn('team_name', function($row) {
                return $row->team_name ? $row->team_name : '' ;
            });
            $table->editColumn('fan_club', function($row) {
                return $row->fan_club ? $row->fan_club : '' ;
            });
            $table->editColumn('linkby', function($row) {
                return $row->linkby ? $row->linkby : '' ;
            });
            $table->editColumn('dob', function($row) {
                return $row->dob ? $row->dob : '' ;
            });
            $table->editColumn('gender', function($row) {
                return $row->gender ? $row->gender : '' ;
            });
            $table->editColumn('email', function($row) {
                return $row->email ? $row->email : '' ;
            });
            $table->editColumn('phone', function($row) {
                return $row->phone ? $row->phone : '' ;
            });
            $table->editColumn('apply_date', function($row) {
                return $row->created_at ? $row->created_at : '' ;
            });
            $table->editColumn('bank', function($row) {
                return $row->bank ? $row->bank : '' ;
            });
            $table->editColumn('account_no', function($row) {
                return $row->account_no ? $row->account_no : '' ;
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
            $table->rawColumns(['status']);

            return $table->make(true);
        }

        return view('admin.reports.index');
    }
}
