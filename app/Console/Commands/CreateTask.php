<?php

namespace App\Console\Commands;

use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Task';

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
        $faker = Faker::create();
        $count = $this->argument('count');
        $data = array();
        for ($i = 0; $i < $count; $i++) {
            $tmp = [
                'title' => $faker->realText($faker->numberBetween(40,100)),
                'priority' => rand(1,100),
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($data,$tmp);
        }
        DB::table('tasks')->insert($data);
    }
}
