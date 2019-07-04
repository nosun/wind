<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportDataBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:batchImport {--dir=data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batch Import Data';

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
     * @return mixed
     */
    public function handle()
    {
        $dir = $this->option('dir');

        $this->info('begin to batch import file of path ' . $dir);

        $files = \Storage::disk('admin')->listContents($dir);

        foreach ($files as $file) {
            $this->call('tools:importData', ['file' => $file['path']]);
        }
    }
}
