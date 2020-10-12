<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addition = Category::where('name', 'Addition')->first('id');
        if($addition){
          $aq1 = Question::create(
            ['title' => "What is the sum of 3 and 4?", 'status' => 1, 'category_id' => $addition->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $aq1->id],
              ['description' => 7, 'is_correct' => 1, 'question_id' => $aq1->id],
              ['description' => 9, 'is_correct' => 0, 'question_id' => $aq1->id],
              ['description' => 8, 'is_correct' => 0, 'question_id' => $aq1->id],
            ]
          );

          $aq2 = Question::create(
            ['title' => "What is the sum of 8 and 9?", 'status' => 1, 'category_id' => $addition->id],
          );
          Answer::insert(
            [
              ['description' => 15, 'is_correct' => 0, 'question_id' => $aq2->id],
              ['description' => 17, 'is_correct' => 1, 'question_id' => $aq2->id],
              ['description' => 16, 'is_correct' => 0, 'question_id' => $aq2->id],
              ['description' => 14, 'is_correct' => 0, 'question_id' => $aq2->id],
            ]
          );

          $aq3 = Question::create(
            ['title' => "What is the sum of 9 and 9?", 'status' => 1, 'category_id' => $addition->id],
          );
          Answer::insert(
            [
              ['description' => 15, 'is_correct' => 0, 'question_id' => $aq3->id],
              ['description' => 18, 'is_correct' => 1, 'question_id' => $aq3->id],
              ['description' => 16, 'is_correct' => 0, 'question_id' => $aq3->id],
              ['description' => 14, 'is_correct' => 0, 'question_id' => $aq3->id],
            ]
          );

          $aq4 = Question::create(
            ['title' => "What is the sum of 10 and 9?", 'status' => 1, 'category_id' => $addition->id],
          );
          Answer::insert(
            [
              ['description' => 15, 'is_correct' => 0, 'question_id' => $aq4->id],
              ['description' => 19, 'is_correct' => 1, 'question_id' => $aq4->id],
              ['description' => 16, 'is_correct' => 0, 'question_id' => $aq4->id],
              ['description' => 14, 'is_correct' => 0, 'question_id' => $aq4->id],
            ]
          );
        }

        $subtraction = Category::where('name', 'Subtraction')->first('id');
        if($subtraction){
          $sq1 = Question::create(
            ['title' => "What we will have when 8 is subtracted from 17?", 'status' => 1, 'category_id' => $subtraction->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $sq1->id],
              ['description' => 9, 'is_correct' => 1, 'question_id' => $sq1->id],
              ['description' => 3, 'is_correct' => 0, 'question_id' => $sq1->id],
              ['description' => 2, 'is_correct' => 0, 'question_id' => $sq1->id],
            ]
          );

          $sq2 = Question::create(
            ['title' => "What we will have when 3 is subtracted from 11?", 'status' => 1, 'category_id' => $subtraction->id],
          );
          Answer::insert(
            [
              ['description' => 9, 'is_correct' => 0, 'question_id' => $sq2->id],
              ['description' => 8, 'is_correct' => 1, 'question_id' => $sq2->id],
              ['description' => 7, 'is_correct' => 0, 'question_id' => $sq2->id],
              ['description' => 10, 'is_correct' => 0, 'question_id' => $sq2->id],
            ]
          );

          $sq3 = Question::create(
            ['title' => "What we will have when 6 is subtracted from 13?", 'status' => 1, 'category_id' => $subtraction->id],
          );
          Answer::insert(
            [
              ['description' => 5, 'is_correct' => 0, 'question_id' => $sq3->id],
              ['description' => 7, 'is_correct' => 1, 'question_id' => $sq3->id],
              ['description' => 9, 'is_correct' => 0, 'question_id' => $sq3->id],
              ['description' => 4, 'is_correct' => 0, 'question_id' => $sq3->id],
            ]
          );

          $sq4 = Question::create(
            ['title' => "What we will have when 11 is subtracted from 22?", 'status' => 1, 'category_id' => $subtraction->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $sq4->id],
              ['description' => 11, 'is_correct' => 1, 'question_id' => $sq4->id],
              ['description' => 9, 'is_correct' => 0, 'question_id' => $sq4->id],
              ['description' => 12, 'is_correct' => 0, 'question_id' => $sq4->id],
            ]
          );
        }

        $multiplication = Category::where('name', 'Multiplication')->first('id');
        if($multiplication){
          $mq1 = Question::create(
            ['title' => "What is 3 times 4?", 'status' => 1, 'category_id' => $multiplication->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $mq1->id],
              ['description' => 12, 'is_correct' => 1, 'question_id' => $mq1->id],
              ['description' => 9, 'is_correct' => 0, 'question_id' => $mq1->id],
              ['description' => 13, 'is_correct' => 0, 'question_id' => $mq1->id],
            ]
          );

          $mq2 = Question::create(
            ['title' => "What is 5 times 5?", 'status' => 1, 'category_id' => $multiplication->id],
          );
          Answer::insert(
            [
              ['description' => 22, 'is_correct' => 0, 'question_id' => $mq2->id],
              ['description' => 25, 'is_correct' => 1, 'question_id' => $mq2->id],
              ['description' => 23, 'is_correct' => 0, 'question_id' => $mq2->id],
              ['description' => 27, 'is_correct' => 0, 'question_id' => $mq2->id],
            ]
          );

          $mq3 = Question::create(
            ['title' => "What is 6 times 7?", 'status' => 1, 'category_id' => $multiplication->id],
          );
          Answer::insert(
            [
              ['description' => 40, 'is_correct' => 0, 'question_id' => $mq3->id],
              ['description' => 42, 'is_correct' => 1, 'question_id' => $mq3->id],
              ['description' => 43, 'is_correct' => 0, 'question_id' => $mq3->id],
              ['description' => 48, 'is_correct' => 0, 'question_id' => $mq3->id],
            ]
          );

          $mq4 = Question::create(
            ['title' => "What is 4 times 4?", 'status' => 1, 'category_id' => $multiplication->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $mq4->id],
              ['description' => 16, 'is_correct' => 1, 'question_id' => $mq4->id],
              ['description' => 12, 'is_correct' => 0, 'question_id' => $mq4->id],
              ['description' => 18, 'is_correct' => 0, 'question_id' => $mq4->id],
            ]
          );
        }

        $division = Category::where('name', 'Division')->first('id');
        if($division){
          $dq1 = Question::create(
            ['title' => "35 divided by 7 equals to?", 'status' => 1, 'category_id' => $division->id],
          );
          Answer::insert(
            [
              ['description' => 4, 'is_correct' => 0, 'question_id' => $dq1->id],
              ['description' => 5, 'is_correct' => 1, 'question_id' => $dq1->id],
              ['description' => 6, 'is_correct' => 0, 'question_id' => $dq1->id],
              ['description' => 7, 'is_correct' => 0, 'question_id' => $dq1->id],
            ]
          );

          $dq2 = Question::create(
            ['title' => "25 divided by 5 equals to?", 'status' => 1, 'category_id' => $division->id],
          );
          Answer::insert(
            [
              ['description' => 4, 'is_correct' => 0, 'question_id' => $dq2->id],
              ['description' => 5, 'is_correct' => 1, 'question_id' => $dq2->id],
              ['description' => 6, 'is_correct' => 0, 'question_id' => $dq2->id],
              ['description' => 7, 'is_correct' => 0, 'question_id' => $dq2->id],
            ]
          );

          $dq3 = Question::create(
            ['title' => "42 divided by 7 equals to?", 'status' => 1, 'category_id' => $division->id],
          );
          Answer::insert(
            [
              ['description' => 5, 'is_correct' => 0, 'question_id' => $dq3->id],
              ['description' => 6, 'is_correct' => 1, 'question_id' => $dq3->id],
              ['description' => 7, 'is_correct' => 0, 'question_id' => $dq3->id],
              ['description' => 4, 'is_correct' => 0, 'question_id' => $dq3->id],
            ]
          );

          $dq4 = Question::create(
            ['title' => "81 divided by 9 equals to?", 'status' => 1, 'category_id' => $division->id],
          );
          Answer::insert(
            [
              ['description' => 10, 'is_correct' => 0, 'question_id' => $dq4->id],
              ['description' => 9, 'is_correct' => 1, 'question_id' => $dq4->id],
              ['description' => 8, 'is_correct' => 0, 'question_id' => $dq4->id],
              ['description' => 7, 'is_correct' => 0, 'question_id' => $dq4->id],
            ]
          );
        }
    }
}
