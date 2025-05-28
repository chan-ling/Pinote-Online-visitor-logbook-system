<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class VisitorController extends Controller
{

public function index()
{
    $visitors = Visitor::latest()->get();
    return view('visitors.index', compact('visitors'));
}

public function create()
{
    return view('visitors.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'purpose' => 'required|string',
        'picture' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['name', 'email', 'phone', 'purpose']);
    $data['entry_time'] = now()->setTimezone('Asia/Manila');

    if ($request->hasFile('picture')) {
        $data['picture'] = $request->file('picture')->store('pictures', 'public');
    }

    Visitor::create($data);

    return redirect()->route('visitors.index')->with('success', 'Visitor recorded.');
}



public function markExit($id)
{
    $visitor = Visitor::findOrFail($id);
    $visitor->exit_time = now()->setTimezone('Asia/Manila');
    $visitor->save();

    return redirect()->back()->with('success', 'Exit time recorded.');
}


public function dailyReport()
{
    $visitors = Visitor::whereDate('created_at', now()->toDateString())->get();
    return view('visitors.daily', compact('visitors'));
}


}
