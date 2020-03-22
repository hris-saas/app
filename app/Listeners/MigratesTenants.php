<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use Hyn\Tenancy\Listeners\Database\MigratesTenants as ParentClass;

class MigratesTenants extends ParentClass
{
    protected $order = [
        'core', 'auth', 'pim', 'ats',
    ];

    protected $finalPaths = [];
    
    protected function getMigrationPaths()
    {
        $paths = app('migrator')->paths();

        $tenantMigrationPath = str_replace(database_path() . DIRECTORY_SEPARATOR, '', config('tenancy.db.tenant-migrations-path'));

        foreach ($paths as $path) {
            $path = str_replace('migrations', $tenantMigrationPath, $path);

            $order = array_flip($this->order);

            foreach ($order as $key => $value) {
                if (Str::contains($path, $key)) {
                    $this->finalPaths[$value] = $path;
                }
            }
        }

        ksort($this->finalPaths);

        return $this->finalPaths;
    }
}
