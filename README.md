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


## Screenshots

<img width="1217" height="548" alt="c" src="https://github.com/user-attachments/assets/27601663-d391-4dc4-b53b-33ddd02250b1" />
<br>

<img width="1192" height="572" alt="c1" src="https://github.com/user-attachments/assets/8974bb1e-a9d3-44a1-b3d5-045e8d72cd49" />
<br>

<img width="1180" height="508" alt="c2" src="https://github.com/user-attachments/assets/869818cd-9908-406f-b3a2-c10ddc9f5048" />
<br>

<img width="1200" height="485" alt="c3" src="https://github.com/user-attachments/assets/e9d5cfa8-c994-46b5-8c9e-d6ffea1aebfc" />
<br>

<img width="1208" height="634" alt="c4" src="https://github.com/user-attachments/assets/708cf67a-d073-4151-9057-806130ea9bc8" />
<br>

<img width="1235" height="637" alt="c5" src="https://github.com/user-attachments/assets/d6b561cf-1933-4212-aae0-8b3c1278ffa2" />
<br>

<img width="1228" height="592" alt="c6" src="https://github.com/user-attachments/assets/b223b74c-848a-40c8-b00c-216e2cdfbbb7" />
<br> 
<br>


<img width="1215" height="558" alt="s" src="https://github.com/user-attachments/assets/3bf37a8c-d270-4451-9d6b-62496092904f" />
<br>

<img width="1211" height="636" alt="s1" src="https://github.com/user-attachments/assets/50eacaa4-bd99-4fe1-9b1e-c004131edf01" />
<br>

<img width="1229" height="556" alt="s2" src="https://github.com/user-attachments/assets/7f067de9-0e20-484a-85d6-2162a82c4651" />
<br>

<img width="1217" height="522" alt="s3" src="https://github.com/user-attachments/assets/a2dca2a9-d479-42f9-a7fb-686c55379ce0" />
<br>

<img width="1193" height="635" alt="s4" src="https://github.com/user-attachments/assets/3884fa5d-7bad-4b16-8cb0-b059e35f416d" />
<br>

<img width="1231" height="624" alt="s5" src="https://github.com/user-attachments/assets/b1b47b78-896a-461d-8431-4c66a21d50b4" />









