<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NumberCommand extends Command
{
    /**
     * 命令行执行命令
     * @var string
     */
    protected $signature = 'number_command';

    /**
     * 命令描述
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
        //这里编写需要执行的动作
        $heihei = new \App\Http\Controllers\NumberController();
        $heihei->NumberLogic();
    }
}