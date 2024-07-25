<?php

namespace App\Http\Controllers\site\tests;

use App\Helper\GetScore5Factors;
use App\Helper\GetSecondScore5Factors;
use App\Http\Controllers\Controller;
use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Score;
use App\Models\Test;
use App\Models\User;
use App\Models\UserFiveFactorTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class siteTestController extends Controller
{
    public function index()
    {
        $test_info = Test::query()
            ->paginate(4);
        return view('site.tests.index', compact('test_info'));
    }

    public function test_detail($test_id)
    {
        $test_info = Test::query()
            ->where('id', $test_id)
            ->first();

        return view('site.tests.post_detail', compact('test_info'));
    }

    public function five_factor_test($test_id)
    {
        $test_info = Test::query()
            ->where('id', $test_id)
            ->first();

        $five_factor_info = Question::query()
            ->get();

        return view('site.tests.five_factor_test', compact('five_factor_info', 'test_info'));
    }

    public function test_user_register(Request $request)
    {
        $input = $request->all();

        $validation = Validator::make($input, [
            'first_name' => "required|string|max:255",
            'last_name' => "required|string|max:255",
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validation->errors()->first(),
            ]);
        }

        $user_info = User::query()
            ->where('mobile', $input['mobile'])
            ->first();


        if (!$user_info) {
            $user_info = User::query()->create([
                'first_name' => $input['first_name'],
                'mobile' => $input['mobile'],
                'last_name' => $input['last_name'],
                'password' =>  password_hash($input['mobile'],PASSWORD_DEFAULT) ,
                'email' => $input['mobile']

            ]);


            Auth::attempt(['email' => $user_info['mobile'], 'password' => $user_info['mobile']]);
                // اگر لاگین با موفقیت انجام شود

            return response()->json([
                'error' => false,
                'user_id' => $user_info['id'],
            ]);
        } else {
            Auth::attempt(['email' => $user_info['mobile'], 'password' => $user_info['mobile']]);

            return response()->json([
                'error' => false,
                'user_id' => $user_info['id'],
            ]);
        }

    }

    function submitFiveFactorTest(Request $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $user_id = $user['id'];

        foreach ($input['answers'] as $item)
        {
            AnswerQuestion::query()->create([
               'user_id' => $user_id ,
               'question_id' => $item['question_id'] ,
               'answer_id' => $item['answer'] ,
            ]);
        }

        $recordIds = [2, 6, 8, 9,12,18,21,23,24,27,31,34,35,37,41,43];
        $recordIds2 = [1,3,4,5,7,10,11,13,14,15,16,17,19,20,22,25,26,28,29,30,32,33,36,38,39,40,42,44];

        $recordsToUpdate = AnswerQuestion::whereIn('id', $recordIds)->get();
        $recordsToUpdate2 = AnswerQuestion::whereIn('id', $recordIds2)->get();

        foreach ($recordsToUpdate as $item2){
            $answer_question_info = AnswerQuestion::query()
                ->where('id' , $item2['id'])
                ->first();

            $answer_question_info->update([
                'score' => GetSecondScore5Factors::get_second_score_5_factors($answer_question_info['answer_id'])
            ]);
        }

        $score = 0 ;
        foreach ($recordsToUpdate as $item3)
        {
            $score = $item3['score'] + $score ;
        }



        foreach ($recordsToUpdate2 as $item2){
            $answer_question_info = AnswerQuestion::query()
                ->where('id' , $item2['id'])
                ->first();

            $answer_question_info->update([
                'score' => GetScore5Factors::get_score_5_factors($answer_question_info['answer_id'])
            ]);
        }

        //boroon garaei

        $record_extroversion = [1,6,11,16,21,26,31,36];
        $record_extroversion_to_Update = AnswerQuestion::whereIn('question_id', $record_extroversion)->get();

        //tavafog pziri
        $record_agreeableness = [2,7,12,17,22,27,32,37,42];
        $record_agreeableness_to_Update = AnswerQuestion::whereIn('question_id', $record_agreeableness)->get();

        //vejdan
        $record_conscience = [3,8,13,18,23,28,33,38,43];
        $record_conscience_to_Update = AnswerQuestion::whereIn('question_id', $record_conscience)->get();

        //ravan ranjoori
        $record_neurosis = [4,9,14,19,24,29,34,39];
        $record_neurosis_to_Update = AnswerQuestion::whereIn('question_id', $record_neurosis)->get();

        //baz boodan
        $record_open = [5,10,15,20,25,30,35,40,41,44];
        $record_open_to_Update = AnswerQuestion::whereIn('question_id', $record_open)->get();


        // zakhoreye emtiaze  boroon garaei
        $extroversion_score = 0 ;
        foreach ($record_extroversion_to_Update as $extroversion_Update){
            $extroversion_score = $extroversion_Update['score'] + $extroversion_score;
        }
        Score::query()->create([
            'user_id' => $user_id ,
            'character_id' => 1 ,
            'score' => $extroversion_score ,
        ]);

        // zakhoreye emtiaze  boroon garaei


        // zakhoreye emtiaze  tavafog pziri
        $agreeableness_score = 0 ;
        foreach ($record_agreeableness_to_Update as $agreeableness_Update){
            $agreeableness_score = $agreeableness_Update['score'] + $agreeableness_score;
        }
        Score::query()->create([
            'user_id' => $user_id ,
            'character_id' => 2 ,
            'score' => $agreeableness_score ,
        ]);
        // zakhoreye emtiaze  tavafog pziri


        // zakhoreye emtiaze  vejdan
        $conscience_score = 0 ;
        foreach ($record_conscience_to_Update as $conscience_Update){
            $conscience_score = $conscience_Update['score'] + $conscience_score;
        }
        Score::query()->create([
            'user_id' => $user_id ,
            'character_id' => 3 ,
            'score' => $conscience_score ,
        ]);
        // zakhoreye emtiaze  vejdan


        // zakhoreye emtiaze  ravan ranjoori
        $neurosis_score = 0 ;
        foreach ($record_neurosis_to_Update as $neurosis_Update){
            $neurosis_score = $neurosis_Update['score'] + $neurosis_score;
        }
        Score::query()->create([
            'user_id' => $user_id ,
            'character_id' => 4 ,
            'score' => $neurosis_score ,
        ]);
        // zakhoreye emtiaze  ravan ranjoori


        // zakhoreye emtiaze  baz boodan
        $open = 0 ;
        foreach ($record_open_to_Update as $open_Update){
            $open = $open_Update['score'] + $open;
        }
        Score::query()->create([
            'user_id' => $user_id ,
            'character_id' => 5 ,
            'score' => $open ,
        ]);
        // zakhoreye emtiaze  baz boodan





    }
}
