# **Laravel Support Ticket System**

A multi-database Laravel support ticket system where each ticket type has its own MySQL database.  
Admin panel included for viewing and managing all tickets.

---

## 🚀 **Installation & Setup**

### **1. Clone the repository**
```bash
git clone https://github.com/asheek21/ticket-system.git
cd ticket-system
```

### **2. Install dependencies**
```bash
composer install
npm install
npm run build   # or npm run dev
```

### **3. Environment Setup**
Copy `.env.example` → `.env`  
Update DB credentials (master DB).
```bash
cp .env.example .env
php artisan key:generate
```

---

## 🗄️ **Database Migration & Seeding**

### **4. Run migrations**
```bash
php artisan migrate
```

### **5. Seed initial data**
This inserts default ticket types + admin user.
```bash
php artisan db:seed
```

### **Admin Credentials**
```
Email: superadmin@gmail.com
Password: password
```

---

## ⚙️ **Background Jobs Requirement**

This project uses **queued jobs** to create ticket-type databases in the background.

Before running ticket-type migration commands, start the queue worker:

```bash
php artisan queue:work
```

You must keep this running for migration jobs to finish.

---

## 🏗️ **Ticket Type Databases Setup**

After seeding, each ticket type must generate its own database.

### **6. Create databases + run ticket migrations**
This command will:
- Dispatch jobs to create a database for every ticket type  
- Run the migrations inside `database/migrations/tickets` for each database

```bash
php artisan app:create-ticket-type-migration
```

> Add all table schemas for ticket-type databases to  
> `database/migrations/tickets`.

---

## ➕ **Adding a New Ticket Type (Admin Panel)**

You can add new ticket types directly from the **Admin Panel**.

When a new ticket type is created:
- A new MySQL database is created  
- Ticket table migrations run automatically in the background (queued job)

⚠ Make sure `php artisan queue:work` is running.

---

## 🔄 **Syncing New Ticket Table Migrations**

If new migrations are added to `database/migrations/tickets`, apply them to all ticket-type databases:

```bash
php artisan app:sync-ticket-table-migration
```

This also uses queue jobs → ensure the queue worker is running.

---

## ▶️ **Run the Application**
```bash
php artisan serve
```

---

## 🔧 **Notes**
- All ticket type DB schemas live in `database/migrations/tickets`.
- Admin panel allows creation of new ticket types dynamically.
- Ensure your MySQL user has **CREATE DATABASE** privilege.

