<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   // public function run(): void
   // {
        // User::factory(10)->create();

       // User::factory()->create([
           // 'name' => 'Test User',
           // 'email' => 'test@example.com',
       // ]);
  //  }
   
    public function run(): void
    {
    User:: create([
        'name' => 'Administrador',
        'email' => 'admin@admin.com',
        'password' =>Hash::make('12345678')

    ]);

    User:: create([
        'name' => 'Secretaria',
        'email' => 'secretaria@admin.com',
        'password' =>Hash::make('12345678')

    ]);

    User:: create([
        'name' => 'Cliente1',
        'email' => 'cliente1@admin.com',
        'password' =>Hash::make('12345678')

    ]);


    }

}
