<?php

namespace Porifa\Jarason\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class JarasonMakeCommand extends GeneratorCommand
{
    public $signature = 'Jarason';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }

    protected function getStub(): string
    {
        return '';
    }
}
