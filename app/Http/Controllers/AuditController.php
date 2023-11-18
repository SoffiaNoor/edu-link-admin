<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $audit = Audit::paginate(5);

        return view("audit.index", compact('audit'));
    }

    public function showAudit(Request $request)
    {
        $sortBy = $request->get('sort', 'date');
        $order = $request->get('order', 'asc');
    
        $audit = Audit::orderBy($sortBy, $order)->paginate(10);
    
        return view('audit.index', compact('audit', 'sortBy', 'order'));
    }


}

