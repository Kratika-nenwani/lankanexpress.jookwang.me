

# Lanka Express

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Overview

**Lanka Express** is a logistics and delivery application designed to simplify shipping and connect users with reliable delivery services across the region.

## Features

- **User-friendly Interface**: Simple and intuitive for easy navigation.
- **Real-Time Tracking**: Users can track deliveries in real-time.
- **Secure Payment Options**: Safe and secure payment methods integrated.

## Technologies Used

- PHP (Laravel Framework)
- MySQL
- HTML/CSS
- Bootstrap
- JavaScript

## About Laravel

Laravel is a web application framework with expressive and elegant syntax. It simplifies development tasks like:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database-agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides essential tools for building large, robust applications.

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL
- Laravel Installer

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/lankaexpress.git
   cd lankaexpress
   ```

2. **Install Composer dependencies:**
   ```bash
   composer install
   ```

3. **Create a new database in MySQL:**

   - Open your MySQL client (e.g., phpMyAdmin, MySQL Workbench).
   - Create a new database (e.g., `lankaexpress_db`).

4. **Configure your environment:**

   - Rename `.env.example` to `.env`.
   - Open the `.env` file and configure your database credentials:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

7. **Seed the database (Optional):**
   - If you have seed data, run:
   ```bash
   php artisan db:seed
   ```

8. **Optimize the application:**
   ```bash
   php artisan optimize
   ```

9. **Serve the application:**
   ```bash
   php artisan serve
   ```

10. **Access the application:**
    Open your browser and navigate to [http://localhost:8000](http://localhost:8000).

## Usage

- **Login/Registration**: Users can register and log in to manage their profiles and deliveries.
- **Delivery Management**: Users can place, track, and manage delivery orders easily.
- **Real-Time Tracking**: Track shipments in real-time through the application.

## Testing

To run tests for this application, use the following command:

```bash
php artisan test
```

## License

This project is licensed under the MIT License.

## Author

Developed by [Your Name] at InTouch Software Solutions.

## Contributing

Thank you for considering contributing to Lanka Express! Refer to the [Laravel documentation](https://laravel.com/docs/contributions) for the contribution guide.

## Code of Conduct

To ensure a welcoming environment for everyone, please review and follow the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability, please send an email to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

---

### Notes:
- Replace `yourusername`, `your_database_name`, `your_username`, and `your_password` with the correct values.
- Customize the author name and other sections as needed.

### Live Website Link:

https://lankanexpress.intouchsoftwaresolution.com/login

### There are 3 Roles:

1. Admin
   
![image](https://github.com/user-attachments/assets/2d7c1419-a2c0-4bac-bd63-14213620e31f)


2. Operational

![image](https://github.com/user-attachments/assets/4a1ad5c1-4b46-40cf-8080-c0d50d6ce841)

3. Call Agent

![image](https://github.com/user-attachments/assets/adf7acf6-4967-4b28-8890-80876367eada)
