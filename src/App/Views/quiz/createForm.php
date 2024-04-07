<h1 class="title">Kreiraj novi kviz</h1>



<form class="quiz__create" method="post">
    <div class="question__card">
        <label class="input__column">
            Naslov quiza
            <input type="text" name="title" required>
        </label>
        <label class="input__column">
            Opis quiza
            <textarea name="description" required></textarea>
        </label>
    </div>
    <h3>Pitanja</h3>
    <div class="questions">

        <div data-order="0" class="question_group question__card">
            <label class="input__column">Pitanje: <input required type="text" name="questions[0][question]"> </label>

            <label>Odgovori (označi točan odgovor):</label>
            <div class="question__answer">
                <input required type="radio" name="questions[0][correctAnswer]" value="a" />
                <input required type="text" name="questions[0][answers][a]">
            </div>
            <div class="question__answer">
                <input required type="radio" name="questions[0][correctAnswer]" value="b" />
                <input required type="text" name="questions[0][answers][b]">
            </div>
            <div class="question__answer">
                <input required type="radio" name="questions[0][correctAnswer]" value="c" />
                <input required type="text" name="questions[0][answers][c]">
            </div>
            <div class="question__answer">
                <input required type="radio" name="questions[0][correctAnswer]" value="d" />
                <input required type="text" name="questions[0][answers][d]">
            </div>

        </div>
    </div>

    <div class="add" id="addQuestion">
        <svg class="add__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span> Dodaj pitanje</span>

    </div>


    <button class="submit" type="submit">
        <svg class="submit__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
        </svg>
        <span>
            Spremi kviz
        </span>

    </button>

</form>


</body>

<script>
    const addQuestionBtn = document.getElementById("addQuestion");
    let questionGroup = document.querySelectorAll(".question_group");
    let questions = document.querySelector(".questions");

    let counter = questionGroup.length;

    function addQuestionGroup() {
        questionGroup = document.querySelectorAll(".question_group");
        const html = document.createElement("div");


        html.innerHTML = `<div class="question_group question__card" data-order="${counter}">
                <div class="delete" onclick="deleteQuestion(this)">
                    <svg class="delete__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Obriši
                    </span>
                </div>
                <label class="input__column">Pitanje: <input required type="text" name="questions[${counter}][question]"> </label>

                <label>Odgovori (označi točan odgovor):</label>
                <div class="question__answer">
                    <input required type="radio" name="questions[${counter}][correctAnswer]" value="a" />
                    <input required type="text" name="questions[${counter}][answers][a]">
                </div>
                <div class="question__answer">
                    <input required type="radio" name="questions[${counter}][correctAnswer]" value="b" />
                    <input required type="text" name="questions[${counter}][answers][b]">
                </div>
                <div class="question__answer">
                    <input required type="radio" name="questions[${counter}][correctAnswer]" value="c" />
                    <input required type="text" name="questions[${counter}][answers][c]">
                </div>
                <div class="question__answer">
                    <input required type="radio" name="questions[${counter}][correctAnswer]" value="d" />
                    <input required type="text" name="questions[${counter}][answers][d]">
                </div>

            </div>`

        counter++
        console.log(counter)
        questions.appendChild(html.firstChild)


    }

    addQuestionBtn.addEventListener("click", () => {
        addQuestionGroup()
    })

    function deleteQuestion(el) {
        var element = el;
        element.parentNode.remove();
    }
</script>

</html>