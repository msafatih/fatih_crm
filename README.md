# Fatih CRM - Internet Service Provider Customer Management

A web-based CRM system built with Laravel for managing Internet Service Provider customers, from leads to subscriptions.

## Features

- **Multi-role System**
  - Admin: Full system access
  - Manager: Project approval and product management
  - Sales: Lead and customer management

- **Lead Management**
  - Track potential customers
  - Convert leads to customers
  - Monitor lead status

- **Project Management**
  - Create projects for leads
  - Project approval workflow
  - Automatic customer creation

- **Product Management**
  - Internet package management
  - Price and speed configuration
  - Active/inactive status

- **Customer Management**
  - Customer profiles
  - Subscription tracking
  - Service history

## Requirements

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM

## Installation

1. Clone the repository
```bash
git clone https://github.com/msafatih/fatih_crm/
cd fatih_crm
```

2. Install PHP dependencies
```bash
composer install
```

3. Install frontend dependencies
```bash
npm install
```

4. Create environment file
```bash
cp .env.example .env
```

5. Configure your .env file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fatih_crm
DB_USERNAME=root
DB_PASSWORD=
```

6. Generate application key
```bash
php artisan key:generate
```

7. Run database migrations and seeders
```bash
php artisan migrate --seed
```

8. Build frontend assets
```bash
npm run build
```

9. Start the development server
```bash
php artisan serve
```

## Default Users

After running seeders, you can login with these accounts:

```
Admin:
Email: admin@example.com
Password: password

Manager:
Email: manager@example.com
Password: password

Sales:
Email: sales@example.com
Password: password
```

## Project Structure

```
fatih_crm/
├── app/
│   ├── Http/Controllers/      # Controllers
│   ├── Models/               # Database models
│   └── View/Components/      # Blade components
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   └── views/
│       └── dashboard/        # Dashboard views
└── routes/
    └── web.php              # Web routes
```

## Key Workflows

### Lead to Customer Conversion

1. Sales creates a new lead
2. Sales creates a project for the lead
3. Manager reviews and approves/rejects the project
4. On approval:
   - Lead is converted to customer
   - Subscription is created
   - Project status is updated

### Subscription Management

1. Customers can have multiple subscriptions
2. Each subscription is linked to a product
3. Subscriptions have start and end dates
4. Active subscriptions are tracked separately

## Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Database Refresh
```bash
php artisan migrate:fresh --seed
```

## License

This project is private and confidential. Unauthorized copying or distribution is prohibited.
