# Social Network

A modern Social Network application built with **Laravel 11** and **Svelte**, featuring real-time chat, user profiles, and a dynamic feed.

![Dashboard Preview](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## 🚀 Features

-   **User Authentication**: Secure login and registration.
-   **Dynamic News Feed**: Post updates, like, and comment on friends' posts.
-   **User Profiles**:
    -   Customizable header and profile pictures.
    -   Displays verified follower/following counts.
    -   Edit profile details (Overview, Experience, Education).
-   **Search Functionality**:
    -   Find users by name or username.
    -   Grid view results with "Follow" and "Message" actions.
-   **Messenger-Style Chat** (New!):
    -   Built with **Svelte** for a seamless, reactive experience.
    -   Real-time messaging UI.
    -   Contact list with online/unread status indicators.
    -   Facebook-like chat bubbles.

## 🛠️ Tech Stack

-   **Backend**: Laravel 11, PHP 8.2+, MySQL
-   **Frontend**: Svelte, Blade Templates, Bootstrap 5, Vanilla CSS
-   **Build Tool**: Vite (configured for hybrid Blade/Svelte support)
-   **Real-time**: Pusher (configurable) / Laravel Echo

## 📦 Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/Gellish/Social-Network.git
    cd Social-Network
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install Frontend Dependencies**
    ```bash
    npm install
    # Note: If you encounter dependency issues, try:
    # npm install --legacy-peer-deps
    ```

4.  **Configure Environment**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Update your `.env` file with your database credentials.*

5.  **Run Migrations & Seeders**
    ```bash
    php artisan migrate --seed
    ```

6.  **Build Assets**
    ```bash
    npm run build
    ```

7.  **Serve Application**
    ```bash
    php artisan serve
    ```

## 🗺️ Roadmap

We have exciting plans for the future of this project! Here is what we are working on:

-   [ ] **Real-time Notifications**: Instant alerts for likes, comments, and new followers.
-   [ ] **Group Chats**: Create channels for multiple users to chat together.
-   [ ] **Media Sharing in Chat**: Send images and files in conversations.
-   [ ] **Dark Mode**: System-wide dark theme toggle.
-   [ ] **Mobile App**: Native mobile wrapper (using Capacitor or React Native).
-   [ ] **Stories/Status Updates**: 24-hour temporary posts.

## 🔧 Future Improvements & Optimization

-   **Testing**: Implement comprehensive PHPUnit (Backend) and Vitest (Frontend) test suites to ensure stability.
-   **Caching**: Optimize database queries using Redis for caching frequently accessed data (e.g., feed, user counts).
-   **Docker Support**: Add `Dockerfile` and `docker-compose.yml` for easier containerized deployment.
-   **API Development**: Expose a RESTful or GraphQL API for third-party integrations or mobile apps.
-   **Code Refactoring**: Continue modernizing legacy code to fully utilize Laravel 11 features (e.g., Service classes, DTOs).

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
