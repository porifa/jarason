<?php

namespace Porifa\Jarason\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'jarason:install')]
class JarasonInstallCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jarason:install';

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
     * STUB_PATH.
     */
    const STUB_PATH = __DIR__ . '/stubs/';

    /**
     * @return string
     */
    protected function getStub()
    {
        return self::STUB_PATH . 'jarason.default.stub';
    }

    /**
     * Execute the console command.
     *
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @see \Illuminate\Console\GeneratorCommand
     */
    public function handle(): bool|null
    {
        if ($this->isReservedName($this->getBaseJarasonName())) {
            $this->error('The name "' . $this->getBaseJarasonName() . '" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getBaseJarasonName());

        $path = $this->getPath($name);

        if ((! $this->hasOption('force') ||
                ! $this->option('force')) &&
            $this->alreadyExists($this->getBaseJarasonName())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put(
            $path,
            $this->sortImports(
                $this->buildServiceClass($name)
            )
        );
        $message = $this->type;

        $this->info($message . ' created successfully.');

        return true;
    }

    /**
     * Build the class with the given name.
     *
     * @param $isInterface
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceClass(string $name): string
    {
        $stub = $this->files->get(
            $this->getStub()
        );

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function getBaseJarasonName(): string
    {
        return 'Jarason';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Jarasons';
    }
}
