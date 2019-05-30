<?php

namespace Flagstudio\NovaAdminBar;

class AdminBar
{
    private static $model = null;
    private static $resource = '';

    public function generate()
    {
        if (self::$model) {
            $resourceName = self::$resource ?: getModel(self::$model, false);
            $resource = (config('adminbar.resources_namespace') ?: '\\App\\Nova\\') . $resourceName;
            $uriKey = $resource::uriKey();
            $showLink = config('nova.path') . '/resources/' . $uriKey . '/' . self::$model->id;
            $editLink = $showLink . '/edit';
        }

        return view('NovaAdminBar::bar', compact('editLink', 'showLink'))->render();
    }

    public function setModel($model)
    {
        self::$model = $model;
    }

    public function setResource($resource)
    {
        self::$resource = $resource;
    }
}