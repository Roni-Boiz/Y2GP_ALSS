const cacheName = 'alss';
var filesToCache = [
    './',

    './public/index.php',
    './main.js',
    './manifest.json',
    './favicon.ico',

    './app/init.php',
    './app/core/app.php',
    './app/core/controller.php',
    './app/core/model.php',
    './app/core/view.php',

    './public/img/21.jpg',
    './public/img/bg_3.jpg',
    './public/img/1.jpg',
    './public/img/image.png',
    './public/js/login.js',

    //'./public/css/body.css',
    './app/views/homeView.php',
    './app/views/loginView.php'
];

self.addEventListener('install', async e => {
    const cache = await caches.open(cacheName);
    await cache.addAll(filesToCache);
    return self.skipWaiting();
});

self.addEventListener('activate', e => {
    self.clients.claim();
});

self.addEventListener('fetch', async e => {
    const req = e.request;
    const url = new URL(req.url)

    if(url.origin === location.origin){
        e.respondWith(cacheFirst(req));
    } else {
        e.respondWith(networkAndCache(req));
    }
});

async function cacheFirst(req) {
    const cache = await caches.open(cacheName);
    const cached = await cache.match(req);
    return cached || fetch(req);
} 

async function networkAndCache(req){
    const cache = await caches.open(cacheName);
    try{
        const fresh = await fetch(req);
        await cache.put(req, fresh.clone());
        return clone;
    }catch(e){
        const cached = await cache.match(req);
        return cached;
    }
}