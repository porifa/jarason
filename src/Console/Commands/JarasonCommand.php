<?php

namespace Porifa\Jarason\Console\Commands;

use Illuminate\Console\Command;

class JarasonCommand extends Command
{
    public $signature = 'Jarason';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
