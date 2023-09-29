<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        $supports = $support->all();

        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id) {
        if(!$support = Support::find($id))
            return back();
        return view('admin/supports/show', compact('support'));
    }

    public function create() {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support) {
        // return view('admin/supports/create');
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);
        // dd($request->only(['subject', 'body']));
        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id) {
        // return view('admin/supports/create');
        if(!$support = $support->find($id)) 
            return back();
        
        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, Support $support, string|int $id) {
        // return view('admin/supports/create');
        if(!$support = $support->find($id)) 
            return back();
        
        $support->update($request->validated());
        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string|int $id) {
        // return view('admin/supports/create');
        if(!$support = $support->find($id)) 
            return back();
        
        $support->delete();

        return redirect()->route('supports.index');
    }
}
