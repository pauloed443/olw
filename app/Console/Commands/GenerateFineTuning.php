<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI;

class GenerateFineTuning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openai:create-finetuning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create OpenAI fine tuning';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line("Uploading training file...");

        $file = OpenAI::files()->upload([
            'purpose' => 'fine-tune',
            'file' => fopen(storage_path('olw-dataset-template.jsonl'), 'r')
        ]);

        $this->comment("File NAME with Id FILEID");

        $this->line("Creating fine tuning...");

        $this->comment("Fine tining ID: FINEID");

        $this->info("Fine tuning created successfully");
        
        return Command::SUCCESS;
    }
}
