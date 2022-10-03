<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceRequest;
use App\Models\Resource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Resource::class, 'resource');
    }

    public function index(Resource $resource): Application|Factory|View
    {
        return view('admin.resource.index', [
            'resources' => $resource->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.resource.create');
    }

    public function store(ResourceRequest $request, Resource $resource): RedirectResponse
    {
        $resource->create($request->validated());

        return to_route('admin.resource.index')->with('success', 'Url успешно добавлен');
    }

    public function edit(Resource $resource): Application|Factory|View
    {
        return view('admin.resource.edit', [
            'resource' => $resource
        ]);
    }

    public function update(ResourceRequest $request, Resource $resource): RedirectResponse
    {
        $resource->update($request->validated());

        return to_route('admin.resource.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Resource $resource): RedirectResponse
    {
        $resource->delete();

        return to_route('admin.resource.index')->with('success', 'Url успешно удален');
    }
}
