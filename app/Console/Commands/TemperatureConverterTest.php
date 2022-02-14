<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TemperatureConverterTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'converter:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->comment('Running all tests...');
        $this->comment('----------------------------------');

        $this->info('Converting Celsius to Fahrenheit');
        if ($this->call('temperature:converter', ['--number' => 37, '--from' => 'c'])) {
            $this->info('Test passed');
        }

        $this->comment('----------------------------------');
        $this->info('Converting Fahrenheit to Celsius');
        if ($this->call('temperature:converter', ['--number' => 98.6, '--from' => 'f'])) {
            $this->info('Test passed');
        }

        $this->comment('');
        $this->comment('All tests complete!');
    }
}
