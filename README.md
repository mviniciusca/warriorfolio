<h1 align="center">Warriorfolio</h1>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/main/public/img/logo-black.png" width="50%" alt="Descrição da imagem">
</p>

<h5 align="center">A Laravel 10 application that provides a platform to create an online portfolio</h5>

<h1 align="center"></h1>

[![WIP](https://img.shields.io/badge/Work%20in%20Progress-yellow)]()&nbsp;&nbsp;&nbsp;&nbsp;
[![GitHub issues](https://img.shields.io/github/issues/mviniciusca/warriorfolio)]()&nbsp;&nbsp;&nbsp;&nbsp;<!-- license badge -->
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://opensource.org/licenses/MIT)&nbsp;&nbsp;&nbsp;&nbsp;<!-- laravel badge -->
[![Laravel](https://img.shields.io/badge/Laravel-10-red)]()&nbsp;&nbsp;&nbsp;&nbsp;<!-- filament badge -->
[![Filament](https://img.shields.io/badge/Filament-2.0.0-green)]()&nbsp;&nbsp;&nbsp;&nbsp;<!-- mysql badge -->
[![MySQL](https://img.shields.io/badge/MySQL-5.7-orange)]()&nbsp;&nbsp;&nbsp;&nbsp;<!-- Work In Progress-->


## About 
This project is a web-based application built on Laravel 10 framework that provides a platform to create an online portfolio. Users can add information about themselves, showcase their work through images, add client logos, and provide a contact form for interested parties. The administrative panel of the application is managed by Filament, a Laravel plugin.

## Features

- User-friendly interface for portfolio creation
- Ability to upload images of work
- Contact form integration
- Client logo display
- Easy to use administrative panel with Filament
- Ability to create a list of recent certifications


## To-Do:

- [ ] Create a dashboard to manage received emails
- [ ] Allow the admin to edit the initial message displayed on the website via the admin panel
- [ ] Add the ability to add tags for the user's main skills


## Installation
1. Clone the repository using `git clone`
2. Run `composer install` to install dependencies
3. Create a `.env` file by copying the `.env.example` file
4. Update the `.env` file with the appropriate database credentials
5. Run `php artisan key:generate` to generate an application key
6. Run `php artisan migrate` to create database tables
7. Run `php artisan serve` to start the application
8. Visit `http://localhost:8000` in your web browser to access the application

## Dependencies
- Laravel 10
- Filament Plugin
- PHP 8.1 or higher
- MySQL 5.7 or higher

## Usage
Once the application is installed, users can navigate to the home page to begin creating their portfolio. From there, they can add personal information, upload images of their work, and add client logos. The contact form is already integrated into the application.

The administrative panel can be accessed by navigating to `http://localhost:8000/admin` and logging in with the appropriate credentials. From there, users can manage portfolio content and view submitted contact forms.

## Support
If you encounter any issues or have questions, please reach out to the project contributors through the repository's issue tracker.

## Contributing
Contributions to the project are welcome! Please fork the repository and submit a pull request.

## License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
