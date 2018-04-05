<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

/*
 Command to perform git push to remote repo, then, pull from remote repo to vps
*/
$deploy = 'deploy'
        . ' {--d|directory : The directory that houses the project}';
// Artisan::command($deploy, function () {
    // $options = $this->options();   $directory = $options['directory'];
    // OR
    // $directory = $this->option('directory');
    // OR
Artisan::command($deploy, function ($directory){
    if(!$directory){
        $directory = $this->ask('Enter the directory that houses the project');
    }
    $this->info("Deploying Project '{$ret_var}'! Please wait...");

})->describe('Build the project in the specified directory');
