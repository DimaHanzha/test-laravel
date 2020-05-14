<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Model\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'is_admin' => true,
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
