<?php

namespace App\Models;

use Framework\Database;

class Quiz
{

    public function __construct(public $title, public $description, public ?int $id = null)
    {
    }

    public static function store(self $quiz): self
    {
        $title = $quiz->title;
        $description = $quiz->description;

        $db = Database::get();
        $stmt = $db->prepare("INSERT INTO quiz (title, description) VALUES (?, ?)");
        $stmt->bind_param('ss', $title, $description);
        $res = $stmt->execute();
        if ($res) {
            $quiz->id = $db->insert_id;
        }
        return $quiz;
    }


    public static function update(self $quiz): self
    {
        $title = $quiz->title;
        $description = $quiz->description;

        if (!$quiz->id) {
            return self::store($quiz);
        }

        $id = $quiz->id;
        $db = Database::get();
        $stmt = $db->prepare("UPDATE quiz SET title=?, description=? WHERE id=?");
        $stmt->bind_param('ssi', $title, $description, $id);
        $res = $stmt->execute();
        return $quiz;
    }

    public static function deleteById(int $id): bool
    {

        $db = Database::get();
        $res = $db->query("DELETE FROM quiz WHERE id=$id");
        return $res;
    }


    public static function getAll(): array
    {
        $db = Database::get();
        $res = $db->query("SELECT * FROM quiz");
        $arr = $res->fetch_all(MYSQLI_ASSOC);

        $objArray = [];

        foreach ($arr as $o) {
            $objArray[] = new self($o['title'], $o['description'], $o['id']);
        }
        return $objArray;
    }

    public static function getById($id): self
    {
        $db = Database::get();
        $res = $db->query("SELECT * FROM quiz WHERE id=$id");
        $data = $res->fetch_assoc();
        return new self($data['title'], $data['description'], $data['id']);
    }
}
