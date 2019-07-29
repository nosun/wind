<?php

namespace App\Console\Commands;

use App\Models\AnalysisChart;
use App\Models\ChartsCategory;
use Illuminate\Console\Command;
use Storage;

class ImportCharts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:importCharts {--dir=charts}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Analysis Charts';

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

        $this->info('begin to batch import charts of path ' . $dir);

        $this->doDir($dir);
    }

    protected function doDir($dir)
    {
        $dirs = Storage::disk('admin')->listContents($dir);
        foreach ($dirs as $d) {
            if ($d['type'] == 'dir') {
                $sub_files = Storage::disk('admin')->listContents($d['path']);
                if (count($sub_files) && $sub_files[0]['type'] == 'file') {
                    $this->doFile($d['path']);
                } else {
                    $this->doDir($d['path']);
                }
            }
        }
    }

    protected function doFile($dir)
    {
        $_arr = explode('/', $dir);
        $length = count($_arr);

        $depth = $length - 2;

        $category = ChartsCategory::query()->firstOrCreate([
            'category_1' => $_arr[1],
            'category_2' => $depth >=2 ? $_arr[2] : '',
        ]);

        $title = $_arr[$length - 1];

        $chart = AnalysisChart::query()->firstOrCreate(['title' => $title]);

        $chart->title = $title;
        $chart->category_id = $category->id;
        $chart->category = $depth >=3 ? $_arr[3] : '';

        $files = Storage::disk('admin')->listContents($dir);

        foreach($files as $file){
            switch ($file['extension']){
                case 'txt':
                    $content = Storage::disk('admin')->get($file['path']);
                    $chart->description = $content;
                    $chart->save();
                    break;
                case 'png':
                case 'jpeg':
                case 'jpg':
                    $md5 = md5_file(Storage::disk('admin')->path($file['path']));
                    $new_path = '/uploads/charts/'. md5($file['basename']) . '.' . $file['extension'];
                    copy(Storage::disk('admin')->path($file['path']),public_path() .$new_path);
                    $chart->path = $new_path;
                    $chart->md5 = $md5;
                    $chart->save();
                    $this->info('success import chart: ' . $file['basename']);
                    break;
                default:
                    $this->info('not support this file');
                    break;
            }
        }
    }
}
