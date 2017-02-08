<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['posts', 'comments'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->toTruncate as $table)
        {
            DB::table($table)->truncate();
        }

        $this->call(UserPostSeeder::class);
    }
}
