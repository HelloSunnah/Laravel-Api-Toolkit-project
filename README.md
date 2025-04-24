# Laravel Realtime Chat & API Toolkit Project

This is a Laravel-based web application featuring a **real-time chat system**, powered by Laravel Reverb, and RESTful API management using **Laravel API Toolkit**. The frontend is built using Vue.js, enabling a responsive and dynamic chat experience.

---

## 🔧 Project Setup

### Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- Laravel 10+
- Laravel Reverb (for real-time events)
- MySQL/PostgreSQL or other supported database
- Redis (for broadcasting events via Reverb)

---

## 🚀 Running the Application

### 1. Install Dependencies

```bash
composer install
npm install && npm run dev
```
Environment Setup
cp .env.example .env
php artisan key:generate

# Run Migrations
 -php artisan migrate

# Serve the App & Reverb
Start Laravel and the Reverb real-time server:
 ```bash
php artisan serve
php artisan reverb:start
```

🧰 API Toolkit Usage
We are using Laravel API Toolkit to generate API resources, controllers, and routes easily.

Example: Generate Room API
To generate a full set of endpoints (Controller, Model, Migration, Resource, etc.):
 ```bash
php artisan api:generate Room "company_id:foreignId|roomName:string|roomDesc:text|totalSeat:integer|roomSerial:integer|status:integer" --all

```
💬 Real-Time Chat
The chat system uses Laravel Reverb to broadcast real-time messages between users. Messages are rendered in Vue.js components and instantly updated without refreshing the page.

Key Technologies:
Laravel Reverb (WebSockets server)

Redis for broadcasting

Vue.js for the front-end chat interface

Laravel Events & Listeners

🧩 Vue.js Frontend
The chat section is integrated as a Vue.js page/component. Vue handles real-time message updates and user interactions.

To compile Vue assets:
 ```bash
npm run dev  # for development
npm run build  # for production

```
📡 Broadcasting Configuration
 ```bash
BROADCAST_DRIVER=reverb
REVERB_APP_ID=your-app-id
REVERB_APP_KEY=your-app-key
REVERB_APP_SECRET=your-app-secret
REVERB_HOST=127.0.0.1
REVERB_PORT=6001


```
🛠 Commands Reference
