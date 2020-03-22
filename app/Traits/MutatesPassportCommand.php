<?php

namespace App\Traits;

use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Traits\AddWebsiteFilterOnCommand;
use Illuminate\Contracts\Config\Repository as Config;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

trait MutatesPassportCommand
{
    use AddWebsiteFilterOnCommand;

    /**
     * @var WebsiteRepository
     */
    private $websites;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var  Config
     */
    private $config;

    public function __construct(Config $config)
    {
        parent::__construct();

        $this->setName('tenancy:' . $this->getName());
        $this->specifyParameters();

        $this->config = $config;

        $this->websites = app(WebsiteRepository::class);
        $this->connection = app(Connection::class);
    }

    public function handle()
    {
        $this->processHandle(function ($website) {
            $this->connection->set($website);

            parent::handle();

            $this->connection->purge();
        });
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge([$this->addWebsiteOption()], parent::getOptions());
    }
}
