<?php

namespace Application\Console\Commands;

use Domain\Users\Actions\RefreshPermissionsAction;
use Illuminate\Console\Command;

class RefreshPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh an application permissions';

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
     * @param  RefreshPermissionsAction  $action
     */
    public function handle(RefreshPermissionsAction $action)
    {
        $action->execute();
    }
}
