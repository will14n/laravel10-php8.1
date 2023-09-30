<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
        
    }
    public function index(Request $request) {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter
        );
        // $supports = Support::paginate();

        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id) {
        if(!$support = $this->service->findOne($id))
            return back();
        return view('admin/supports/show', compact('support'));
    }

    public function create() {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support) {

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
        
        // return view('admin/supports/create');
        // $data = $request->validated();
        // $data['status'] = 'a';

        // $support->create($data);
        // dd($request->only(['subject', 'body']));
        return redirect()->route('supports.index');
    }

    public function edit(string|int $id) {
        // return view('admin/supports/create');
        if(!$support = $this->service->findOne($id)) 
            return back();
        
        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, Support $support, string|int $id) {

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        
        if(!$support) {
            return back();
        }
        // return view('admin/supports/create');
        // if(!$support = $support->find($id)) 
        //     return back();
        
        // $support->update($request->validated());
        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id) {
        // return view('admin/supports/create');
        $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
}
