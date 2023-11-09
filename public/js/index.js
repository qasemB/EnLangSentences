document.getElementById("typing_input").addEventListener("focusin", () => {
    document.getElementById("typing_box").classList.add("is_blur")
})
document.getElementById("typing_input").addEventListener("focusout", () => {
    document.getElementById("typing_box").classList.remove("is_blur")
})

handleSpeechRecord("typing_input", "speech_record_btn", "speech_record_btn_box", "typing_box")

document.getElementById("typing_input").addEventListener("blur", ()=>{
    handleOnChangeAnswerInput("typing_input", "typing_box")
})

document.getElementById("typing_input").addEventListener("keydown", ()=>{
    Livewire.dispatch("reset-score")
})
