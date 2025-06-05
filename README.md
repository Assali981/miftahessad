# Miftach Assaad Foundation Website

A modern, multilingual Laravel website for the Miftach Assaad Foundation (مؤسسة مفتاح السعد), featuring Arabic, English, and French language support with contemporary design and comprehensive admin functionality.

## 🌟 Features

### Multilingual Support
- **Arabic (العربية)**: Right-to-left (RTL) layout with Amiri font
- **English**: Left-to-right (LTR) layout with Inter font
- **French (Français)**: Left-to-right (LTR) layout with Inter font
- Seamless language switching with visual feedback
- Proper locale management and session persistence

### Modern Design
- Contemporary UI with glassmorphism effects
- Brand colors: #5EB7E0 (light blue), #F67902 (orange), #FFB203 (golden yellow)
- Responsive design optimized for all devices
- Smooth animations and micro-interactions
- Enhanced accessibility features

### Admin System
- Secure admin authentication
- Content management capabilities
- Role-based access control
- Media management
- Multilingual admin interface

## 🚀 Quick Start

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js and NPM
- MySQL database
- Web server (Apache/Nginx) or Laravel's built-in server

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/miftach-assaad-foundation.git
   cd miftach-assaad-foundation
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   - Create a MySQL database named `miftahessaad`
   - Update `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=miftahessaad
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed --class=AdminSeeder
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Create storage link**
   ```bash
   php artisan storage:link
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

The website will be available at `http://127.0.0.1:8000`

## 🔧 Configuration

### Environment Variables

Key environment variables to configure:

```env
# Application
APP_NAME="Miftach Assaad Foundation"
APP_LOCALE=ar
APP_FALLBACK_LOCALE=ar

# Database
DB_CONNECTION=mysql
DB_DATABASE=miftahessaad
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@miftahessaad.com"
```

### Admin Access

Default admin credentials (change after first login):
- **Email**: admin@miftahessaad.org
- **Password**: MiftahAdmin2025!

Access the admin panel at: `/admin/login`

## 🌍 Language Support

### Supported Languages
- **Arabic (ar)**: Default language, RTL layout
- **English (en)**: LTR layout
- **French (fr)**: LTR layout

### Adding Translations
Language files are located in `resources/lang/`:
- `resources/lang/ar/messages.php` - Arabic translations
- `resources/lang/en/messages.php` - English translations
- `resources/lang/fr/messages.php` - French translations

### Language Switching
Users can switch languages using the language toggle in the navigation header or footer.

## 🎨 Design System

### Brand Colors
- **Primary**: #5EB7E0 (Light Blue)
- **Accent**: #F67902 (Orange)
- **Golden**: #FFB203 (Golden Yellow)

### Typography
- **Arabic**: Amiri font family
- **English/French**: Inter font family

### Components
- Modern button system with gradients and animations
- Enhanced card layouts with hover effects
- Responsive navigation with mobile menu
- Language switcher with visual feedback

## 📱 Responsive Design

The website is fully responsive and optimized for:
- Desktop computers (1200px+)
- Tablets (768px - 1199px)
- Mobile phones (320px - 767px)

## 🔒 Security Features

- CSRF protection
- SQL injection prevention
- XSS protection
- Secure admin authentication
- Environment-based configuration

## 🛠 Development

### Asset Compilation
```bash
# Development
npm run dev

# Production
npm run build

# Watch for changes
npm run dev -- --watch
```

### Code Style
The project follows Laravel coding standards and PSR-12.

### Testing
```bash
php artisan test
```

## 📂 Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── resources/
│   ├── lang/          # Language files
│   ├── views/         # Blade templates
│   └── css/           # Stylesheets
├── routes/
│   └── web.php        # Web routes
├── database/
│   ├── migrations/    # Database migrations
│   └── seeders/       # Database seeders
└── public/            # Public assets
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This project is proprietary software for the Miftach Assaad Foundation.

## 📞 Support

For support or questions, please contact the development team or create an issue in the repository.

---

**Miftach Assaad Foundation** - Preserving Morocco's cultural heritage through innovation and community.
