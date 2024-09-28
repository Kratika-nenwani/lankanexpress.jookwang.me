// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js')
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js')
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyB18nzup6fPr4ZiPOeuINS5XKRmgvaMKlc",
    authDomain: "notification-a622c.firebaseapp.com",
    projectId: "notification-a622c",
    storageBucket: "notification-a622c.appspot.com",
    messagingSenderId: "531863922333",
    appId: "1:531863922333:web:7235be091a6335be9f9674",
    measurementId: "G-J8R2P0X32F"
})

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging()
messaging.setBackgroundMessageHandler(function (payload) {
    console.log('Message received.', payload)
    const title = 'Hello world is awesome'
    const options = {
        body: 'Your notificaiton message .',
        icon: '/firebase-logo.png'
    }
    return self.registration.showNotification(title, options)
})