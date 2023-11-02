<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $activities = Audit::with('user')->latest()->get();
//        dd($activities);

        return view('audit.index',[
            'activities' => $activities
        ]);
    }
}
