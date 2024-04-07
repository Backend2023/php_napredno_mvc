<?php

namespace App\Controllers;

use App\Models\Question;
use Framework\View;
use App\Models\Quiz;
use Framework\Router;

class QuizController
{
    static function index()
    {
        $quizzes = Quiz::getAll();
        return View::render('quiz/index', ["quizzes" => $quizzes]);
    }
    static function show($id)
    {
        $quiz = Quiz::getById($id);
        $questions = Question::getAllByQuizId($id);
        return View::render('quiz/single', ["title" => $quiz->title, "quiz" => $quiz, "questions" => $questions]);
    }

    static function createForm()
    {
        return View::render('quiz/createForm');
    }

    static function create()
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $quiz = new Quiz($title, $description);
        $quiz = Quiz::store($quiz);

        $questionsData = $_POST["questions"];
        $questions = [];

        foreach ($questionsData as $questionData) {
            $questions[] = new Question($questionData["question"], $questionData["answers"], $questionData["correctAnswer"], $quiz->id);
        }

        $questions = Question::storeAll($questions);

        Router::redirect('/quiz/' . $quiz->id, 'Uspješno ste kreirali novi kviz.');
    }

    static function delete($id)
    {
        echo "<h1>S</h1>";
        $res = Quiz::deleteById($id);
        print_r($res);
        if ($res) {
            $message = "Uspješno ste obrisali kviz s ID=$id.";
        } else {
            $message = "Dogodila se greška prilikom brisanja quiz s ID=$id.";
        }

        Router::redirect("/", $message);
    }

    static function editForm($id)
    {
        $questions = Question::getAllByQuizId($id);
        $quiz = Quiz::getById($id);

        return View::render('quiz/editForm', ["questions" => $questions, "quiz" => $quiz]);
    }

    static function edit($id)
    {

        $title = $_POST["title"];
        $description = $_POST["description"];

        $quiz = new Quiz($title, $description, $id);
        $quiz = Quiz::update($quiz);

        $questionsData = $_POST["questions"];
        $questions = [];
        foreach ($questionsData as $questionData) {
            $questions[] = new Question($questionData["question"], $questionData["answers"], $questionData["correctAnswer"], $id, $questionData["id"] ?? null);
        }
        $questions = Question::updateAll($questions);

        Router::redirect("/quiz/$id", 'Uspješno ste izmijenili kviz.');
    }

    static function result($id)
    {
        $quiz = Quiz::getById($id);
        $questions = Question::getAllByQuizId($id);
        $totalQuestions = count($questions);

        $answers = [];
        $rightAnswers = 0;

        foreach ($questions as $question) {
            $answers[$question->id] = $_GET["question-" . $question->id];
            if ($_GET["question-" . $question->id] == $question->correctAnswer) {
                $rightAnswers++;
            }
        }

        return View::render('quiz/result', [
            "questions" => $questions,
            "quiz" => $quiz,
            "totalQuestions" => $totalQuestions,
            "answers" => $answers,
            "rightAnswers" => $rightAnswers
        ]);
    }
}
