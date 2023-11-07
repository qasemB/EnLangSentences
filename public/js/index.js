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

// convert speech to text --------------------------------------------------------
// Check if the browser supports the SpeechRecognition API
if (('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) && document.getElementById('typing_input')) {
    // Create a new instance of the SpeechRecognition object
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

    // Set the language for speech recognition
    recognition.lang = 'en-US';
    // recognition.lang = 'fa';


    // Set the continuous property to true for continuous speech recognition
    recognition.continuous = true;

    // Define the event handler for the 'result' event
    recognition.onresult = function (event) {
        const result = event.results[event.results.length - 1][0].transcript;
        if (result.includes("clean clean")) {
            document.getElementById('typing_input').value = ""
        }else{
            document.getElementById('typing_input').value += result;

            const enteredValue = document.getElementById('typing_input').value.trim().toLowerCase()
            const patternValue = document.getElementById("typing_box").innerHTML.replaceAll(`<span class="text_pink">`,"").replaceAll(`</span>`, "").trim().toLowerCase()

            if (enteredValue == patternValue ) {
                document.getElementById('typing_input').classList.add("text-success")
                document.getElementById('typing_input').blur()
            }else{
                document.getElementById('typing_input').classList.add("text-danger")
            }


        }
    };

    // Define the event handler for the 'error' event
    recognition.onerror = function (event) {
        console.error('Speech recognition error:', event.error);
    };

    // Define the event handler for the 'end' event
    recognition.onend = function () {
        console.log('Speech recognition ended');
    };

    // Add a click event listener to the record button
    document.getElementById('typing_input').addEventListener('focus', function () {
        recognition.start();
    });

    // Add a click event listener to the record button
    document.getElementById('typing_input').addEventListener('blur', function () {
        recognition.stop();
    });
} else {
    alert('Speech recognition not supported')
    console.error('Speech recognition not supported');
}
