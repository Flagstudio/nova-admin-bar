<?php

namespace Flagstudio\NovaAdminBar;

use Carbon\Carbon;

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
        $indexLink = null;

        if (self::$model) {
            $resourceName = self::$resource ?: $this->getModel(self::$model);
            $resource = (config('adminbar.resources_namespace') ?: '\\App\\Nova\\') . $resourceName;
            $uriKey = $resource::uriKey();
            $indexLink =  config('nova.path') . '/resources/' . $uriKey;
            $showLink = $indexLink . '/' . self::$model->id;
            $editLink = $showLink . '/edit';
        }

        if (self::$resource && !self::$model) {
            $resource = (config('adminbar.resources_namespace') ?: '\\App\\Nova\\') . self::$resource;
            $indexLink =  config('nova.path') . '/resources/' . $resource::uriKey();
        }

        $branch = $this->getBranch();
        $commit = $this->getCommit();
        $env = array_search(config('app.env', 'prod'), config('adminbar.env_names'), true) ?: 'prod' ;
        $date = $this->getCommitDate();
        $position = config('adminbar.position');
        $debugBarEnabled = config('debugbar.enabled');

        return view(
            'NovaAdminBar::bar',
            compact(
                'editLink',
                'showLink',
                'indexLink',
                'branch',
                'commit',
                'env',
                'date',
                'position',
                'debugBarEnabled'
            )
        )
            ->render();
    }

    public function getBranch()
    {
        try {
            $stringfromfile = file(base_path('.git/HEAD'), FILE_USE_INCLUDE_PATH);
            $firstLine = $stringfromfile[0] ?? ''; //get the string from the array
            if (!$firstLine) {
                return '';
            }
            $explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string
            $branchname = $explodedstring[2] ?? '';

            return $branchname;
        } catch (\Exception $exception) {
            return config('adminbar.branch') ;
        }
    }

    public function getCommit()
    {
        try {
            $stringfromfile = file(base_path('.git/COMMIT_EDITMSG'), FILE_USE_INCLUDE_PATH);
            $commit = $stringfromfile[0] ?? '';

            return $commit;
        } catch (\Exception $exception) {
            return config('adminbar.commit') ;
        }
    }

    public function getCommitDate()
    {
        try {
            $datetime = shell_exec("git log -1 --pretty=format:'%ci'");
            $date = explode(' ', $datetime)[0];
            return $date;
        } catch (\Exception $exception) {
            return config('adminbar.date')
                ? Carbon::parse(config('adminbar.date'))->format('Y-m-d')
                : '';
        }
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
