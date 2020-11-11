// Firebase Events
/**
 * ON MESSAGES CHANGE
 */
chatInstance.events.firebase.chatRoom = {
    listen: () => {
        chatsCollection.onSnapshot((snapshot)  => {

            // Watch change on messages collection
            snapshot.docChanges().forEach((change) => {
                console.log("chatInstance.events.firebase.chatRoom change", change)
                if (change.type === "added") {}
                if (change.type === "modified") {}
                if (change.type === "removed") {
                    chatInstance.views.panel.delete(change.doc.id);
                    chatInstance.views.navigation.delete();
                }
            });
        }, (error) => {
            console.error("ChatRooms error: ", error);
        });
    },
    unsubscribe: () => {
        chatsCollection.onSnapshot().subscribe();
    }
};

/**
 * ON MESSAGES SUBCOLLECTION CHANGE
 */
chatInstance.events.firebase.inbox = {
    listen: (chatId) => {
        chatInstance.data.inbox.room = chatsCollection.doc(chatId).collection(chatId);
        chatInstance.data.inbox.room.onSnapshot((snapshot)  => {

            // Watch change on messages subcollection
            snapshot.docChanges().forEach((change) => {
                console.log("room change", change);
                if (change.type === "added") {
                    var doc = change.doc;
                    chatInstance.views.panel.update(chatId, {
                        date: doc.data().date,
                        content: doc.data().content
                    });
                }
                if (change.type === "modified") {}
                if (change.type === "removed") {}
            });
        }, (error) => {
            console.error("Chat error: ", error);
        })
    },
    subscribe: () => {
        chatInstance.data.inbox.room.onSnapshot().subscribe();
    },
    unsubscribe: () => {
        chatInstance.data.inbox.room.onSnapshot().unsubscribe();
    }
};
