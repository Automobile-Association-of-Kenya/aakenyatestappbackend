<?php

namespace App\Console\Commands;

use App\Models\Test;
use App\Models\Topic;
use Illuminate\Console\Command;

class arrangeTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests:arrange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command arranges tests based on curriculum order';

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
     * @return int
     */
    public function handle()
    {
        $tests=Test::all();
        $bar = $this->output->createProgressBar(count($tests));
        $bar->start();
        foreach ($tests as $test) {
            $topic = Topic::find($test->topic_id);
            if($topic)
            {
                $test->update([
                    'order'=>$topic->order
                ]);
            }
            $bar->advance();
        }
        $bar->finish();
        $this->newLine();
        $this->line(' Tests arranged successfully!');
    }
}
