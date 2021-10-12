<?php

namespace SimaoCoutinho\Admin\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'admin:install';

    protected $description = 'Install the SimaoCoutinho/Admin components and resources';

    public function handle()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'admin-views', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'admin-public', '--force' => true]);
    }
}
