<?php

namespace Application\Console\Commands;

use Application\Console\Concerns\AskWithValidation;
use Domain\Users\Actions\CreateAdministratorAction;
use Domain\Users\DataTransferObjects\UserData;
use Domain\Users\Exceptions\EmailNotUniqueException;
use Illuminate\Console\Command;

class CreateAdministrator extends Command
{
    use AskWithValidation;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-administrator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an administrator';

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
     * @param  CreateAdministratorAction  $action
     * @return void
     * @throws EmailNotUniqueException
     */
    public function handle(CreateAdministratorAction $action)
    {
        $name = $this->askWithValidation('Name', 'name', ['required']);
        $email = $this->askWithValidation('Email', 'email', ['required']);
        $password = $this->askWithValidation('Password', 'password', ['required']);
        $email_verified_at = now()->toDateTimeString();
        $userData = new UserData(compact('name', 'email', 'password', 'email_verified_at'));
        $action->execute($userData);
    }
}
