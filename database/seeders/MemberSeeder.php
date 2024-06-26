<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    
    public function run(): void
    {
        Member::factory()->times(3)->hasUsages(10)->create();
    }
}