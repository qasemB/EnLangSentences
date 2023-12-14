
// tooltip initializing------------------------
document.addEventListener("DOMContentLoaded", (event) => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});
//-------------------------------



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
var handleTypeWriter = (text, boxId, isTranslated= false) => {
    document.getElementById(boxId).innerHTML = ""
    var i = 0;
    var txt = text;
    var speed = 50;
    let withColor = false
    setTimeout(() => typeWriter(), 500)
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
        }else{
            if (isTranslated) {
                handleTranslate("typing_box")
            }
        }
    }
}

let timeout;
var handleOnChangeAnswerInput = (inputId, patternElemId, bySpeech = false) => {
    let i = 0
    document.getElementById("answer_box").innerHTML = ""
    const enteredValue = document.getElementById(inputId).value.trim().toLowerCase()
    const patternValue = document.getElementById(patternElemId).innerHTML.replaceAll(`<span class="text_pink">`, "").replaceAll(`</span>`, "").trim().toLowerCase()
    const trimedPatternValue = patternValue.replaceAll(/[^a-zA-Z \s]/g, '')
    const trimedPatternValueArr = trimedPatternValue.split(" ")

    const enteredValuesArr = enteredValue.split(" ")

    for (const enteredVal of enteredValuesArr) {
        let trimEnteredVal = enteredVal.replaceAll(/[^a-zA-Z]/g, '').trim()
        var spanElement = document.createElement("span");
        spanElement.textContent = enteredVal;
        if (trimedPatternValueArr.includes(trimEnteredVal)) {
            spanElement.classList.add("text_green");
            i++
        }else{
            spanElement.classList.add("text_danger");
            // newEnteredVal = newEnteredVal.replaceAll(enteredVal, `<span class="text_danger">${enteredVal}</span>`)
        }
        document.getElementById("answer_box").appendChild(spanElement)
        document.getElementById("answer_box").innerHTML+= " "
    }
    if (timeout) clearTimeout(timeout)
    timeout = setTimeout(()=>{
        Livewire.dispatch("increase-score-res", { ok: i, bySpeech, byWrite: !bySpeech })
    },2000)
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
            console.log(result);
            if (result.includes("clean clean")) {
                document.getElementById(inputId).value = ""
                document.getElementById("answer_box").innerHTML = ""
            } else {
                document.getElementById(inputId).value += " " + result;
                document.getElementById(inputId).value = document.getElementById(inputId).value.trim()
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


        const startSpeech = () => {
            Livewire.dispatch("reset-score")
            document.getElementById(btnBoxId).classList.add("holded")
            document.getElementById(patternElemId).classList.add("is_blur")
            navigator.vibrate(50);
            recognition.start();
        }

        const endSpeech = () => {
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

let transLateTimeOut;
var handleTranslate = (patternElemId)=>{
    if (transLateTimeOut) clearTimeout(transLateTimeOut)
    const str = document.getElementById(patternElemId).innerHTML.replaceAll(`<span class="text_pink">`, "").replaceAll(`</span>`, "").trim().toLowerCase()
    loading(true)
    fetch(
        `https://one-api.ir/translate/?token=576329:651ea8266c711&action=google&lang=fa&q=${str}`
    )
        .then(res => {
            if (res.status == 200) {
                return res.json()
            }else{
                handleToastify("نشد...! دوباره تلاش کن")
            }
        })
        .then(res => {
            if (res.status == 200) {
                document.getElementById("translation_box").innerHTML = res.result
                // transLateTimeOut = setTimeout(()=>{
                    // document.getElementById("translation_box").innerHTML = ""
                // },10000)
            }
        })
        .finally(()=>{
            loading(false)
        })

}

var handleStartSpeack = (patternElemId)=>{
    loading(true)
    const str = document.getElementById(patternElemId).innerHTML
        .replaceAll(`<span class="text_pink">`, "")
        .replaceAll(`</span>`, "")
        .replaceAll(/[^a-zA-Z \s]/g, '')
        .trim().toLowerCase()

    // fetch(`https://one-api.ir/tts/?token=134476:655f6ffad59e6&action=microsoft&lang=en-US&q=${str}`)
    fetch(`https://one-api.ir/tts/?action=google&token=134476:655f6ffad59e6&lang=en-US&q=${str}`)
    // fetch(`https://one-api.ir/tts/?action=google&token=576329:651ea8266c711&lang=en-US&q=${str}`)
        .then(response => {
            console.log(response);
            return response.blob()
        })
        .then(blob => {
            // Create an audio element
            const audio = new Audio();
            audio.src = URL.createObjectURL(blob);
            audio.play();

            // const formData = new FormData();
            // formData.append('audio', blob, 'audio.wav');
            // fetch('your-server-endpoint', {
            //     method: 'POST',
            //     body: formData
            // })
            //     .then(response => {
            //         // Handle the server response
            //     })
            //     .catch(error => {
            //         // Handle any errors
            //     });
        })
        .finally(() => {
            loading(false)
        })


}

var loading = (status)=>{
    Livewire.dispatch("handle-set-loading", {status})
}

document.addEventListener('livewire:initialized', () => {
    Livewire.on('fire-toastify', ([message, type]) => {
        handleToastify(message, type)
    });

    Livewire.on('typing-one-sentence', ([data, boxId, isTranslated]) => {
        handleTypeWriter(data.sentence, boxId, isTranslated)
    });

    Livewire.on('submit-and-next-sentence', () => {
        document.getElementById("typing_input").value = ""
        document.getElementById("answer_box").innerHTML = ""
        document.getElementById("translation_box").innerHTML = ""
    });
});


        // // Create an AudioContext
        // const audioContext = new AudioContext();

        // // Fetch the audio stream
        // fetch(`https://one-api.ir/tts/?token=134476:655f6ffad59e6&action=microsoft&lang=en-US&q=${str}`)
        //     .then(response => response.arrayBuffer())
        //     .then(arrayBuffer => audioContext.decodeAudioData(arrayBuffer))
        //     .then(audioBuffer => {
        //         // Create a source node
        //         const source = audioContext.createBufferSource();
        //         source.buffer = audioBuffer;

        //         // Connect the source node to the destination (i.e., speakers)
        //         source.connect(audioContext.destination);

        //         // Start playing the audio
        //         source.start();
        //     })
        //     .catch(error => {
        //         console.error('Error fetching or decoding audio stream:', error);
        //     })
        //     .finally(()=>{
        //         loading(false)
        //     })


