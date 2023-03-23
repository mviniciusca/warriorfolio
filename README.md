<h1 align="center">warriorfolio</h1>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/main/public/img/logo-color.png" width="30%" alt="Descrição da imagem">
</p>

<h5 align="center" style="text-align: center; font-weight: normal; text-transform: lowercase">A Laravel application that provides a platform to create an online portfolio</h5>

<h1 align="center"></h1>

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)&nbsp;&nbsp;&nbsp;&nbsp;
[![PHP](https://img.shields.io/badge/PHP-8.1-blue)](https://www.php.net/releases/8.1/en.php)&nbsp;&nbsp;&nbsp;&nbsp;
[![Laravel](https://img.shields.io/badge/Laravel-10-red)](https://laravel.com/docs/10.x/readme)&nbsp;&nbsp;&nbsp;&nbsp;
[![Filament](https://img.shields.io/badge/Filament-2.17-green)](https://filamentphp.com/docs)&nbsp;&nbsp;&nbsp;&nbsp;
[![Tailwind](https://img.shields.io/badge/Tailwind-2.2.19-blue)](https://tailwindcss.com/)&nbsp;&nbsp;&nbsp;&nbsp;
[![Livewire](https://img.shields.io/badge/Livewire-2.12-pink)](https://laravel-livewire.com/)&nbsp;&nbsp;&nbsp;&nbsp;

## About 
This project is a web-based application built on Laravel 10 framework that provides a platform to create an online portfolio. Users can add information about themselves, showcase their work through images, add client logos, and provide a contact form for interested parties. The administrative panel of the application is managed by Filament, a Laravel plugin.

## Features

- User-friendly interface for portfolio creation
- Ability to upload images of work
- Contact form integration
- Client logo display
- Easy to use administrative panel with Filament
- Ability to create a list of recent certifications
- Ability to create a list of skills
- Ability to add your social media link, job title and location


## To-Do:

- [ ] Create a dashboard to manage received emails 
- [x] *~~Allow the admin to edit the initial message displayed on the website via the admin panel~~* **implemented commit 3ddb316** 
- [x] *~~Add the ability to add tags for the user's main skills~~* **implemented commit: commit 402e0d1** 
- [x] *~~Add a default background image to the hero section of the website~~* **implemented commit: b9d4cf4**


## Installation
1. Clone the repository using `git clone`
2. Run `composer install` to install dependencies
3. Create a `.env` file by copying the `.env.example` file
4. Update the `.env` file with the appropriate database credentials
5. Run `php artisan key:generate` to generate an application key
7. Run `php artisan migrate` to create database tables
8. Run `php artisan make:filament-user` to create a user for the administrative panel
9. Run `npm install` to install dependencies
10. Run `php artisan serve` to start the application
11. Visit `http://localhost:8000/admin` in your web browser to access the application
12. Go to Pages and create a new page
13. Set `add to blocks`, choose `Page Body` with the slug `/` and the title `Home`
14. Save
15. Go to `http://localhost:8000` to view the application

## Dependencies
- Laravel 10
- Filament Plugin
- PHP 8.1 or higher
- Database (MySQL, PostgreSQL, SQLite ..)

## Usage
Once the application is installed, users can navigate to the home page to begin creating their portfolio. From there, they can add personal information, upload images of their work, and add client logos. The contact form is already integrated into the application.

The administrative panel can be accessed by navigating to `http://localhost:8000/admin` and logging in with the appropriate credentials. From there, users can manage portfolio content and view submitted contact forms.

## Support
If you encounter any issues or have questions, please reach out to the project contributors through the repository's issue tracker.

## Contributing
Contributions to the project are welcome! Please fork the repository and submit a pull request.

## Contact
You can reach out to the project contributors through the repository's issue tracker. Or, you can reach out to me directly at [@marcosvca_](https://twitter.com/marcosvca_)

## License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
