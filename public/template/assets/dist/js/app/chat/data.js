// Actions
chatInstance.data.generateChatId = (peerId) => {
    const hashCode = chatInstance.utilities.hashCode;
    var hashedAuthId = hashCode(authId.toString());
    var hashedPeerId = hashCode(peerId.toString());
    if ( hashedAuthId <= hashedPeerId) {
        return `${hashedAuthId}-${hashedPeerId}`;
      } else {
        return `${hashedPeerId}-${hashedAuthId}`;
    }
};

// Query
chatInstance.data.chatRoom = {
    list: () => {
        return new Promise((resolve, reject) => {
            console.log("Search chatrooms...");
            chatsCollection.where('users', 'array-contains',  parseInt(authId)).get().then((querySnapshot) => {
                if (querySnapshot.empty == false) {
                    querySnapshot.forEach(doc => {
                        chatInstance.data.inbox.lastMessage(doc.id).then(message => {
                            chatInstance.views.panel.add({
                                id: doc.id,
                                users: doc.data().users,
                                colors: doc.data().colors,
                                date: doc.data().date,
                                lastMessage: message
                            });
                        });
                    });
                }
                resolve(querySnapshot);
            });
        });
    },
    create: function(idTo) {
        chatsCollection.where('users', 'array-contains',  parseInt(idTo)).get().then((existingChats) => {
        console.log("existingChats", existingChats)
            if (existingChats.empty == true) {
                var chatId = chatInstance.data.generateChatId(authId, idTo);
                var now = new Date();
                var data = {
                    users:[parseInt(authId), parseInt(idTo)],
                    colors: this.getColors(),
                    date: now.toString()
                }
                chatsCollection.doc(chatId).set(data).then(chatRoomData => {
                    var newChat = chatsCollection.doc(chatId);
                    newChat.collection(chatId);
                    $('#modal-create-chat').hide();
                    $('.modal-backdrop').remove();

                    // Load inbox
                    chatInstance.views.navigation.update(chatId, {
                        id: chatId,
                        users: data.users,
                        colors: data.colors,
                        lastMessage: {
                            date: data.date,
                            content: "Ecrivez un message à votre collègue"
                        }
                    });
                });
            } else {
                alert("Conversation existante !!!");
            }
        });

    },
    getTitle: (users) => {
        if (authId == users[0]) {
            return chatInstance.data.user.get(users[0]);
        } else {
            return chatInstance.data.get(users[1]);
        }
    },
    getColors: () => {
        var colors = [
            {
                text: "2680C9",
                bg: "C9DFF2"
            },
            {
                text: "26B0C3",
                bg: "C8EBF0"
            },
            {
                text: "23B0C3",
                bg: "C9F6FB"
            },
            {
                text: "61B820",
                bg: "D7EDC7"
            },
            {
                text: "324CDE",
                bg: "CBD2F7"
            },
            {
                text: "9A1CDD",
                bg: "E6C6F7"
            }
        ]
        return colors[Math.floor(Math.random() * colors.length)];
    }
};
chatInstance.data.inbox = {
    room: {},
    users: [],
    set: (chatId) => {
        return new Promise((resolve, reject) => {
            room = chatsCollection.doc(chatId).collection(chatId);
            // Get users
            chatsCollection.doc(chatId).get().then((chatRoomData) => {
                users = chatRoomData.data().users;
            });
            resolve("done");
        });

    },
    getIDtoSend: (users) => {
        console.log("users", users)
        return users.filter(user => user != authId);
    },
    messages: () => {
        return new Promise((resolve, reject) => {
            room.orderBy('date', 'asc').get().then((querySnapshot) => {
                querySnapshot.forEach((messageDoc) => {
                    chatInstance.views.inbox.addMessage(messageDoc.id, messageDoc.data().idFrom, messageDoc.data().idTo, messageDoc.data().content);
                });
            });
            resolve("done");
        });
    },
    sendMessage: (message) => {

        return new Promise((resolve, reject) => {
            if (room != null) {
                var now = new Date();
                var data = {
                    date: now.toString(),
                    content: message,
                    idFrom: authId,
                    idTo: chatInstance.data.inbox.getIDtoSend(chatInstance.data.inbox.users)
                };

                // Send message
                room.add(data).then(messageDoc => {
                    console.log("messageDoc", messageDoc);
                    chatInstance.views.inbox.addMessage(messageDoc.id, data.idFrom, data.idTo, data.content);
                    resolve("done");
                });
            } else {
               console.log("Impossible d'envoyer le message");
               reject("Impossible d'envoyer le message");
            }
        });

    },
    lastMessage: (chatId) => {
        var roomData = chatsCollection.doc(chatId).collection(chatId);
        return roomData.orderBy('date', 'asc').limitToLast(1).get().then((querySnapshot) => {
            var message = {};
            querySnapshot.forEach(chatData => {
                message = chatData.data();
            });
            return message;
        });
    }
}

chatInstance.data.user = {
    get: (id) => {
        userInfos = "Username";
        return userInfos;
    }
};
