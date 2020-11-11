// Chat views properties
chatInstance.views.navigation = {
    init: () => {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                var chatRooms = $('.chat-room-component');
                if (chatRooms.get() == 0) {
                    $(".chat-room").hide();
                    $(".chat-room-empty").addClass("d-flex");
                } else {
                    $(".chatroom-not-selected").addClass("d-flex");
                }
                resolve("done");
            }, 500);
        });
    },
    select: (chatId) => {
        // Set room
        chatInstance.data.inbox.set(chatId).then(() => {
            // Disable and clear inbox view
            chatInstance.views.inbox.disable.view();
            chatInstance.views.inbox.disable.form();
            chatInstance.views.inbox.clear();

            // Enable inbox view
            chatInstance.views.inbox.enable.view();

            // Loading data
            chatInstance.views.inbox.init(chatId).then(() => {
                console.log("Start chat.");
                // Activating writing possibilites
                chatInstance.views.inbox.enable.form();
                chatInstance.events.ui.sendMessage();
                chatInstance.events.firebase.inbox.listen(chatId);
            });
        });
    },
    update: (chatId, chatRoomData) => {
        chatInstance.events.firebase.inbox.unsubscribe();
        var chatRooms = $('.chat-room-component');
        if (chatRooms.get() == 0) {
            $(".chat-room-empty").removeClass("d-flex");
            $(".chat-room").show();
        }

        chatInstance.views.panel.add(chatRoomData);

        // Select chatroom
        $(".chat-room-component.active-chat").removeClass("active-chat");
        $(`#chat-room-${chatRoomData.id}`).addClass("active-chat");

        // Set room
        chatInstance.data.inbox.set(chatId).then(() => {
            // Disable and clear inbox view
            chatInstance.views.inbox.disable.view();
            chatInstance.views.inbox.disable.form();
            chatInstance.views.inbox.clear();

            // Enable inbox view
            chatInstance.views.inbox.enable.view();

            // Loading data
            chatInstance.views.inbox.init(chatId).then(() => {
                console.log("Start chat.");
                // Activating writing possibilites
                chatInstance.views.inbox.enable.form();
                chatInstance.events.ui.sendMessage();
                chatInstance.events.firebase.inbox.listen(chatId);

                $('.messages-content').scrollTop(
                    $(".room-message").last().offset().top - $('.messages-content').offset().top
                );
            });
        });
    },
    delete: () => {
        var chatRooms = $('.chat-room-component');
        if (chatRooms.get() == 0) {
            $(".chat-room").hide();
            $(".chat-room-empty").addClass("d-flex");
            $(".chatroom-not-selected").removeClass("d-flex");
            chatInstance.views.inbox.disable.view();
        } else if (Object.keys(chatInstance.data.inbox.room).length === 0) {
            $(".chatroom-not-selected").addClass("d-flex");
        } else {
            $(".chatroom-not-selected").removeClass("d-flex");
        }
    }
};

chatInstance.views.panel = {
    add: (chatData) => {
        var messageData = chatData.lastMessage;

        if(Object.keys(chatData.lastMessage).length === 0) {
            console.log("messageData.date", chatData.date)
            messageData = {
                date: new Date(chatData.date),
                content: "Ecrivez un message à votre collègue"
            };
        } else {
            messageData.date = new Date(chatData.lastMessage.date);
        }
        $( ".chat-room" ).append(/*html*/`
            <li id="chat-room-${chatData.id}" class="chat-room-component list-group-item">
                <div class="media">
                    <div class="media-body d-flex align-items-center">
                        <div class="user mr-4">
                            <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=${chatInstance.data.chatRoom.getTitle(chatData.users)}&background=${chatData.colors.bg}&color=${chatData.colors.text}&font-size=0.30');"></span>
                        </div>
                        <div class="message content">
                            <div class="media-heading">
                               <a class="m-r-10">${chatInstance.data.chatRoom.getTitle(chatData.users)}</a>
                                <small class="float-right text-muted">
                                   <time class="hidden-sm-down">${chatInstance.utilities.getTime(messageData.date)}</time>
                                </small>
                            </div>
                            <p class="msg">
                               ${messageData.content}
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        `);
    },
    update: (chatId, lastMessage) => {
        $( `#chat-room-${chatId} .msg` ).html(lastMessage.content);
        $( `#chat-room-${chatId} time` ).html(chatInstance.utilities.getTime(lastMessage.date));
    },
    delete: (chatId) => {
        $(`#chat-room-${chatId}`).remove();
    }
};

chatInstance.views.inbox = {
    init: (chatId) => {
        return new Promise((resolve, reject) => {
            chatInstance.data.inbox.messages().then(() => {
                resolve("done");
            });
        });
    },
    disable: {
        view: () => {
            $(".messages-header").hide();
            $(".messages-content").hide();
            $(".messages-input").hide();
        },
        form: () => {
            $( ".room-input" ).prop( "disabled", true );
            $( ".room-send-button" ).prop( "disabled", true );
        }
    },
    enable: {
        view: () => {
            $(".messages-header").show();
            $(".messages-content").show();
            $(".messages-input").show();
            $(".chatroom-not-selected").removeClass("d-flex").hide();
        },
        form: () => {
            $( ".room-input" ).prop( "disabled", false );
            $( ".room-send-button" ).prop( "disabled", false );
        }
    },
    clear: () => {
        $( ".message_list" ).html("");
    },
    addMessage: function(id, idFrom, idTo, content) {
        if (idFrom == authId) {
            this.isUser(id, content);
        } else {
            this.isPeer(id, content);
        }
    },
    isUser: (id, content) => {
        $( ".message_list" ).append(/*html*/`
            <li id="message-${id}" class="room-message replies">
                <p>${content}</p>
            </li>
        `);
    },
    isPeer: (id, content) => {
        $( ".message_list" ).append(/*html*/`
            <li id="message-${id}" class="room-message sent">
                <p>${content}</p>
            </li>
        `);
    }
};
