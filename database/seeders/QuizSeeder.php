<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Latihan HTML',
                // 'time' => '00:30:00',
                'created_at' => now(),
                'start_date' => now()->addDays(2),
                'end_date' => now()->addDays(5),
                'status' => 'Published'
            ],
            [
                'name' => 'Latihan Javascript',
                // 'time' => '00:40:00',
                'created_at' => now()->addDays(1),
                'start_date' => now()->addDays(3),
                'end_date' => now()->addDays(5),
                'status' => 'Published'
            ],
            [
                'name' => 'Latihan VueJS',
                // 'time' => '00:20:00',
                'created_at' => now()->addDays(1),
                'start_date' => now()->addDays(2),
                'end_date' => now()->addDays(5),
                'status' => 'Published'
            ],
            [
                'name' => 'Latihan ReactJS',
                // 'time' => '00:30:00',
                'created_at' => now(),
                'start_date' => now(),
                'end_date' => now()->addDays(5),
            ],
            [
                'name' => 'Latihan Laravel',
                // 'time' => '00:30:00',
                'created_at' => now(),
                'start_date' => now(),
                'end_date' => now()->addDays(5),
            ],
            [
                'name' => 'Latihan CodeIgniter',
                // 'time' => '00:30:00',
                'created_at' => now(),
                'start_date' => now(),
                'end_date' => now()->addDays(5),
            ],
        ])->each(function ($quiz) {
            $quiz = \App\Models\Quiz::create($quiz);
            $questions = array();

            for ($i = 1; $i < 11; $i++) {
                array_push($questions, $quiz->quiz_questions()->create([
                    'question' => $quiz->name . ' Question Test ' . $i . '?'
                ]));
            }

            foreach ($questions as $question) {
                for ($i = 1; $i < 5; $i++) {
                    $question->question_options()->create([
                        'option' => $question->question . ' Option Test ' . $i,
                        'status' => $i,
                    ]);
                }
            }

            $users = \App\Models\User::get();
            foreach($users as $user){
                if($user->hasRole('pegawai')){
                    $user->quiz_grade()->attach($quiz->id, ['grade' => 0.0, 'status' => 'Unfinished']);
                }
                
            }
        });
    }
}
