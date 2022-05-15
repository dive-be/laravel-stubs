<?php declare(strict_types=1);

namespace Dive\Stubs;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;

class PublishStubsCommand extends Command
{
    protected $signature = 'dive-stubs:publish {--overwrite}';

    public function handle(): int
    {
        (new Filesystem())->ensureDirectoryExists($this->stubsDirectory());

        $stubs = (new Filesystem())->files(__DIR__ . '/../stubs');

        if (! $this->option('overwrite')) {
            $stubs = $this->getUnpublished($stubs);
        }

        $this->publish($stubs);

        $this->info('DIVE flavored stubs published!');

        return self::SUCCESS;
    }

    protected function getUnpublished(array $stubs): array
    {
        return array_filter($stubs,
            fn (SplFileInfo $stub) => ! file_exists($this->destinationPath($stub))
        );
    }

    protected function publish(array $stubs)
    {
        foreach ($stubs as $stub) {
            file_put_contents($this->destinationPath($stub), file_get_contents($stub->getPathname()));
        }
    }

    private function destinationPath(SplFileInfo $stub): string
    {
        return $this->stubsDirectory() . '/' . $stub->getFilename();
    }

    private function stubsDirectory(): string
    {
        return $this->laravel->basePath('stubs');
    }
}
