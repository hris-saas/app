<?php

namespace App\Console\Migration;

use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\Console\Migrations\MigrateCommand as BaseMigrateCommand;

class MigrateCommand extends BaseMigrateCommand
{
    protected $migrator;

    protected $order = [
        'core', 'auth', 'pim', 'ats',
    ];

    protected $finalPaths = [];

    public function __construct(Migrator $migrator)
    {
        parent::__construct($migrator);
    }
    
    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        if ($tenant = $this->option('tenant')) {

            $paths = $this->migrator->paths();
            
            foreach ($paths as $path) {
                $path .= DIRECTORY_SEPARATOR . 'tenant';

                $order = array_flip($this->order);

                foreach ($order as $key => $value) {
                    if (Str::contains($path, $key)) {
                        $this->finalPaths[$value] = realpath($path);
                    }
                }
            }

            ksort($this->finalPaths);

            foreach ($this->finalPaths as $path) {
                $this->migrator->path($path);
            }

            if (! $this->confirmToProceed()) {
                return 1;
            }

            $this->migrator->usingConnection($this->option('database'), function () {
                $this->prepareDatabase();

                $this->migrator->setOutput($this->output)
                    ->run($this->getMigrationPaths(), [
                        'pretend' => $this->option('pretend'),
                        'step' => $this->option('step'),
                    ]);
            });

            return 0;
        
        } else {
            parent::handle();
        }
    }
}
