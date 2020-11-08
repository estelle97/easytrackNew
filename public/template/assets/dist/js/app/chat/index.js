// Define chat instance
let chatInstance = {
    data: {},
    views: {},
    events: {
        firebase: {},
        ui: {}
    }
};

// Collections
let chatsCollection = firestore.collection("messages");

// Chat properties
chatInstance.init = () => {
    console.log("init...");
    chatInstance.views.inbox.disable.view();
    chatInstance.data.chatRoom.list().then(() => {
        console.log("Search completed.");
        chatInstance.views.navigation.init().then(() => {
            chatInstance.events.firebase.chatRoom.listen();
            chatInstance.events.ui.init();

             // Remove loader
            $(".section-loader").hide();
        });
    });
};

chatInstance.utilities = {
    hashCode : s => s.split('').reduce((a,b)=>{a=((a<<10)-a)+b.charCodeAt(0);return a&a},0),
    getTime: (date) => {
        var datetime = new Date(date);
        return datetime.toLocaleString('en-US', { hour: 'numeric', minute:'numeric', hour12: true });
    }
};

// Set chat instance
window.onload = () => {
    chatInstance.init();
};


