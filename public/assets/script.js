const message = document.querySelector(".message-wrapper");
const messageClose = document.querySelector(".message__close");


if (message) {
    setTimeout(() => {
        message.style.display = "none";
    }, 5000)
    messageClose.addEventListener("click", () => {
        message.style.display = "none";
    })
}