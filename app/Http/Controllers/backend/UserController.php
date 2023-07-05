<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function userList()
    {
        if (request()->ajax()) {
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return date('Y-M-d', strtotime($row['created_at']));
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success my-2 btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.user.userList');
    }
}
