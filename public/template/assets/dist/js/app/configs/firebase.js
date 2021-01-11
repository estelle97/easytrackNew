const firebaseConfig = {
    apiKey: "AIzaSyAC1z8nBR8XVZmdurFURhtkIDcndg0O5v4",
    authDomain: "easytrack-f4121.firebaseapp.com",
    projectId: "easytrack-f4121",
    storageBucket: "easytrack-f4121.appspot.com",
    messagingSenderId: "476828357664",
    appId: "1:476828357664:web:c66aa9cb33ae0acd021845",
    measurementId: "G-YX8JZDJPK8"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const firestore = firebase.firestore();
