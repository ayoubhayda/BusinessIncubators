<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index()
    {
        return view('domains.index',[
            'domains' => Domain::all()
        ]
        );
    }
    public function create()
    {
        return view('domains.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'new-domain-name' => ['required','string']
        ]);
        $domain = new Domain();
        $domain->name = strip_tags($request->input('new-domain-name'));
        $domain->slug = Str::slug($domain->name);
        $domain->save();
        return redirect()->route('domains.index');
    }
    public function show($domain)
    {
        //
    }
    public function edit($domain)
    {
        return view('domains.index');

    }
    public function update(Request $request, $domain)
    {
        $request->validate([
            'domain-name' => ['required','string'],
        ]);
        $toUpdate = Domain::findOrFail($domain);
        $toUpdate->name = strip_tags($request->input('domain-name'));
        $toUpdate->slug = Str::slug($toUpdate->name);
        $toUpdate->save();
        return redirect()->route('domains.index');

    }
    public function destroy($domain)
    {
        $toDelete = Domain::findOrFail($domain);
        $toDelete->delete();
        return redirect()->route('domains.index');

    }
}
