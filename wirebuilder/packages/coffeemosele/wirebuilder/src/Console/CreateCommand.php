<?php

namespace Coffeemosele\Wirebuilder\Console;

use Illuminate\Console\Command;

class CreateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'wirebuilder:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Wirebuilder component';

    public function handle()
    {
        $this->info('Create');
    }
}
