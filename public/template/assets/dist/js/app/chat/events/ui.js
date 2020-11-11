chatInstance.events.ui = {
    init: () => {
        chatInstance.events.ui.chatRoom();
        chatInstance.events.ui.selectTeamMember();
    },
    chatRoom: () => {
        $(".chat-room-component").click(function() {
            // Activate selected chatroom
            $(".chat-room-component.active-chat").removeClass("active-chat");
            $(this).addClass("active-chat");

            // Get chat id
            var ID = $(this).attr('id');

            // Clean id string
            var chatId = ID.split("room-").pop()
            console.log("Selected chat ID", chatId);

            // Load inbox
            chatInstance.views.navigation.select(chatId);
        });
    },
    selectTeamMember: () => {
        $(".team-member").click(function() {
            // Get chat id
            var peerId = $(this).attr('id');

            // Clean id string
            console.log("Selected peer ID", peerId);

            // Load chat rom
            chatInstance.data.chatRoom.create(peerId);
        });
    },
    sendMessage: () => {
        $(".room-send-button").click(function() {
            if ($(".room-input").val() != "" ) {
                chatInstance.data.inbox.sendMessage($(".room-input").val()).then(() => {
                    $( ".room-input" ).val("");
                }).catch(()=> {
                    $( ".room-input" ).val("");
                });
            }
        });
    }
};
