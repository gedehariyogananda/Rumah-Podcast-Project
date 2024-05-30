<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RecordingPodcast;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Mas Dede',
            'email' => 'dede@gmail.com',
            'username' => 'dedeganteng',
            'password' => Hash::make('password'),
            'level' => 3,
            'foto' => 'uploads/2024-05-30_14-56-41.jpg',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mas oP',
            'email' => 'orangut@gmail.com',
            'username' => 'orangut',
            'password' => Hash::make('password'),
            'level' => 2,
            'foto' => 'uploads/2024-05-30_14-56-41.jpg',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mas oPg',
            'email' => 'orangutan@gmail.com',
            'username' => 'orangutan',
            'password' => Hash::make('password'),
            'level' => 1,
            'foto' => 'uploads/2024-05-30_14-56-41.jpg',
        ]);



        RecordingPodcast::create([
            'user_id' => 1,
            'title_podcast' => 'Podcast Pertama',
            'photo' => 'uploads/podcast1.jpeg',
            'genre_podcast' => 'Komedi',
            'recording' => 'audio/2024-05-29_17-20-48.mp3',
            'slug' => 'akndawdaiaj22',
            'description' => 'podcast ini berisi tentang komedi yang lucu dan menghibur. intie panjabg yayayaayayayayayyyayayayayaayayayayayayaaqyayachvahjfgawfui qwuiqg fi',
        ]);

        RecordingPodcast::create([
            'user_id' => 1,
            'title_podcast' => 'Podcast Kedua',
            'photo' => 'uploads/podcast2.jpg',
            'genre_podcast' => 'Inspirasi',
            'recording' => 'audio/2024-05-29_17-20-20.mp3',
            'slug' => 'akndawdaiaj2sss',
            'description' => 'podcast ini berisi tentang inspirasi yang memotivasi. intie panjabg yayayaayayayayayyyayayayayaayayayayayayaaqyayachvahjfgawfui qwuiqg fi',

        ]);

        RecordingPodcast::create([
            'user_id' => 1,
            'title_podcast' => 'Podcast Ketiga',
            'photo' => 'uploads/podcast31.jpg',
            'genre_podcast' => 'Horor',
            'recording' => 'audio/2024-05-29_17-20-34.mp3',
            'slug' => 'akndawdaiaj2sssssw3',
            'description' => 'podcast ini berisi tentang horor yang menyeramkan. intie panjabg yayayaayayayayayyyayayayayaayayayayayayaaqyayachvahjfgawfui qwuiqg fi',
        ]);
    }
}
