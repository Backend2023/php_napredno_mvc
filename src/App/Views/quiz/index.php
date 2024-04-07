<h1 class="title">Svi kvizovi</h1>

<div class="list-flex">
    <?php
    foreach ($quizzes as $quiz) {

    ?>
        <a class="card" href="/quiz/<?php echo $quiz->id; ?>">
            <div>
                <h3 class="card__title"><?php echo $quiz->title; ?></h3>
                <p class="card__description"><?php echo $quiz->description; ?></p>
            </div>
        </a>
    <?php
    }
    ?>
</div>