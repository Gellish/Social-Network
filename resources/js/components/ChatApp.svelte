<script>
    import { onMount } from "svelte";

    export let user;

    let contacts = [];
    let selectedContact = null;
    let messages = [];
    let newMessage = "";

    onMount(async () => {
        await fetchContacts();
    });

    async function fetchContacts() {
        try {
            const response = await axios.get("/contacts");
            contacts = response.data;
        } catch (error) {
            console.error(error);
        }
    }

    async function selectContact(contact) {
        selectedContact = contact;
        await fetchMessages(contact.id);
        // Reset unread count locally if needed
        const index = contacts.findIndex((c) => c.id === contact.id);
        if (index !== -1) {
            contacts[index].unread = 0;
        }
    }

    async function fetchMessages(contactId) {
        try {
            const response = await axios.get(`/conversation/${contactId}`);
            messages = response.data;
            scrollToBottom();
        } catch (error) {
            console.error(error);
        }
    }

    async function sendMessage() {
        if (!newMessage.trim() || !selectedContact) return;

        try {
            const response = await axios.post("/conversation/send", {
                contact_id: selectedContact.id,
                text: newMessage,
            });
            messages = [...messages, response.data];
            newMessage = "";
            scrollToBottom();
        } catch (error) {
            console.error(error);
        }
    }

    function scrollToBottom() {
        setTimeout(() => {
            const chatBox = document.getElementById("chat-messages");
            if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
        }, 50);
    }
</script>

<div class="messenger">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Chats</h3>
        </div>
        <div class="contact-list">
            {#each contacts as contact}
                <!-- svelte-ignore a11y-click-events-have-key-events -->
                <div
                    class="contact {selectedContact &&
                    selectedContact.id === contact.id
                        ? 'active'
                        : ''}"
                    on:click={() => selectContact(contact)}
                >
                    <div class="avatar">
                        <img
                            src={contact.image
                                ? `/storage/users/${contact.image}`
                                : `https://ui-avatars.com/api/?name=${contact.firstname}+${contact.lastname}&size=40`}
                            alt={contact.username}
                        />
                    </div>
                    <div class="info">
                        <div class="name">
                            {contact.firstname}
                            {contact.lastname}
                        </div>
                        <!-- <div class="last-message">Last message placeholder</div> -->
                    </div>
                    {#if contact.unread > 0}
                        <div class="unread-badge">{contact.unread}</div>
                    {/if}
                </div>
            {/each}
        </div>
    </div>
    <div class="chat-area">
        {#if selectedContact}
            <div class="chat-header">
                <div class="avatar">
                    <img
                        src={selectedContact.image
                            ? `/storage/users/${selectedContact.image}`
                            : `https://ui-avatars.com/api/?name=${selectedContact.firstname}+${selectedContact.lastname}&size=40`}
                        alt={selectedContact.username}
                    />
                </div>
                <div class="name">
                    {selectedContact.firstname}
                    {selectedContact.lastname}
                </div>
            </div>
            <div class="messages" id="chat-messages">
                {#each messages as message}
                    <div
                        class="message {message.from === user.id
                            ? 'sent'
                            : 'received'}"
                    >
                        <div class="bubble">
                            {message.text}
                        </div>
                    </div>
                {/each}
            </div>
            <div class="composer">
                <input
                    type="text"
                    placeholder="Type a message..."
                    bind:value={newMessage}
                    on:keydown={(e) => e.key === "Enter" && sendMessage()}
                />
                <button on:click={sendMessage}
                    ><i class="fa fa-paper-plane"></i></button
                >
            </div>
        {:else}
            <div class="empty-state">
                <p>Select a contact to start chatting</p>
            </div>
        {/if}
    </div>
</div>

<style>
    .messenger {
        display: flex;
        height: 600px;
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        overflow: hidden;
    }
    .sidebar {
        width: 300px;
        border-right: 1px solid #e5e5e5;
        display: flex;
        flex-direction: column;
    }
    .sidebar-header {
        padding: 15px;
        border-bottom: 1px solid #e5e5e5;
        font-weight: bold;
    }
    .contact-list {
        overflow-y: auto;
        flex: 1;
    }
    .contact {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .contact:hover {
        background: #f5f5f5;
    }
    .contact.active {
        background: #e6f2ff;
    }
    .avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }
    .info {
        flex: 1;
    }
    .name {
        font-weight: 600;
        font-size: 14px;
    }
    .unread-badge {
        background: #ff3b30;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 11px;
        font-weight: bold;
    }
    .chat-area {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .chat-header {
        padding: 10px 15px;
        border-bottom: 1px solid #e5e5e5;
        display: flex;
        align-items: center;
        background: #fff;
    }
    .messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background: #f9f9f9;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .message {
        display: flex;
        margin-bottom: 5px;
    }
    .message.sent {
        justify-content: flex-end;
    }
    .message.received {
        justify-content: flex-start;
    }
    .bubble {
        max-width: 70%;
        padding: 8px 12px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.4;
    }
    .sent .bubble {
        background: #0084ff;
        color: white;
        border-bottom-right-radius: 4px;
    }
    .received .bubble {
        background: #e4e6eb;
        color: #050505;
        border-bottom-left-radius: 4px;
    }
    .composer {
        padding: 10px;
        border-top: 1px solid #e5e5e5;
        display: flex;
        gap: 10px;
        background: #fff;
    }
    .composer input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 20px;
        outline: none;
    }
    .composer button {
        background: none;
        border: none;
        color: #0084ff;
        font-size: 18px;
        cursor: pointer;
    }
    .empty-state {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #888;
    }
</style>
