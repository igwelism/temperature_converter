<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TemperatureConverter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temperature:converter'
                . '{--number= : Number to convert}'
                . '{--from= : Base Temperature}';

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
     */
    public function handle(): bool
    {
        $this->info("Starting Temperature Conversion at " . date("Y-m-d H:i:s"));
        if(!is_null($this->option('number'))) {
            if (strtolower($this->option('from')) == 'c') {
                $celsius = $this->option('number');
                $fahrenheit = round(((int)$celsius * (9 / 5)) + 32,4);
                $this->info("\nBase Temperature: $celsius" ."°C");
                $this->info("Converted To: " . round($fahrenheit, 2) ."°F");
            } elseif (strtolower($this->option('from')) == 'f') {
                $fahrenheit = $this->option('number');
                $celsius = round(((int)$fahrenheit - 32) * (5 / 9), 4);
                $this->info("\nBase Temperature: $fahrenheit" ."°F");
                $this->info("Converted To: " . round($celsius, 2) ."°C");
            } else {
                $this->info("\nNo Base Temperature was received");
            }
        } else {
            $this->info("\nNo Base Number was received");
        }
        return true;
    }
}
