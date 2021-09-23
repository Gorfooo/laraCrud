<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearTempFiles extends Command
{
    protected $signature = 'command:ClearTempFiles';

    protected $description = 'Clear temporary image files';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        array_map( 'unlink', array_filter((array) glob(storage_path("app/photos/*")) ) );
    }
}
