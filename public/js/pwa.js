// SW initializing ------------------------
if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("/sw.js")
        .then(function (res) { console.log("SW installed..."); })
        .catch(function (e) { console.log(e.message); });
}
//---------------------------



// online status management-------------------
if (!navigator.onLine && !window.location.href.includes("/offline")) window.location.replace("/offline")

window.addEventListener("offline", () => {
    console.log("off");
    window.location.replace("/offline")
})
window.addEventListener("online", () => {
    window.location.replace("/")
})
//   -----------------------------




// install prompt-------------
var deferredPrompt;
window.addEventListener("beforeinstallprompt", (e) => {
    if (!window.matchMedia("(display-mode: standalone)").matches) {
        setTimeout(() => {
            document.getElementById("install-prompt")?.classList.add("show");
        }, 5000);
    }
    e.preventDefault();
    deferredPrompt = e;
    return false;
});
document.getElementById("install-prompt")?.addEventListener("click", (e) => {
    if (deferredPrompt) {
        deferredPrompt.prompt();
        e.target.classList.remove("show");
        deferredPrompt.userChoice.then((choiceRes) => {
            console.log(choiceRes.outcome);
            if (choiceRes.outcome === "accepted") {
                console.log("User accepted the install prompt.");
            } else if (choiceRes.outcome === "dismissed") {
                console.log("User dismissed the install prompt");
            }
        });
        deferredPrompt = null;
    }
});

document.getElementById("close-install-prompt")?.addEventListener("click", (e) => {
    e.stopPropagation()
    document.getElementById("install-prompt").classList.remove("show")
});
//---------------------------------------


// Check browser------------------
navigator.sayswho = () => {
    var N = Navigator.appName, ua = navigator.userAgent, tem,
        M = ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*([\d\.]+)/i);
    if (M && (tem = ua.match(/version\/([\.\d]+)/i)) != null) M[2] = tem[1];
    M = M ? [M[1], M[2]] : [N, Navigator.appVersion, '-?'];
    return M.join(' ');
};
if (!navigator.sayswho().includes("Chrome")) handleToastify("بهتره که از مرورگر کروم استفاده کنید", "warning")
//---------------------------------
