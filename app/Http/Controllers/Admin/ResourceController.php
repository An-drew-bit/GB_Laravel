<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceRequest;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Resource::class, 'resource');
    }

    public function index(Resource $resource)
    {
        return view('admin.resource.index', [
            'resources' => $resource->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.resource.create');
    }

    public function store(ResourceRequest $request, Resource $resource)
    {
        $resource->create($request->validated());

        return to_route('admin.resource.index')->with('success', 'Url успешно добавлен');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resource.edit', [
            'resource' => $resource
        ]);
    }

    public function update(ResourceRequest $request, Resource $resource)
    {
        $resource->update($request->validated());

        return to_route('admin.resource.index')->with('success', 'Изменения сохранены');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return to_route('admin.resource.index')->with('success', 'Url успешно удален');
    }
}
