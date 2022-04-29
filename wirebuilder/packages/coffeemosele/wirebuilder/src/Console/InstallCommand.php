<?php

namespace Coffeemosele\Wirebuilder\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'wirebuilder:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Wirebuilder package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    public function handle()
    {
        $this->info('Hello');
        $this->initWirebuilderDirectory();
    }

    public function initWirebuilderDirectory()
    {
        $this->directory = config('wirebuilder.directory');

        if (is_dir($this->directory)) {
            $this->line("<error>{$this->directory} directory already exists !</error> ");

            return;
        }

        $this->line('<info>Admin directory was created:</info> ' . str_replace(base_path(), '', $this->directory));
    }

    /**
     * Make new directory.
     *
     * @param string $path
     */
    protected function makeDir($path = '')
    {
        $this->laravel['files']->makeDirectory("{$this->directory}/$path", 0755, true, true);
    }
}
