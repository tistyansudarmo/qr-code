<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user1 = User::create([
            'name' => 'Tistyan Sudarmo',
            'qr_code' => Str::random(8),
            'alamat' => 'Jalan Bethesda',
            'password' => 12345678,
            'created_at' => Carbon::now()
        ]);

        QrCode::generate($user1->qr_code);

        $user2 = User::create([
            'name' => 'Ferrent Tacoh',
            'qr_code' => Str::random(8),
            'alamat' => 'Minanga',
            'password' => 12345678,
            'created_at' => Carbon::now()
        ]);

        QrCode::generate($user2->qr_code);

        $user3 = User::create([
            'name' => 'Meity Kelah',
            'qr_code' => Str::random(8),
            'alamat' => 'Ranotana',
            'password' => 12345678,
            'created_at' => Carbon::now()
        ]);

        QrCode::generate($user3->qr_code);
    }
}
