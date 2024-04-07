<?php

namespace App\Models;

use Framework\Database;

class Question
{

    public function __construct(public string $question, public array $answers, public string $correctAnswer, public int $quizId, public ?int $id = null)
    {
    }

    public static function store($new)
    {
        $question = $new->question;
        $answers = json_encode($new->answers);
        $correctAnswer = $new->correctAnswer;
        $quizId = $new->quizId;

        $db = Database::get();
        $stmt = $db->prepare("INSERT INTO question (question, answers, correct_answer, quiz_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sssi', $question, $answers, $correctAnswer, $quizId);
        $res = $stmt->execute();

        if ($res) {
            $new->id = $db->insert_id;
        }
        return $new;
    }

    public static function update($new)
    {
        $question = $new->question;
        $answers = json_encode($new->answers);
        $correctAnswer = $new->correctAnswer;
        $quizId = $new->quizId;
        $questionId = $new->id;

        $db = Database::get();
        $stmt = $db->prepare("UPDATE question SET question=?, answers=?, correct_answer=?, quiz_id=? WHERE id=?");
        $stmt->bind_param('sssii', $question, $answers, $correctAnswer, $quizId, $questionId);
        $res = $stmt->execute();
        return $new;
    }

    public static function getAllByQuizId($id)
    {
        $db = Database::get();
        $res = $db->query("SELECT * FROM question WHERE quiz_id=$id");
        $resArr = $res->fetch_all(MYSQLI_ASSOC);
        $questionsArray = [];

        foreach ($resArr as $question) {
            $questionsArray[] = new self($question['question'], json_decode($question['answers'], true), $question['correct_answer'], $question['quiz_id'], $question['id']);
        }

        return $questionsArray;
    }

    public static function storeAll(array $questionsArray): array
    {
        foreach ($questionsArray as $question) {
            $question = self::store($question);
        }

        return $questionsArray;
    }

    public static function updateAll(array $questionsArray): array
    {
        foreach ($questionsArray as $question) {
            if ($question->id) {
                $question = self::update($question);
            } else {
                $question = self::store($question);
            }
        }

        return $questionsArray;
    }
}
