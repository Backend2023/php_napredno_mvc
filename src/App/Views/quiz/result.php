<h1 class="title"><?php echo $quiz->title; ?></h1>
<p class="description"><?php echo $quiz->description; ?></p>
<div class="quiz__result question__card">
    <?php

    echo "<h3>Tvoj rezultat: $rightAnswers/$totalQuestions - " . round($rightAnswers / $totalQuestions, 2) * 100 . "% </h3>";
    ?>
</div>

<form class="quiz__result__form">

    <?php
    foreach ($questions as $question) {
    ?>

        <fieldset class="question__card">
            <legend><?php echo htmlentities($question->question); ?></legend>
            <?php
            $correctAnswers = $question->answers;
            foreach ($correctAnswers as $k => $v) {
            ?>
                <div>
                    <label class="<?php
                                    if ($answers["$question->id"] == $k) {
                                        echo "selected ";
                                        if ($answers["$question->id"] != $question->correctAnswer) {
                                            echo "wrong";
                                        }
                                    }
                                    if ($k == $question->correctAnswer) {
                                        echo "correct";
                                    }
                                    ?>">
                        <input disabled <?php if ($answers["$question->id"] == $k) {
                                            echo "checked";
                                        } ?> type="radio" name="question-<?php echo $question->id; ?>" value="<?php echo $k; ?>" />
                        <div class="question__answer">
                            <span>
                                <?php echo htmlentities($v); ?>
                            </span>
                            <?php

                            if ($answers["$question->id"] == $k && $k != $question->correctAnswer) {
                                echo "<span>Tvoj odgovor</span>";
                            }
                            if ($k == $question->correctAnswer && $answers["$question->id"] != $k) {
                                echo "<span>Točan odgovor</span>";
                            }


                            ?>
                        </div class="question__answer">
                    </label>
                </div>
            <?php
            }
            ?>
        </fieldset>

    <?php
    }
    ?>


</form>

<a class="quiz__retake" href="/quiz/<?php echo $quiz->id; ?>">

    <svg class="quiz__retake__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
    </svg>
    <span>
        Ponovi Quiz
    </span></a>