 <h1 class="title"><?php echo $quiz->title; ?></h1>
 <p class="description"><?php echo $quiz->description; ?></p>

 <form class="quiz__form" action="/quiz/result/<?php echo $quiz->id; ?>">



     <?php
        foreach ($questions as $question) {

        ?>

         <fieldset class="question__card">
             <legend><?php echo htmlentities($question->question); ?></legend>
             <?php
                $answers = $question->answers;
                foreach ($answers as $key => $answer) {
                ?>
                 <div>
                     <label class="">
                         <input type="radio" required name="question-<?php echo $question->id; ?>" value="<?php echo $key; ?>" />
                         <?php echo htmlentities($answer); ?>
                     </label>
                 </div>
             <?php
                }
                ?>
         </fieldset>

     <?php

        }
        ?>

     <button class="submit" type="submit">

         <span>Pošalji</span>
         <svg class="submit__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
             <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
         </svg>
     </button>

 </form>

 <a class="edit" href="/quiz/edit/<?php echo $quiz->id; ?>">

     <svg class="edit__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
         <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
     </svg>

     <span>Uredi kviz</span>

 </a>