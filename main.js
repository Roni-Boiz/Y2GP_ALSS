window.onload = () => {
    registerSW();
}

async function registerSW(){
    'use strict';
    if('serviceWorker' in navigator){
        try{
            await navigator.serviceWorker.register('../../sw.js').then(() => console.log("registered service worker!"));
        }catch(e){
            console.log('SW Registration failed');
        }
    }
}