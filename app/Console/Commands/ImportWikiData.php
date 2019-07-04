<?php

namespace App\Console\Commands;

use App\Models\WikiCategory;
use App\Models\WikiDoc;
use Illuminate\Console\Command;
use Storage;

class ImportWikiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tools:importDocs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Wiki Docs';

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
        $this->info('import Wiki Data Begin');

        $data = WikiCategory::query()->select(['id', 'name', 'slug'])->get()->toArray();
        $categories = [];
        foreach ($data as $row) {
            $categories[$row['slug']] = $row;
        }

        $dirs = Storage::disk('admin')->listContents('docs/');

        foreach ($dirs as $dir) {
            $files = Storage::disk('admin')->listContents($dir['path']);
            if ($category = $categories[$dir['filename']]) {
                foreach ($files as $file) {
                    $md5 = md5_file(Storage::disk('admin')->path($file['path']));
                    $doc_imported = WikiDoc::query()->where('md5', $md5)->where('category_id', $category['id'])->first();
                    if (!$doc_imported) {
                        $new_path = public_path() . '/uploads/' . $file['dirname'] . '/' . md5($file['basename']) . '.' . $file['extension'];
                        Storage::disk('admin')->move($file['path'], $new_path);
                        $wikiDoc = new WikiDoc();
                        $wikiDoc->title = trim($file['basename']);
                        $wikiDoc->size = $file['size'];
                        $wikiDoc->category_id = $category['id'];
                        $wikiDoc->path = $new_path;
                        $wikiDoc->ext = $file['extension'];
                        $wikiDoc->md5 = $md5;
                        $wikiDoc->weight = 1;
                        $wikiDoc->type = $this->getFileType($file['extension']);
                        $wikiDoc->save();
                        $this->info('success import doc: ' . $file['basename']);
                    }
                }
            }
        }
    }

    protected function getFileType($ext)
    {
        switch ($ext) {
            case 'jpg':
            case 'gif':
            case 'png':
                return 'image';
            case 'flv':
                return 'video';
            default:
                return 'doc';
        }
    }
}
