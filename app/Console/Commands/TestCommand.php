<?php

namespace App\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hr:action-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['Action', 'Actor', 'Item'];

        $actionItems = [
            [
                'notify',
                'hr',
                'job application',
            ],
            [
                'conduct',
                'hr',
                'resume screening',
            ],
            [
                'conduct',
                'hr',
                'phone screening',
            ],
            [
                'set',
                'hr',
                'initial interview schedule',
            ],
            [
                'confirm',
                'applicant',
                'initial interview schedule',
            ],
            [
                'complete',
                'applicant',
                'pre-application form',
            ],
            [
                'conduct',
                'hr',
                'initial interview',
            ],
            [
                'send',
                'hr',
                'application exam',
            ],
            [
                'complete',
                'applicant',
                'application exam',
            ],
            [
                'notify',
                'checkers',
                'application exam',
            ],
            [
                'check',
                'checkers',
                'application exam',
            ],
            [
                'send',
                'hr',
                'application questionnaire',
            ],
            [
                'complete',
                'applicant',
                'application questionnaire',
            ],
            [
                'notify',
                'hr',
                'application questionnaire',
            ],
            [
                'review',
                'hr',
                'application questionnaire',
            ],
            [
                'notify',
                'interviewers',
                'final interview',
            ],
            [
                'set',
                'hr',
                'final interview schedule',
            ],
            [
                'confirm',
                'applicant',
                'final interview schedule',
            ],
            [
                'conduct',
                'interviewers',
                'final interview',
            ],
            [
                'conduct',
                'interviewers',
                'final interview',
            ],
            [
                'notify',
                'hr',
                'top applicants',
            ],
            [
                'make',
                'hr',
                'job offer',
            ],
            [
                'send',
                'hr',
                'job offer',
            ],
            [
                'confirm',
                'applicant',
                'job offer',
            ],
        ];

        // $actionItems = Arr::sort($actionItems, function ($item) {
        //     // return $item[0];
        // });

        $this->table($headers, $actionItems);
    }
}
