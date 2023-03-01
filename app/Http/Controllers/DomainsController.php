<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'unique:domains']
        ]);
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
    public function update(Request $request,Domain $domain)
    {
        $request->validate([
            'name' => ['required','string',Rule::unique('domains')->ignore($domain)],
        ]);
        $domain->update($request->all());
        return redirect()->route('domains.index');
    }
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->route('domains.index');
    }
}
