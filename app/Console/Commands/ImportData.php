<?php

namespace App\Console\Commands;

use App\Imports\VibrationDataImport;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:importData {file=data/TOWER_DATA_18012809.txt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import wind vibration data';

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
        $file = $this->argument('file');

        $this->info('begin import file of path ' . $file);
        $path = \Storage::disk('admin')->path($file);
        $filename = $this->getFileName($file);

        try {
            \Excel::import(new VibrationDataImport($filename), $path);
        } catch (QueryException $exception) {
            var_dump($exception->getMessage());
        }
    }

    protected function getFileName($file)
    {
        $_arr = explode('/', $file);
        if(count($_arr)){
            return last($_arr);
        }

        return '';
    }
}
