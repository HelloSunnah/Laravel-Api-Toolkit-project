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
exit

Environment Setup
cp .env.example .env
php artisan key:generate

