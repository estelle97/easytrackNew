// Firebase Events
/**
 * ON MESSAGES CHANGE
 */
/* chatInstance.onChatListChange = {
    listen: () => {
        chatsCollection.onSnapshot((snapshot)  => {

            // Watch change on messages collection
            snapshot.docChanges().forEach((change) => {
                if (change.type === "added") {
                    var doc = change.doc;
                    chatInstance.lastMessage(doc.id).then(message => {
                        chatInstance.viewChatsPanel.add({
                            id: doc.id,
                            ...doc.data(),
                            lastMessage: message,
                        });
                    });
                }
                if (change.type === "removed") {
                    chatInstance.viewChatsPanel.delete(change.doc);
                }
            });
        }, (error) => {
            console.error("Chat error: ", error);
        });
    },
    unsubscribe: () => {
        chatsCollection.onSnapshot().subscribe();
    }
}; */

/**
 * ON MESSAGES SUBCOLLECTION CHANGE
 */
chatInstance.onChatRoomChange = {
    listen: () => {
        chatRoom.onSnapshot((snapshot)  => {

            // Watch change on messages subcollection
            snapshot.docChanges().forEach((change) => {
                if (change.type === "added") {
                    var doc = change.doc;
                    console.log("New chat message: ", doc.data().id);
                    chatInstance.viewChatRoom.addMessage(doc.id, doc.data().idFrom, doc.data().idTo, doc.data().content);
                }
                /* if (change.type === "modified") {
                    console.log("New chat message: ", change.doc.data());
                    chatInstance.viewChatsPanel.update(change.doc);
                } */
                /* if (change.type === "removed") {
                    console.log("Removed chat message: ", change.doc.data());
                    chatInstance.viewChatRoom.delete(change.doc);
                } */
            });
        }, (error) => {
            console.error("Chat error: ", error);
        })
    },
    subscribe: () => {
        chatRoom.onSnapshot().subscribe();
    },
    unsubscribe: () => {
        chatRoom.onSnapshot().unsubscribe();
    }

};
