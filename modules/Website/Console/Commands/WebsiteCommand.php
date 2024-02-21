<?php

namespace Modules\Website\Console\Commands;

use Illuminate\Console\Command;

class WebsiteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:WebsiteCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Website Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
