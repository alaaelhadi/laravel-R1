<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';  //app:database-backup

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automating Daily Backups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(!Storage::exists('backup')){
            Storage::makeDirectory('backup');
        }
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
         . " --host=" . env('DB_Host') . " " . env('DB_DATABASE')
         . " | gzip > " . storage_path() . "/app/backup/" . $filename;
        $returnVar = Null;
        $output = Null;
        exec($command, $output, $returnVar);
    }
}
