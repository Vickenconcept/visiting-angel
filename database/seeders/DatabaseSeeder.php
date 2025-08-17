<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\BlogPost;
use App\Models\Opening;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed a default admin if none
        if (!User::query()->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // services
        if (!Service::query()->exists()) {
            Service::create(['title' => 'CNA Staffing', 'slug' => 'cna-staffing', 'excerpt' => 'Compassionate CNAs for daily living support', 'is_active' => true]);
            Service::create(['title' => 'CMT Staffing', 'slug' => 'cmt-staffing', 'excerpt' => 'Medication technicians ensuring safe administration', 'is_active' => true]);
            Service::create(['title' => 'LPN/GNA Staffing', 'slug' => 'lpn-gna-staffing', 'excerpt' => 'Skilled nurses and geriatric assistants', 'is_active' => true]);
        }

        // blog posts
        if (!BlogPost::query()->exists()) {
            BlogPost::create(['title' => 'Navigating Staffing Shortages in Long-Term Care', 'slug' => 'navigating-staffing-shortages', 'excerpt' => 'Practical tips for administrators', 'content' => '<p>Across the country...</p>', 'is_published' => true, 'published_at' => now()]);
            BlogPost::create(['title' => 'Top 5 Qualities of an Outstanding CNA', 'slug' => 'qualities-of-an-outstanding-cna', 'excerpt' => 'Qualities that matter most', 'content' => '<p>Compassion, patience...</p>', 'is_published' => true, 'published_at' => now()]);
        }

        // jobs
        if (!Opening::query()->exists()) {
            Opening::create(['title' => 'Certified Nursing Assistant (CNA)', 'slug' => 'cna', 'location' => 'Woodbridge, VA', 'employment_type' => 'full-time', 'description' => '<p>Provide daily living assistance...</p>', 'is_active' => true]);
            Opening::create(['title' => 'Licensed Practical Nurse (LPN)', 'slug' => 'lpn', 'location' => 'Remote/Per-diem', 'employment_type' => 'per-diem', 'description' => '<p>Medication administration, wound care...</p>', 'is_active' => true]);
        }
    }
}
