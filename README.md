<h1 align="center">warriorfolio</h1>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/main/public/img/logo-color.png" width="30%" alt="Descrição da imagem">
</p>

<h5 align="center" style="text-align: center; font-weight: normal;">A Laravel application that provides a platform to create an online portfolio</h5>

<h1 align="center"></h1>

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
- Receive messages from the website 
- Read, edit, add to favorite and delete messages


## Installation
1. Clone the repository using `git clone`
2. Run `composer install` to install dependencies
3. Create a `.env` file by copying the `.env.example` file
4. Update the `.env` file with the appropriate database credentials
5. Run `php artisan key:generate` to generate an application key
6. Run `php artisan storage:link` to creates a symbolic link between the storage directory and the public directory.
7. Run `php artisan migrate --seed` to create database tables and seed the database: Warriorfolio comes with some defaults values in DatabaseSeeder. 


> :warning: **Note**: The default username is **'warriorfolio@test.dev'** and the default password is **'admin'**. It's recommended to delete this user and create a new set of credentials.


1. Run `php artisan make:filament-user` to create a user for the administrative panel
2. Run `npm install` to install dependencies
3.  Run `php artisan serve` to start the application
4.  Visit `http://localhost:8000/admin` in your web browser to access the application
5.  Go to Pages and create a new page
6.  Set `add to blocks`, choose `Page Body` with the slug `/` and the title `Home`
7.  Save
8.  Go to `http://localhost:8000` to view the application

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
