<?php

namespace App\Console\Commands;

use App\Models\VibrationData;
use Illuminate\Console\Command;

class RemoveData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:removeData {--file=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '按文件名删除风振数据';

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
        $filename = $this->option('file');

        if (empty($filename)) {
            $this->warn("您需要提供文件名");
            return;
        }

        $this->info('开始清除文件：' . $filename . " 的相关数据");

        $count = VibrationData::query()->where('filename', $filename)->count();

        if ($count == 0) {
            $this->info("很抱歉，没有找到符合条件的数据");
            return;
        }

        $this->info('一共找到' . $count . "条记录");

        if ($this->confirm('你确认要删除么？')) {
            VibrationData::query()->where('filename', $filename)->delete();
            $this->info("删除数据成功");
            return;
        }

        $this->info("操作已结束～");
        return;
    }
}
