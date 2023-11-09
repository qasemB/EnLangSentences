

document.addEventListener("DOMContentLoaded", (event) => {

    // tooltip initializing------------------------
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


});
// toastify firing function --------------------------
var handleToastify = (message, type) => {
    Toastify({
        text: message,
        className: "alert-success",
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        style: {
            background:
                type == "success"
                    ? "linear-gradient(to right, #00b09b, #96c93d)"
                    : type == "warning"
                        ? "linear-gradient(to right, #FF9800, #c4a808)"
                        : "linear-gradient(to right, #ff0000, #E91E63)",
        },
    }).showToast();
}

// handle typing function --------------
var handleTypeWriter = (text, boxId) => {
    var i = 0;
    var txt = text;
    var speed = 50;
    let withColor = false
    setTimeout(()=>typeWriter(), 500)
    function typeWriter() {
        if (i < txt.length) {
            const letter = txt.charAt(i)
            if (letter == "+") {
                withColor = !withColor
            } else {
                if (withColor) {
                    document.getElementById(boxId).innerHTML += `<span class="text_pink">${letter}</span>`;
                } else {
                    document.getElementById(boxId).innerHTML += letter;
                }
            }
            i++;
            setTimeout(typeWriter, speed);
        }
    }
}

var handleOnChangeAnswerInput = (inputId, patternElemId, bySpeech=false) => {
    const enteredValue = document.getElementById(inputId).value.trim().toLowerCase()
    const patternValue = document.getElementById(patternElemId).innerHTML.replaceAll(`<span class="text_pink">`, "").replaceAll(`</span>`, "").trim().toLowerCase()
    if (enteredValue == patternValue) {
        document.getElementById(inputId).classList.add("text-success")
        document.getElementById(inputId).classList.remove("text-danger")
        handleToastify("به درستی انجام شد", "success")
        Livewire.dispatch("increase-score-res", {ok:true, bySpeech, byWrite: !bySpeech})
    } else {
        document.getElementById(inputId).classList.remove("text-success")
        document.getElementById(inputId).classList.add("text-danger")
    }
}

var handleSpeechRecord = (inputId, speechBtnId, btnBoxId, patternElemId) => {
    if (('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) && document.getElementById(speechBtnId) && document.getElementById(inputId)) {
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        // recognition.lang = 'fa';

        // Set the continuous property to true for continuous speech recognition
        recognition.continuous = true;

        // Define the event handler for the 'result' event
        recognition.onresult = function (event) {
            const result = event.results[event.results.length - 1][0].transcript;
            if (result.includes("clean clean")) {
                document.getElementById(inputId).value = ""
            } else {
                document.getElementById(inputId).value += result;
                handleOnChangeAnswerInput(inputId, patternElemId, true)
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


        const startSpeech = ()=>{
            Livewire.dispatch("reset-score")
            document.getElementById(btnBoxId).classList.add("holded")
            document.getElementById(patternElemId).classList.add("is_blur")
            navigator.vibrate(50);
            recognition.start();
        }

        const endSpeech = ()=>{
            document.getElementById(btnBoxId).classList.remove("holded")
            document.getElementById(patternElemId).classList.remove("is_blur")
            recognition.stop();
        }

        document.getElementById(speechBtnId).addEventListener("mousedown", startSpeech);
        document.getElementById(speechBtnId).addEventListener("touchstart", startSpeech);

        document.addEventListener("mouseup", endSpeech);
        document.addEventListener("touchend", endSpeech);

        // // Add a click event listener to the record button
        // document.getElementById('typing_input').addEventListener('focus', function () {
        //     navigator.vibrate(50);
        //     recognition.start();
        // });

        // // Add a click event listener to the record button
        // document.getElementById('typing_input').addEventListener('blur', function () {
        //     recognition.stop();
        // });
    } else {
        alert('Speech recognition not supported')
        console.error('Speech recognition not supported');
    }

}


document.addEventListener('livewire:initialized', () => {
    Livewire.on('fire-toastify', ([message, type]) => {
        handleToastify(message, type)
    });

    Livewire.on('typing-one-sentence', ([data, boxId]) => {
        handleTypeWriter(data.sentence, boxId)
    });

    Livewire.on('submit-and-next-sentence', () => {
        document.getElementById("typing_input").value = ""
    });
});



