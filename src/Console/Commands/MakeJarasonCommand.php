<?php

namespace Porifa\Jarason\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:jarason')]
class MakeJarasonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:jarason {name : Create an Jarason class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Jarason class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Jarason';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        return $this->call('jarason:make', ['name' => trim($this->argument('name'))]);
    }
}
