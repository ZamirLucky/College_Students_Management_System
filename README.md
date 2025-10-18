# College Students Management System

A Laravel-based web application for managing colleges and students with full CRUD operations and relationships.

## Features

- **College Management**: Create, read, update, and delete colleges
- **Student Management**: Create, read, update, and delete students
- **Relationships**: Students are linked to colleges with foreign keys
- **Validation**: Form validation with custom rules
- **Responsive Design**: Bootstrap-powered responsive UI

## Tech Stack

### Backend
- **Laravel 10.x** - PHP Framework
- **PHP 8.4** - Programming Language
- **Composer** - Dependency Manager

### Frontend
- **Bootstrap 5** - CSS Framework
- **JavaScript** - Client-side scripting
- **HTML5 & CSS3** - Markup and styling

### Database
- **MariaDB 10.11** - Primary database (MySQL-compatible)
- **Laravel Migrations** - Database schema management
- **Eloquent ORM** - Database relationships

### Development Tools
- **Laravel Artisan** - Command-line tool
- **Laravel Tinker** - Interactive shell
- **Git** - Version control

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ZamirLucky/College_Students_Management_System.git
   cd College_Students_Management_System
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - Create a MySQL database
   - Update `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open http://127.0.0.1:8000 in your browser

## Usage

### Managing Colleges
- Navigate to `/colleges` to view all colleges
- Click "Add College" to create a new college
- Use edit/delete options for existing colleges

### Managing Students
- Navigate to `/students` to view all students
- Click "Add Student" to create a new student
- Select a college when creating students (required relationship)

## Database Schema

### Colleges Table
- `id` - Primary key
- `name` - College name (unique)
- `address` - College address
- `created_at`, `updated_at` - Timestamps

### Students Table
- `id` - Primary key
- `name` - Student name
- `email` - Student email (unique)
- `phone` - Phone number
- `dob` - Date of birth
- `college_id` - Foreign key to colleges table
- `created_at`, `updated_at` - Timestamps

## Requirements

- PHP 8.1+
- Composer
- MariaDB 10.6+ 

   
