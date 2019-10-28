<?php

namespace Flagstudio\NovaAdminBar;

class AdminBar
{
    private static $model = null;
    private static $resource = '';

    /**
     * @return string
     * @throws \Throwable
     */
    public function generate()
    {
        $editLink = null;
        $showLink = null;

        if (self::$model) {
            $resourceName = self::$resource ?: $this->getModel(self::$model);
            $resource = (config('adminbar.resources_namespace') ?: '\\App\\Nova\\') . $resourceName;
            $uriKey = $resource::uriKey();
            $showLink = config('nova.path') . '/resources/' . $uriKey . '/' . self::$model->id;
            $editLink = $showLink . '/edit';
        }

        $branch = $this->getBranch();

        return view('NovaAdminBar::bar', compact('editLink', 'showLink', 'branch'))->render();
    }

    public function getBranch()
    {
        $stringfromfile = file(base_path('.git/HEAD'), FILE_USE_INCLUDE_PATH);
        $firstLine = $stringfromfile[0]; //get the string from the array
        $explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string
        $branchname = $explodedstring[2];

        return $branchname;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        self::$model = $model;
    }

    /**
     * @param string $resource
     */
    public function setResource(string $resource)
    {
        self::$resource = $resource;
    }

    /**
     * @param $object
     * @return string
     */
    function getModel($object): string
    {
        $model = explode('\\', get_class($object));

        return $model[count($model) - 1];
    }
}