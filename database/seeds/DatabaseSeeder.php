<?php

use Illuminate\Database\Seeder;
use App\Models\Episode;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		/*
		$table->string('yid')->unique();
		$table->string('name');
		$table->string('slug');
		$table->text('description')->nullable();
		$table->date('posted_at')->nullable();
		*/
		Episode::create([
			'yid' => 'fNcX4dFvcHs',
			'name' => 'Dragonforce - Once in a lifetime',
			'slug' => 'dragonforce-once-in-a-lifetime',
			'description' => 'Album: Sonic Firestorm',
			'posted_at' => now()
		]);
		Episode::create([
			'yid' => 'KPb20fK0R94',
			'name' => 'Fear of the Dark - Harp Twins',
			'slug' => 'fear-of-the-dark-harp-twins',
			'description' => 'Audio Recording = No studio or sound engineer. No splices, edits, loops, overlays, or backtracks. Just 2 harps -- 1 audio take!',
			'posted_at' => now()
		]);
    }
}
