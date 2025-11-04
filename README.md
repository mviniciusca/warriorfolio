<p align="center">
  <h1 align="center">Warriorfolio 2</h1>
  <p align="center">A Modern Portfolio & Blog Platform Built with Laravel</p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Filament-3.x-FFAA00?style=flat" alt="Filament">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
</p>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/main/public/img/core/demo/featured.png" alt="Warriorfolio 2 Preview">
</p>

---

## Introduction

Warriorfolio is a powerful, modular portfolio and blog platform that empowers users to create personalized, professional websites with ease. Built on Laravel's robust foundation, it combines flexibility with user-friendly administration.

**Key Highlights:**
- **Modular Architecture** - Components integrate seamlessly like building blocks
- **No-Code Management** - 100% managed through an intuitive Control Panel
- **Flexible Deployment** - From simple landing pages to complex multi-page sites
- **Professional Results** - Perfect for developers, designers, and creative professionals

---

## What's New in v2.2.0

November, 2025

### Major Features
- **Juno Theme** - The first official theme for Warriorfolio 2 with tabbed interface
- **Portfolio Gallery** - Complete redesign with advanced filtering and quick view
- **Fast Search** - Debounced search for Blog and Portfolio sections
- **Quickbar** - Quick access menu for faster navigation
- **Dashboard Redesign** - Improved layout with new widgets
- **GitHub Integration** - Display repositories and contributions (Juno Theme)

---

## Features

### Content Management
- Blog system with password protection and reading time
- Portfolio/Projects with categories, tags, and SEO optimization
- Page builder with modular content blocks
- Newsletter subscription integration
- Advanced search and filtering

### User Interface
- **Saturn UI** - Modern, responsive design system
- Multiple themes (Default, Juno)
- Dark/Light mode with inverse theme support
- Browser mockup component for project showcases
- Customizable hero sections with multiple layouts

### Professional Tools
- Resume/CV management and download
- LinkedIn "Open to Work" badge integration
- Skills and certifications display
- Course tracking
- Customer/Client showcase
- Social media integration

### Admin Panel
- Intuitive Filament-powered dashboard
- Real-time notifications and alerts
- Analytics integration (Google Analytics)
- Contact form with reCAPTCHA v2
- WhatsApp integration
- Email inbox management

### Developer Features
- Modular component architecture
- Maintenance and Discovery modes
- SEO-friendly URLs and meta tags
- Query optimization for performance
- Comprehensive documentation
- Module visibility controls

---

## Installation

### Quick Start (Composer)

```bash
composer create-project mviniciusca/warriorfolio
cd warriorfolio
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed
php artisan serve
```

### Manual Installation

```bash
# Clone the repository
git clone https://github.com/mviniciusca/warriorfolio.git
cd warriorfolio

# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate
php artisan storage:link

# Setup database
php artisan migrate:fresh --seed

# Start development servers
php artisan serve

# In a new terminal
npm run dev
```

---

## System Requirements

**Server Requirements:**
- PHP 8.2 or higher
- PHP Extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo, GD, Zip
- Database: MySQL 5.7+, PostgreSQL 10+, or SQLite 3.8+
- Composer 2.0 or higher
- Node.js 18+ and NPM 10.2+

**Recommended:**
- PHP 8.3+
- MySQL 8.0+ or PostgreSQL 14+
- Redis for caching and sessions

---

## Advanced Features

### Content Blocks
The application provides versatile code blocks and structural components that enable countless customization possibilities. Components are organized into three categories:
- **Components** - Reusable UI elements
- **Design** - Layout and styling options
- **Core** - Fundamental system modules

### Maintenance Mode
Enable maintenance mode while keeping essential features active:
- Contact form accessibility
- Social media links
- Custom maintenance message

### Discovery Mode
Preview your application during maintenance:
- Visible only to administrators
- Visual indicator banner
- Test changes before going live

### Module Management
Customize which core modules appear on your site:
- Header & Navigation
- Hero Section
- About Section
- Projects/Portfolio
- Customers/Clients
- Contact Form
- Newsletter
- Footer

---

## Documentation

Comprehensive documentation is available at [warriorfolio.vercel.app](https://warriorfolio.vercel.app/)

**Topics covered:**
- Installation and configuration
- Module customization
- Theme development
- Component usage
- API integration
- Deployment guides

---

## Technology Stack

Warriorfolio is built with industry-leading technologies:

| Technology | Purpose | Creator |
|------------|---------|---------|
| **Laravel** | PHP Framework | Taylor Otwell |
| **Filament** | Admin Panel Toolkit | Dan Harrin, Zep Fietje & Community |
| **Livewire** | Real-time Components | Caleb Porzio |
| **Tailwind CSS** | Utility-first CSS | Adam Wathan |
| **Alpine.js** | JavaScript Framework | Caleb Porzio |

---

## Contributing

We welcome contributions from the community! Here's how you can help:

### Reporting Issues
- Use GitHub Issues for bug reports
- Include steps to reproduce
- Provide environment details
- Add screenshots if applicable

### Pull Requests
- Fork the repository
- Create a feature branch
- Follow PSR-12 coding standards
- Write descriptive commit messages
- Update documentation as needed

### Feature Requests
- Open a discussion on GitHub
- Describe the use case
- Explain the expected behavior

---

## Security

If you discover a security vulnerability, please email security contact privately. Do not open public issues for security concerns.

---

## License

Warriorfolio is open-source software licensed under the [MIT license](LICENSE).

---

## Acknowledgments

**Special Thanks:**
- Warriorfolio 1 users and early adopters
- All contributors and community members
- Taylor Otwell and the Laravel team
- Dan Harrin, Zep Fietje, and the Filament team
- Caleb Porzio for Livewire and Alpine.js
- The entire PHP and Laravel community

---

## Support

- **Documentation:** [warriorfolio.vercel.app](https://warriorfolio.vercel.app/)
- **Issues:** [GitHub Issues](https://github.com/mviniciusca/warriorfolio/issues)
- **Discussions:** [GitHub Discussions](https://github.com/mviniciusca/warriorfolio/discussions)
- **Twitter:** [@marcosvca_](https://twitter.com/marcosvca_)

---

<p align="center">
  <strong>Developed with ❤️ by <a href="https://twitter.com/marcosvca_">Marcos Coelho</a></strong>
</p>

