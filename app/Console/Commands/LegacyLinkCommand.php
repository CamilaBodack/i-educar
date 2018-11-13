<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LegacyLinkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legacy:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create symbol link to public legacy path';

    /**
     * Create a symbol link for $path and show a info message.
     *
     * @param string $path
     *
     * @return void
     */
    private function createSymbolLink($path)
    {
        $legacy = '../' . config('legacy.path') . '/' . $path;
        $public = public_path($path);

        if (is_link($public)) {
            unlink($public);
        }

        symlink($legacy, $public);

        $this->info("Symbol link created for: {$path}");
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paths = ['intranet', 'module', 'modules'];

        foreach ($paths as $path) {
            $this->createSymbolLink($path);
        }
    }
}
