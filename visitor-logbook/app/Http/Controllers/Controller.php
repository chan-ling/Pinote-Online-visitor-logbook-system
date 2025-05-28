<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function dailyReport()
{
    $visitors = Visitor::whereDate('created_at', now()->toDateString())->get();
    return view('visitors.report', compact('visitors'));
}

public function markExit($id)
{
    $visitor = Visitor::findOrFail($id);
    $visitor->exit_time = now(); // Exact time of exit
    $visitor->save();

    return redirect()->back()->with('success', 'Exit time recorded.');
}


}
