<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'posts', 'comments', 'role_has_permissions', 'roles', 'user_has_permissions', 'user_has_roles'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //Disable foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->toTruncate as $table)
        {
            DB::table($table)->truncate();
        }

        //Re-Enable foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(UserPostSeeder::class);
        $this->call(UserAuthorizationSeeder::class);
    }
}
