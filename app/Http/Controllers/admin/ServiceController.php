<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function create()
    {
        return view('admin.service-create');
    }

    public function store(Request $request)
    {
        Service::create($request->all());
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service-edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('admin.services')->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil dihapus');
    }
}
