var i = 0;
var txt = 'The best way to remember new words is to learn them in +sentences';
var speed = 50;

let withColor = false

function typeWriter() {
    if (i < txt.length) {
        const letter = txt.charAt(i)
        if (letter == "+") {
            withColor = !withColor
        } else {
            if (withColor) {
                document.getElementById("typing_box").innerHTML += `<span class="text_pink">${letter}</span>`;
            } else {
                document.getElementById("typing_box").innerHTML += letter;
            }
        }
        i++;
        setTimeout(typeWriter, speed);
    }
}
setTimeout(() => typeWriter(), 500)
document.getElementById("typing_input").addEventListener("focusin", () => {
    document.getElementById("typing_box").classList.add("is_blur")
})
document.getElementById("typing_input").addEventListener("focusout", () => {
    document.getElementById("typing_box").classList.remove("is_blur")
})
