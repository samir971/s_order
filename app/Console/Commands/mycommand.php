<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class mycommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ameer:mycommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
       $x=$this->ask("what is the id");
       
        echo User::find($x)->name;

    }
}
