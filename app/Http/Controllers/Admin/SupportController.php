<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();
        return view('admin.supports.index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'a';

        Support::create($data);
        
        return redirect()->route('supports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $id)
    {
        $support = Support::find($id);
        if (!$support) return back();

        return view('admin.supports.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support, string|int $id)
    {
        $support = $support->find($id);
        if (!$support) return back();

        return view('admin.supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support, string|int $id)
    {
        if (!$support = $support->find($id)) return back();

        $support->update($request->only([
            'subject', 
            'body'
        ]));

        return redirect()->route('supports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        if (!$support = Support::find($id)) return back();
        $support->delete();

        return redirect()->route('supports.index');
    }
}
