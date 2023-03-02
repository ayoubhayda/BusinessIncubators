<?php

namespace App\Http\Controllers;
use App\Http\Requests\DomainStore;
use App\Http\Requests\DomainUpdate;
use App\Models\Domain;


class DomainsController extends Controller
{
    public function index()
    {
        return view('admin.domains.index',[
            'domains' => Domain::all()
        ]
        );
    }
    public function create()
    {
        return view('admin.domains.index');
    }
    public function store(DomainStore $request)
    {
        $request->validated();
        Domain::create($request->all());

        return redirect()->route('domains.index');
    }
    public function show($domain)
    {
        //
    }
    public function edit($domain)
    {
       return view('admin.domains.index');
    }
    public function update(DomainUpdate $request,Domain $domain)
    {
        $request->validated();
        $domain->update($request->all());
        return redirect()->route('domains.index');
    }
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->route('domains.index');
    }
}
