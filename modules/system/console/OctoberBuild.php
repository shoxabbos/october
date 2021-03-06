<?php namespace System\Console;

use Symfony\Component\Console\Input\InputOption;
use Illuminate\Console\Command;

/**
 * OctoberBuild installs the necessary core packages
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class OctoberBuild extends Command
{
    use \System\Traits\SetupHelper;
    use \System\Traits\SetupBuilder;

    /**
     * The console command name.
     */
    protected $name = 'october:build';

    /**
     * The console command description.
     */
    protected $description = 'Installs the necessary core packages';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->section('Installing Dependencies');
        $this->setupInstallOctober();

        $this->outputOutro();
    }

    /**
     * getOptions get the console command options
     */
    protected function getOptions()
    {
        return [
            ['want', 'w', InputOption::VALUE_REQUIRED, 'Provide a custom version.'],
        ];
    }
}
