<?php

namespace App\Console\Commands;

use App\Imports\SoalKepribadianImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        (new SoalKepribadianImport)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }
}
