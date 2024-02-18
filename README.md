##
 <p align="center"> Warriorfolio 2 : Work In Progress  </p>

<p align="center">
  <img src="https://raw.githubusercontent.com/mviniciusca/warriorfolio/v2-dev-master/public/img/gif/ezgif-7-41f5195607.gif"  alt="Warriorfolio 2 wip">
</p>

⚠️ This project is a work in progress.

⚠️ This documentation is still under development and is being written, so it may contain errors or incomplete information. Remind that this is a work in progress and is being written in parallel with the development of the project.

⚠️ It has not been reviewed yet.

___
### Fast Documentation
- [](#)
  - [Fast Documentation](#fast-documentation)
  - [Introduction to Warriorfolio 2](#introduction-to-warriorfolio-2)
  - [Features](#features)
  - [Additional Resources](#additional-resources)
    - [Content Blocks](#content-blocks)
    - [Maintenance Mode](#maintenance-mode)
    - [Discovery Mode](#discovery-mode)
    - [Core Modules Decoupling](#core-modules-decoupling)
  - [Gear \& Core](#gear--core)
  - [Requirements](#requirements)
  - [Installation and Configuration](#installation-and-configuration)
  - [Time to Fly](#time-to-fly)
  - [Post-Build: Getting to Know Warriorfolio 2 Better](#post-build-getting-to-know-warriorfolio-2-better)
      - [Changing the Default Theme Color](#changing-the-default-theme-color)
      - [Editing the Public Texts of Your App](#editing-the-public-texts-of-your-app)
      - [Editing Your App's Highlight](#editing-your-apps-highlight)
      - [Creating Image Slideshow](#creating-image-slideshow)
      - [Newsletter or Email Catcher Module](#newsletter-or-email-catcher-module)
      - [Editing Your SEO Information](#editing-your-seo-information)
      - [Organizing the Order of Modules](#organizing-the-order-of-modules)
  - [Warriorfolio 2 in Production](#warriorfolio-2-in-production)
  - [Quick: Wiki, Tips \& FAQ](#quick-wiki-tips--faq)
  - [Contributions, Feedback, and Bugs Report](#contributions-feedback-and-bugs-report)
  - [Support](#support)
  - [Acknowledgments](#acknowledgments)
  - [License](#license)

### Introduction to Warriorfolio 2
Warriorfolio aims to be simple, fast, and effective in creating your portfolio. Arriving in its new version more robust, smarter, flexible, and with new intuitive features. Designed with a modular concept, you can easily choose the order in which your page will be assembled and displayed to the public. From a Landing Page to a complete site with separate pages, but with modules that integrate with each other, like a true LEGO, Warriorfolio 2 is the ideal tool for you who want to have a simple, fast, and effective portfolio.

Designed to be 100% managed by the Control Panel, without the need for deep technical knowledge in programming, PHP, or even in Laravel.

Feel free to contribute to the project and fork it, but don't forget to give credit to the creators of Laravel, Filament, and Livewire.

And me, of course! 😁

### Features
- Robust and Flexible Control Panel;
- Maintenance Mode and Discovery Mode;
- Core Modules;
- Flexible, Customizable, and Sortable Free Modules;
- Portfolio Image Gallery;
- Image Slideshow;
- Customer Showcase;
- Skills Display;
- Email catcher for lead capture;
- Integration with Google Analytics;
- Curriculum for download;
- Open to Work icon;
- Biography, Certificates, and Courses;
- Contact via WhatsApp;
- Contact form;
- Panel for Reading Received Messages;

and more...

### Additional Resources

#### Content Blocks
- You don't need to stick to the way Warriorfolio is designed. Designed with modularity in mind, the app offers extremely versatile code blocks, or structural components. You can make countless combinations and further customize your project. These elements are divided into: Components, Design, and Core.
#### Maintenance Mode
- Put your app in maintenance mode. You have the option to activate the contact form and your social networks;
#### Discovery Mode
- Activate this feature and you will be able to view your app while it is in maintenance mode; In addition, a stripe with the notice that Discovery Mode is enabled will be displayed at the top of your app.
#### Core Modules Decoupling
- You can decouple the Core modules. This means you can build your app's layout your way. By default, Warriorfolio is assembled as follows: Header, Hero Section, About You, Projects, Customers, Contact, Newsletter (Email Catcher), and Footer. If you want to create a new page, these modules will automatically be available in this order for you globally. However, you may only want the Header and Footer to be displayed. To do this, just go to App Settings > Core Modules Decoupling and disable the modules you don't want to be displayed.

### Gear & Core
This is a PHP application with Laravel and Filament at its Core. Filament is a set of tools that allows the creation of a control panel or content manager for Laravel. Conceived by Dan Harrin, Zep Fietje, and the entire PHP community. Filament is constantly evolving and is a highly tested, secure, robust, scalable product with complete and easy-to-understand documentation.

Filament is powered by Livewire technology, which is a framework for Laravel that allows the creation of real-time applications without the need for deep JavaScript knowledge. Livewire is a product of Caleb Porzio, creator of AlpineJs.

Warriorfolio 2 is also under the guardianship of one of the world's largest frameworks, Laravel. Created by Taylor Otwell, Laravel is a robust, secure, scalable framework with complete and easy-to-understand documentation. Laravel is a framework that is constantly evolving and is a highly tested product with an active and engaged community.

### Requirements 
- 🐘 PHP 8.1 or higher;
- 🧪 PHP Extensions enabled mainly OpenSSL, PDO and Zip;
- 💾 Database such as MySQL, PostgreSQL or SQLite;
- 🤵🏻 Composer 2.0 or higher;
- 🌱 NPM;
- 💎 800MB of disk space or higher;

### Installation and Configuration
To install this application, we follow the standard Laravel installation. If you already know how to use Laravel, you can skip this part.

If you are not familiar with Laravel or want to check how Warriorfolio 2 works, follow the steps below:

- Clone this repository:
```
git clone 
```
- Access the project folder:
- Beforehand, we will need some extensions, you may need to go ahead and 

```	
install php-zip
```

- Install Composer dependencies:
```
composer install
```
- Install the NPM dependencies:
```
npm install
```
- Copy the `.env.example` file and rename it to `.env`, then generate the key for your app:
```
php artisan key:generate
```
- Now sync the public storage files
```
php artisan storage:link
```
- In the `.ENV` file, configure the database and your app's URL:
    > *If you are not familiar with Laravel, follow the steps below:*
    > *Open the `.env` file and look for the lines below:*
    > *DB_CONNECTION=mysql*
    > *DB_HOST=*

    > *If you are using SQLite, don't forget to create the `database.sqlite` file in the root of the database folder*

- In **`APP_URL`**, put the address of your site, for example: http://127.0.0.1:8000 or https://mysite.com       
    > *This app needs the complete URL to work correctly in development and production environments. Locally, don't forget to include the port or even use your IP 127.0.0.1:8000*    

- Run the command below to create the tables and populate the database:
```
php artisan migrate --seed
```

In this command, the entire system will be set up, and your app will be almost ready for use!


- If everything went well, run the command below to start the server and in a new terminal window run the Laravel asset compiler:
```
npm run dev
```


### Time to Fly
Access the address (usually http://127.0.0.1:8000) and see your app running -Isn't It beautiful? - yeah, I know because I created it! 😁

Now just access the control panel and start creating your portfolio. To access the control panel, access your app's URL and add `/admin` at the end and log in with the credentials below:

```
Username => warriorfolio@test.dev
Password => password
```

⚠️ It is highly recommended that you change this password and email for more security, especially in a production environment.

### Post-Build: Getting to Know Warriorfolio 2 Better

Great, you have your application running and are already logged into the control panel. Now it's time to get to know Warriorfolio 2 better and start creating your portfolio. Maybe you want to make some advanced customizations, or even change the default theme color. Let's go?

##### Changing the Default Theme Color
Warriorfolio 2 is built with Tailwind CSS through Vite.

In the project root, you will find a file called `tailwind.config.js`. In this file, you can edit the default theme color. Look for this line of code:

```
theme: {
    extend: {
        colors: {
        primary: colors.purple,
        secondary: colors.zinc,
        tertiary: colors.rose,
        }
    },
},
```

Understand that, once modified, these changes are global. The default theme colors are: `primary`, `secondary`, and `tertiary`, represented by the colors `purple`, `zinc`, and `rose`.

You can edit the theme colors, or even add new colors, but following the Tailwind standard. To learn more about Tailwind CSS, visit the official documentation at: https://tailwindcss.com/docs


##### Editing the Public Texts of Your App
Unlike the previous version, Warriorfolio 2 allows you to edit the public texts of your app through the Control Panel. They are represented by modules, and you can edit them at any time. The modules and texts for editing are in **App Sections**.

##### Editing Your App's Highlight
We have a beautiful highlight in Warriorfolio 2. It is the highlight of the text of each section and can be used in other areas of the app. It partially follows the primary colors of the theme.

To edit the highlight to something more customized, you must follow this step:

In the `resources/css` folder, you will find a file called `app.css`. In this file, you can edit the highlight to something more customized.

Look for the code:
```
/** Highlighted text **/

.text-highlight {
@apply text-transparent
bg-clip-text bg-gradient-to-r to-primary-600 from-rose-400 font-bold;
}
```

##### Creating Image Slideshow
It's very simple, just click on **Slideshow** in the control panel and add the images you want. And choose in which module you want to display the slideshow.

As it is a Landing Page, only one slideshow per module will be displayed and the most recent one created.

##### Newsletter or Email Catcher Module
You can enable or disable the email capture module. It is denominated as a newsletter, but for now, its functionality is only to capture emails. You can export the captured emails in Excel format and use them in your email marketing campaign.

##### Editing Your SEO Information
To edit your SEO information, access the control panel and click on **SEO**. You will see your SEO. Click on **Edit** and edit the information you want.

##### Organizing the Order of Modules
Warriorfolio 2 is modular, and this concept also applies to content editing. By default, it follows a display order, but you can change the order of the modules at any time. To do this, click on `Pages/Home` and choose the order of the modules. By default, it is composed as follows:


1 - Header
2 - Hero Section
3 - Projects
4 - Courses
5 - Customers
6 - Footer


### Warriorfolio 2 in Production

>⚠️
>Create a strong password for your app.
>When deploying your Filament administration panel in a non-local environment and receiving 403 Forbidden errors when trying to access it, you may have forgotten to configure your user model to access Filament.

**You must implement the FilamentUser contract:**
```php
<?php
 
namespace App\Models;
 
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class User extends Authenticatable implements FilamentUser
{
    // ...
 
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }
}

```

The `canAccessPanel()` method returns true or false depending on whether the user is allowed to access the `$panel`. In this example, we check if the user's email ends with `@yourdomain.com` and if they have verified their email address.

You can find this information in the Filament Documentation at: [Filament Documentation](https://filamentphp.com/docs/3.x/panels/users#authorizing-access-to-the-panel)

### Quick: Wiki, Tips & FAQ

In this section, you will find some quick tips, questions, and answers about Warriorfolio 2.

- **Avoid creating users. Warriorfolio 2 is not created for multi-users.**
  - Warriorfolio 2 is an app created to be simple and fast. It is not an app for multi-users. If you need a multi-user app, use WordPress. There are no plans to add multi-users. In some cases, the file or information obtained will be generated from the first or last default user of the system. You may end up breaking or having to reboot the application.

- **Do not change the names of folders or files.**
  - Unless you know exactly what you are doing, it is not recommended to change the names of folders or files. Warriorfolio 2 is a closed system and follows the Laravel standard.

- **Why the limit of 12 projects in Warriorfolio 2?**
  - As it is a Landing Page, I believe that up to 12 items of display are sufficient to make loading fast and dynamic. Remembering that you can register as many projects as you want and even change this display configuration.

- **Do I need to pay to use Warriorfolio 2?**
  - No. Warriorfolio 2 is an Open Source app and is under the MIT license. You can use, modify, and even sell your app. But don't forget to give credit if possible to the creators of Laravel, Filament, and Livewire. And to me, right? :) <3

- **Can I use Warriorfolio 2 for commercial purposes?**
  - Yes. You can use Warriorfolio 2 for commercial purposes. Remembering that it is an Open Source app and is under the MIT license. You can use, modify, and even sell your app. But don't forget to give credit if possible to the creators of Laravel, Filament, and Livewire. And to me, right? :) <3

- **Can I use Warriorfolio 2 for personal purposes?**
  - Yes. You can use Warriorfolio 2 for personal purposes. That's what it was created for. So you can have a simple, fast, and effective portfolio.

- **Where can I find the Filament Documentation?**
  - [Filament Documentation](https://filamentphp.com/docs) here you will find the complete Filament documentation.

- **Where can I find the Livewire Documentation?**
  - [Livewire Documentation](https://laravel-livewire.com/docs) here you will find the complete Livewire documentation.

- **Where can I find the Laravel Documentation?**
  - [Laravel Documentation](https://laravel.com/docs) here you will find the complete Laravel documentation.

### Contributions, Feedback, and Bugs Report

If you have found a bug, or want to contribute to the project, or even give feedback, feel free to open an issue or a pull request.

Feel free to contribute, fork, and leave your feedback.

### Support

Feel free to open an issue or a pull request. Your feedback is very important to me.

### Acknowledgments

- To the users of Warriorfolio 1;
- To the feedback and contributions of Warriorfolio 1 users;
- Taylor Otwell, creator of Laravel;
- Dan Harrin, Zep Fietje, and the entire PHP community, creators of Filament;
- Caleb Porzio, creator of Livewire;
- To the entire PHP and Laravel community;

### License

Warriorfolio 2 is an Open Source application and is under the MIT license.



