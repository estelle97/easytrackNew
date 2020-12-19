@extends('layouts.base')

@section('content')
<div class="row row-deck row-cards mt-4">
    <div class="col-lg-12">
        <div class="card card-max-size">
            <div class="section-loader justify-content-center align-items-center">
                <div class="spinner-border text-blue" role="status"></div>
            </div>
            <section class="inbox">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left view -->
                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 chat-max-size">
                            <!-- Chat list actions -->
                            <div class="col-sm-12 pt-4 pb-3 px-3 message_list-header">
                                <div class="row">
                                    <div class="col-auto">
                                        <h2 class="page-title text-black">
                                            Chat
                                        </h2>
                                        <span class="order-global-date text-white h4 mt-2 text-capitalize"></span>
                                    </div>
                                    <div class="col-auto ml-auto d-print-none">
                                        <div class="d-flex align-items-center">
                                            <a class="text-white button-click-action mb-0 mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" fill="rgba(0,0,0,1)"/></svg>
                                                <!--  <span class="h2 align-middle button-click-action mb-0">Nouveau</span> -->
                                            </a>
                                            <a class="text-white button-click-action mb-0 mr-2" data-toggle="modal" data-target="#modal-create-chat">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M14 3v2H4v13.385L5.763 17H20v-7h2v8a1 1 0 0 1-1 1H6.455L2 22.5V4a1 1 0 0 1 1-1h11zm5 0V0h2v3h3v2h-3v3h-2V5h-3V3h3z"
                                                        fill="rgba(0,0,0,1)" /></svg>
                                                <!--  <span class="h2 align-middle button-click-action mb-0">Nouveau</span> -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat list content -->
                            <ul class="chat-room list-group list-unstyled">

                            </ul>
                            <!-- END Chat list content -->
                            <div class="chat-room-empty flex-column justify-content-center align-items-center text-center">
                                <img src="{{asset("template/assets/static/chat/chat-room-empty.svg")}}" alt="">
                                <h2>Créer une discussion</h2>
                                <h4>Cliquez sur le boutton <i class="ri-chat-new-line mx-2"></i> pour commencer <br> un nouveau chat avec un membres de votre équipe.</h4>
                            </div>
                        </div>
                        <!-- End Left view -->
                        <!-- Right view -->
                        <div class="cols-sm-0 col-md-7 col-lg-7 col-xl-7 p-0 message_inbox chat-room-max-size">
                            <!-- Chat room actions -->
                            <div class="col-sm-12 pt-4 pb-3 px-3 d-print-none messages-header">
                                {{-- <div class="d-flex justify-content-end align-items-center">
                                    <span class="more-button dropdown button-click-action mr-2">
                                        <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c-.825 0-1.5.675-1.5 1.5S11.175 6 12 6s1.5-.675 1.5-1.5S12.825 3 12 3zm0 15c-.825 0-1.5.675-1.5 1.5S11.175 21 12 21s1.5-.675 1.5-1.5S12.825 18 12 18zm0-7.5c-.825 0-1.5.675-1.5 1.5s.675 1.5 1.5 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5z" fill="rgba(0,0,0,1)"/></svg>
                                        </div>

                                        <div class="dropdown-menu dropdown-menu-right mt-3">
                                            <a class="dropdown-item mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM4 18.385L5.763 17H20V5H4v13.385zM13.414 11l2.475 2.475-1.414 1.414L12 12.414 9.525 14.89l-1.414-1.414L10.586 11 8.11 8.525l1.414-1.414L12 9.586l2.475-2.475 1.414 1.414L13.414 11z"/></svg>
                                                Effacer les messages
                                            </a>
                                            <a class="dropdown-item mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z" fill="rgba(231,76,60,1)"/></svg>
                                                Supprimer
                                            </a>
                                        </div>
                                    </span>
                                </div> --}}
                            </div>
                            <!-- End Chat room actions -->
                            <!-- Chat room content -->
                            <div class="messages-content p-2">
                                <ul class="message_list">

                                </ul>
                            </div>
                            <div class="messages-input pl-3 pr-3">
                                <div class="input-group input-group-flat">
                                    <input type="text" class="form-control room-input">
                                    <span class="input-group-text room-send-button">
                                        <a  class="link-secondary " title="" data-toggle="tooltip" data-original-title="Clear search">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/></svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="chatroom-not-selected flex-column justify-content-center align-items-center text-center">
                                <img src="{{asset("template/assets/static/chat/chat-room-not-selected.png")}}" alt="">
                                <h2>Chatter avec vos colègues</h2>
                                <h4>Restez connecté et discutez en temps réel <br> avec les membres de votre équipe.</h4>
                            </div>
                            <!-- End Chat room content -->
                        </div>
                        <!-- End Right view -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal-section">
    <div class="modal modal-blur fade" id="modal-create-chat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle discussion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body bg-white pt-1">
                    <div class="row align-items-end">
                        <div class="col-lg-12 p-0 mt-0 mb-4">
                            <div class="row">
                                @foreach (App\Message::getRecipients() as $emp)
                                    <div id="{{$emp->user->id}}" class="team-member col-sm-12">
                                        <a class="card card-link button-click-action mb-2">
                                        <div class="card-body">
                                            <div class="float-left mr-3">
                                                @if ($emp->user->photo)
                                                    <span class="avatar"> <img src="{{asset($emp->user->photo)}}" alt=""> </span>
                                                @else
                                                    <span class="avatar"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                                                @endif
                                            </div>
                                            <div class="lh-sm">
                                            <div class="strong">{{$emp->user->name}}</div>
                                            <div class="text-muted">{{$emp->user->role->name}}</div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-delete-company" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Êtes vous sure ?</div>
                    <div>Si vous continuez, vous perdrez toutes les données de cette companie.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto"
                        data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Oui, supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js"></script>

    <script>

        /*
         * PHP VARIABLES
         */
        const authId = "{{ Auth::id() }}";
        let contacts = null;


        function getContacts() {
            return new Promise((resolve, reject) => {
                token = '{{@csrf_token()}}';

                console.log("Loading contacts...");

                $.ajax({
                    url: 'chat/contacts',
                    method: 'post',
                    data : {
                        _token: token
                    },
                    success: (data) => {
                        contacts = data.contacts;
                        // console.log('contacts', contacts[0].role.name);
                        resolve("done");
                    }
                });
            });

        }

        /*
         * INDEX
         */
        var inbox = {
            room: {},
            roomsEvents: [],
            users: [],
        }
        // Define chat instance
        let chatInstance = {
            data: {
                inbox: {
                    room: {},
                    users: [],
                }
            },
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
                chatInstance.events.firebase.chatRoom.listen();
                setTimeout(() => {
                    chatInstance.views.navigation.init().then(() => {
                        chatInstance.events.ui.init();
                        console.log("Events Loaded.");
                        // Remove loader
                        $(".section-loader").hide();
                    });
                }, 500);
            });
        };

        chatInstance.utilities = {
            hashCode : s => s.split('').reduce((a,b)=>{a=((a<<10)-a)+b.charCodeAt(0);return a&a},0),
            getTime: (timestamp) => {
                var datetime = dayjs(timestamp).format("HH:mm");
                return datetime;
            }
        };



        /*
         * DATAS
         */
        // Actions
        chatInstance.data.generateChatId = (peerId) => {
            if ( parseInt(authId) <=  parseInt(peerId)) {
                return `${authId}-${peerId}`;
            } else {
                return `${peerId}-${authId}`;
            }
        };

        // Query
        chatInstance.data.chatRoom = {
            list: () => {
                return new Promise((resolve, reject) => {
                    console.log("Search chatrooms...");
                    chatsCollection.where('users', 'array-contains',  parseInt(authId)).get().then((querySnapshot) => {
                        /* if (querySnapshot.empty == false) {
                            querySnapshot.forEach(doc => {
                                chatInstance.views.panel.add({
                                    id: doc.id,
                                    users: doc.data().users,
                                    colors: doc.data().colors,
                                    date: doc.data().date,
                                    createdAt: doc.data().created,
                                    updatedAt: doc.data().updated,
                                    lastmessage: doc.data().lastmessage
                                });
                                setTimeout(() => {
                                    chatInstance.events.firebase.inbox.listen(doc.id);
                                }, 2000);
                            });
                        } */
                        resolve(querySnapshot);
                    });
                });
            },
            create: function(idTo) {
                chatsCollection.where('users', 'array-contains',  parseInt(idTo)).get().then((existingChats) => {
                    if (existingChats.empty == true) {
                        chatId = chatInstance.data.generateChatId(idTo);
                        var now = dayjs().valueOf();
                        var colors = this.getColors();
                        var data = {
                            lastmessage: "",
                            users:[parseInt(authId), parseInt(idTo)],
                            colors: [colors.bg, colors.text],
                            date: now,
                            createdAt: now,
                            updatedAt: 0,
                        }
                        chatsCollection.doc(chatId).set(data).then(chatRoomData => {
                            var newChat = chatsCollection.doc(chatId);
                            newChat.collection(chatId);
                            $('#modal-create-chat').hide();
                            $('.antialiased').removeClass("modal-open");
                            $('.modal-backdrop').remove();


                            /* chatInstance.views.panel.add({
                                id: chatId.toString(),
                                users: data.users,
                                colors: data.colors,
                                lastmessage: "",
                                createdAt: now,
                                updatedAt: 0,
                            }); */

                            // Load inbox
                            /* chatInstance.views.navigation.update(chatId, {
                                id: chatId.toString(),
                                users: data.users,
                                colors: data.colors,
                                lastmessage: "",
                                createdAt: now,
                                updatedAt: 0,
                            }); */
                        });
                    } else {
                        alert("Conversation existante !!!");
                    }
                });

            },
            getTitle: (users) => {
                if (authId == users[0]) {
                    var userData = chatInstance.data.user.get(users[1]);
                    return userData.name;
                } else {
                    var userData = chatInstance.data.user.get(users[0]);
                    return userData.name;
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
            set: (chatId) => {
                return new Promise((resolve, reject) => {
                    inbox.room  = chatsCollection.doc(chatId).collection(chatId);

                    // Get users
                    chatsCollection.doc(chatId).get().then((chatRoomData) => {
                        inbox.users = chatRoomData.data().users;
                        resolve("done");
                    });
                });
            },
            messages: () => {
                return new Promise((resolve, reject) => {
                    inbox.room.orderBy('date', 'asc').get().then((querySnapshot) => {
                        querySnapshot.forEach((messageDoc) => {
                            chatInstance.views.inbox.addMessage(messageDoc.id, messageDoc.data().idFrom, messageDoc.data().idTo, messageDoc.data().content);
                        });
                        resolve("done");
                    });
                });
            },
            sendMessage: (message) => {
                return new Promise((resolve, reject) => {
                    var now = dayjs().valueOf()
                    var idTo = inbox.users.filter(user => user != authId)
                    var msgData = {
                        date: now,
                        content: message,
                        idFrom: parseInt(authId),
                        idTo: parseInt(idTo[0])
                    };

                    // Send message
                    inbox.room.add(msgData).then(messageDoc => {
                        var selectedChatRoom = chatsCollection.doc(inbox.room.id);
                        selectedChatRoom.update({
                            updatedAt: now,
                            lastmessage: message
                        })
                        .then(() => {
                            resolve("done");
                        });
                    });
                });
            }
            /* lastMessage: (chatId) => {
                var roomData = chatsCollection.doc(chatId).collection(chatId);
                return roomData.orderBy('date', 'desc').limitToLast(1).get().then((querySnapshot) => {
                    var message = {};
                    querySnapshot.forEach(chatData => {
                        message = chatData.data();
                    });
                    return message;
                });
            } */
        }

        chatInstance.data.user = {
            get: (userId) => {
                userInfos = contacts.filter(user => user.id == userId);
                return userInfos[0];
            }
        };



        /*
         * VIEWS
         */
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
            refresh: () => {
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        var chatRooms = $('.chat-room-component');
                        if (chatRooms.get() == 0) {
                            $(".chat-room").hide();
                            $(".chat-room-empty").addClass("d-flex");
                        } else {
                            $(".chat-room-empty").hide();
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
                        chatInstance.events.ui.disableSendMessage();
                        chatInstance.events.ui.sendMessage();
                    });
                });
            },
            update: (chatId, chatRoomData) => {
                var chatRooms = $('.chat-room-component');
                if (chatRooms.get() == 0) {
                    $(".chat-room-empty").removeClass("d-flex");
                    $(".chat-room").show();
                }

                chatInstance.views.panel.add(chatRoomData);

                // Select chatroom
                $(".chat-room-component.active-chat").removeClass("active-chat");
                $(`#chat-room-${chatId}`).addClass("active-chat");

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
                        chatInstance.events.ui.disableSendMessage();
                        chatInstance.events.ui.sendMessage();
                        chatInstance.events.firebase.inbox.listen(chatId);
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
                } else if (chatInstance.data.inbox.room === undefined) {
                    $(".chatroom-not-selected").addClass("d-flex");
                } else {
                    $(".chatroom-not-selected").removeClass("d-flex");
                }
            }
        };

        chatInstance.views.panel = {
            add: (chatData) => {
                console.log("🚀 chatInstance.views.panel", chatData)

                var chatDate = "";
                if ((chatData.lastmessage == "" ) || (chatData.lastmessage == undefined)) {
                    chatDate = chatData.createdAt != null ? chatData.createdAt : chatData.date;
                    chatData.lastmessage = "Ecrivez un message à votre collègue"
                } else {
                    chatDate = chatData.createdAt != null ? chatData.createdAt : chatData.date;
                }
                if (chatData.colors == undefined) {
                    var colors = chatInstance.data.chatRoom.getColors();
                    chatData.colors = [colors.bg, colors.text];
                }
                $( ".chat-room" ).append(/*html*/`
                    <li id="chat-room-${chatData.id}" class="chat-room-component list-group-item">
                        <div class="media">
                            <div class="media-body d-flex align-items-center">
                                <div class="user mr-4">
                                    <span class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=${chatInstance.data.chatRoom.getTitle(chatData.users)}&background=${chatData.colors[0]}&color=${chatData.colors[1]}&font-size=0.30');"></span>
                                </div>
                                <div class="message content">
                                    <div class="media-heading">
                                    <a class="m-r-10">${chatInstance.data.chatRoom.getTitle(chatData.users)}</a>
                                        <small class="float-right text-muted">
                                        <time class="hidden-sm-down">${chatInstance.utilities.getTime(chatDate)}</time>
                                        </small>
                                    </div>
                                    <p class="msg">
                                    ${chatData.lastmessage}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                `);
            },
            update: (chatId, lastmessage, messageDate) => {
                $( `#chat-room-${chatId} .msg` ).html(lastmessage);
                var dateConverted = new Date(messageDate);
                $( `#chat-room-${chatId} time` ).html(chatInstance.utilities.getTime(dateConverted));
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
                if (idFrom.toString() == authId) {
                    this.isUser(id, content);
                } else {
                    this.isPeer(id, content);
                }
            },
            isUser: (id, content) => {
                $( ".message_list" ).append(/*html*/`
                    <li id="message-${id}" class="room-message sent">
                        <p>${content}</p>
                    </li>
                `);
            },
            isPeer: (id, content) => {
                $( ".message_list" ).append(/*html*/`
                    <li id="message-${id}" class="room-message replies">
                        <p>${content}</p>
                    </li>
                `);
            }
        };



        /*
        * EVENTS
        */
        // Firebase Events
        chatInstance.events.firebase = {
            // ON MESSAGES CHANGE
            chatRoom: {
                listen: () => {
                    chatsCollection.onSnapshot((snapshot)  => {
                        // Watch change on messages collection
                        snapshot.docChanges().forEach((change) => {
                            var doc = change.doc;
                            if (change.type === "added") {
                                if ((doc.data().users[0] == authId) || (doc.data().users[1] == authId)) {
                                    chatInstance.views.panel.add({
                                        id: doc.id,
                                        users: doc.data().users,
                                        colors: doc.data().colors,
                                        date: doc.data().date,
                                        createdAt: doc.data().created,
                                        updatedAt: doc.data().updated,
                                        lastmessage: doc.data().lastmessage
                                    });
                                    setTimeout(() => {
                                        chatInstance.views.navigation.refresh();
                                    }, 100);
                                    setTimeout(() => {
                                        chatInstance.events.firebase.inbox.listen(doc.id);
                                    }, 2000);
                                }
                            }
                            if (change.type === "modified") {

                            }
                            if (change.type === "removed") {
                                chatInstance.views.panel.delete(doc.id);
                                chatInstance.views.navigation.delete();
                                chatInstance.events.firebase.inbox.delete(doc.id);
                            }
                        });
                    }, (error) => {
                        console.error("ChatRooms error: ", error);
                    });
                }
            },
            // ON MESSAGES SUBCOLLECTION CHANGE
            inbox: {
                listen: (chatId) => {
                    inbox.roomsEvents.push({
                        chatId: chatId,
                        snapshotEvent: chatsCollection.doc(chatId).collection(chatId).onSnapshot((snapshot)  => {
                            var activeChatId = chatId;
                            var lastMessageId = "";
                            // Watch change on messages subcollection
                            snapshot.docChanges().forEach((change) => {
                                var doc = change.doc;
                                if ($( ".chat-room-component" ).hasClass( "active-chat" )) {
                                    var selectedChatId = $(".chat-room-component.active-chat").attr('id').split("room-").pop();
                                    if (activeChatId == selectedChatId) {
                                        if (change.type === "added") {
                                            chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                            chatInstance.views.inbox.addMessage(doc.id, doc.data().idFrom, doc.data().idTo, doc.data().content);
                                        }
                                        if (change.type === "modified") {
                                            chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                        }
                                        if (change.type === "removed") {}
                                    } else {
                                        if (change.type === "added") {
                                            chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                        }
                                        if (change.type === "modified") {
                                            chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                        }
                                        if (change.type === "removed") {}
                                    }
                                } else {
                                    if (change.type === "added") {
                                        chatsCollection.doc(activeChatId).get().then((chatRoomData) => {
                                            inbox.users = chatRoomData.data().users;
                                            if (chatRoomData.data().lastmessage == doc.data().content) {
                                                chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                            }
                                        });
                                    }
                                    if (change.type === "modified") {
                                        chatInstance.views.panel.update(activeChatId, doc.data().content, doc.data().date);
                                    }
                                    if (change.type === "removed") {}
                                }

                            });
                        }, (error) => {
                            console.error("Chat error: ", error);
                        })
                    });
                },
                delete: (id) => {
                    _.remove(inbox.roomsEvents, function(room) {
                        return room.chatId == id;
                    });
                }
            }
        };

        // UI Events
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

                    // Load inbox
                    chatInstance.views.navigation.select(chatId);
                });
            },
            selectTeamMember: () => {
                $(".team-member").click(function() {
                    // Get chat id
                    var peerId = $(this).attr('id');

                    // Clean id string

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
                /* $(".messages-input").keypress(function(e) {
                    if(e.which == 13) {
                        if ($(".room-input").val() != "" ) {
                            chatInstance.data.inbox.sendMessage($(".room-input").val()).then(() => {
                                $( ".room-input" ).val("");
                            }).catch(()=> {
                                $( ".room-input" ).val("");
                            });
                        }
                    }
                }); */
            },
            disableSendMessage: () => {
                $( ".room-send-button").unbind( "click" );
            }
        };



        // Set chat instance
        window.onload = () => {
            getContacts().then(() => {
                chatInstance.init();
            });
        };
    </script>
@endsection

@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href={{asset("template/assets/dist/css/chat.css")}} rel="stylesheet" />
@endsection
