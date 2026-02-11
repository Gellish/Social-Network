import './bootstrap';
import ChatApp from './components/ChatApp.svelte';

const app = document.getElementById('chat-app');

if (app) {
    new ChatApp({
        target: app,
        props: {
            user: JSON.parse(app.dataset.user)
        }
    });
}
