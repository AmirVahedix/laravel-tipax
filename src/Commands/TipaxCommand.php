<?php

namespace AmirVahedix\Tipax\Commands;

use Illuminate\Console\Command;

class TipaxCommand extends Command
{
    public $signature = 'laravel-tipax';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
