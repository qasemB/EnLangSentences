let staticItems = [
    // "/",
    "/bootstrap-5.2.3/css/bootstrap.min.css",
    "/fontawesome-free-6.4.2/css/all.min.css",
    // "/toastify/toastify.css",
    // "/css/style.css",
    // "/js/app.js",
    "/js/pwa.js",
    // "/js/index.js",
    // "/images/logo.png",
    // "/manifest.json",
    // "/bootstrap-5.2.3/js/bootstrap.bundle.min.js",
    // "/toastify/toastify.js",
    "/fonts/fa/Dana-Medium.ttf",
    // "/images/lettersBack.png",
    // "/favicon.ico",
    "/offline",
    "/fontawesome-free-6.4.2/webfonts/fa-solid-900.woff2",
]

let STATIC_CACHE = "static-v1"
// let DYNAMIC_CACHE = "dynamic-v1"


const trimCache = (chachName, max) => {
    caches.open(chachName).then(cache => {
        return cache.keys().then(keys => {
            if (keys.length > max) {
                cache.delete(keys[0]).then(() => {
                    trimCache(chachName, max);
                })
            }
        })
    })
}

// install event -------------------------------------->>
self.addEventListener("install", function (e) {
    e.waitUntil(
        caches.open(STATIC_CACHE).then(cache => {
            cache.addAll(staticItems)
        })
    )
})


// activate event ------------------------------------>>
self.addEventListener("activate", function (e) {
    e.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.map(key => {
                    if (key != STATIC_CACHE && key != DYNAMIC_CACHE) {
                        console.log("Deleting Cache:", key);
                        return caches.delete(key);
                    }
                })
            )
        })
    )
    return self.clients.claim()
})


// fetch event -------------------------------------->>
self.addEventListener("fetch", function (e) {
    e.respondWith(
        caches.match(e.request).then(res => {
            return res || fetch(e.request)
            // .then(fetchRes => {
            //     return caches.open(DYNAMIC_CACHE).then(cache => {
            //         trimCache(DYNAMIC_CACHE, 50)
            //         cache.put(e.request, fetchRes.clone())
            //         return fetchRes
            //     })
            // })
            .catch(err => {
                return caches.open(STATIC_CACHE).then(cache => {
                    if (e.request.headers.get("accept").includes("text/html")) {
                        return cache.match("/offline")
                    }
                })
            })
        })
    )
    // }

})
