self.addEventListener("install", event => {
  event.waitUntil(
    caches.open("app-print-cache").then(cache => {
      return cache.addAll([
        "index.html",
        "manifest.json",
         "img/logo.png",
        "img/logo-192.png",
        "img/logo-512.png",
        "img/cintia.png",
        "img/down-arrow-button.png",
        "img/favicon.png",
        "img/download.png",
        "img/images.jpg",
        "img/italo.jpg",
        "img/joao.jpg",
        "img/kauan.jpg",
        "img/mateus.jpg",
        "img/stefany.jpg"
      ]);
    })
  );
});

self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request).then(response => response || fetch(event.request))
  );
});
