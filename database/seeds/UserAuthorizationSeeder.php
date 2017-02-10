<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UserAuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name' => 'Author'
        ]);

        $visitor = Role::create([
            'name' => 'Visitor'
        ]);

        $author->permissions()->create([
            'name' => 'create posts'
        ]);

        $userId = factory(App\User::class)->make()->id;
        $user = User::find($userId);

        $user->assignRole('Author');
    }
}
