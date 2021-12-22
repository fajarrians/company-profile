<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     UserSeeder::class,
        //     ProfilSeeder::class,
        //     PortfolioSeeder::class,
        //     HomeSeeder::class,
        //     GallerySeeder::class,
        //     BlogSeeder::class,
        // ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        DB::table('homes')->insert([
            'title' => 'Pekerja Lembur',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium cum, facilis unde amet omnis quam itaque praesentium optio! Inventore magni nihil eveniet labore assumenda at! Repellat quia impedit sapiente eos.'
        ]);
        DB::table('profils')->insert([
            'sejarah' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis excepturi deleniti cumque repellendus temporibus maiores asperiores illum. Iure quos optio, veniam perferendis modi blanditiis quaerat atque? Rerum alias nisi perferendis.',
            'visi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis excepturi deleniti cumque repellendus temporibus maiores asperiores illum.',
            'misi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis excepturi deleniti cumque repellendus temporibus maiores asperiores illum.',
            'profil'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis excepturi deleniti cumque repellendus temporibus maiores asperiores illum. Iure quos optio, veniam perferendis modi blanditiis quaerat atque? Rerum alias nisi perferendis.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis excepturi deleniti cumque repellendus temporibus maiores asperiores illum. Iure quos optio, veniam perferendis modi blanditiis quaerat atque? Rerum alias nisi perferendis.'
        ]);
        DB::table('portfolios')->insert([
            'image' => 'post-images/port01.jpg',
            'title' => 'Lorem ipsum dolor',
            'keterangan' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quaerat unde praesentium laboriosam optio debitis ratione'
        ]);
        DB::table('blogs')->insert([
            'image' => 'post-images/blog01.jpg',
            'author' => 'Lorem Ipsum',
            'date' => '2021-12-20',
            'title' => 'Lorem ipsum dolor',
            'slug' => 'Lorem-ipsum-dolor',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quae numquam porro natus quisquam molestias dicta veritatis vitae doloribus dolorum ipsa rerum temporibus reprehenderit velit aliquid, soluta hic perferendis, saepe excepturi animi! Neque soluta obcaecati odio ipsam corporis cumque laborum laboriosam, veniam et minus ipsum atque! Temporibus expedita veniam eveniet tempore, animi ducimus molestiae quam, iste iure placeat accusamus ut rem aut maxime consectetur quas. Ad, voluptates id? A, consequatur!'
        ]);
        DB::table('galleries')->insert([
            'image' => 'post-images/gallery01.jpg',
            'title'=> 'Lorem ipsum dolor'
        ]);
        
    }
}
