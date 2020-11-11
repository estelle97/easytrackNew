const firebaseConfig = {
    apiKey: "AIzaSyDnvqZ1Pnd1ovuuTLRsPRs7Q27m_D2UmHI",
    authDomain: "easytrack-d30d8.firebaseapp.com",
    databaseURL: "https://easytrack-d30d8.firebaseio.com",
    projectId: "easytrack-d30d8",
    storageBucket: "easytrack-d30d8.appspot.com",
    messagingSenderId: "591977125152",
    appId: "1:591977125152:web:9e14463ce7b5a09f3f7345",
    measurementId: "G-CQY1VLZ0VJ"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const firestore = firebase.firestore();
