# SIA
Template for the development of an application for the management of sports clubs
=======
This project was developed for the end-of-degree project on web application development (DAW).

The project consists of a platform for the management of a real personal library where different libraries can be created. In each of the libraries, you can register all the books you want. For these books, you can add notes that you consider important.

Another functionality included is the ability to register loans for each book to keep more accurate control of who has the book, since when they have it, and when it is scheduled to be returned.

The platform also allows you to view the libraries of other users who have made them public and rate them with a like.

## Technologies Used

- **PHP 8:** Backend development using the Laravel 10 framework.
- **Laravel 10:** MVC framework for building the web application.
- **MySQL:** Database management for storing and retrieving data.
- **HTML5:** Structuring the content of the web pages.
- **CSS3:** Styling the application, with **Tailwind CSS** used for modern and responsive design.
- **JavaScript:** Adding interactivity and enhancing the user experience on the front end.
- **Blade Templating Engine:** Laravel's templating system for dynamically generating views.

These technologies work together to provide a robust, scalable, and user-friendly platform for managing personal libraries and facilitating book lending.

## Installation

To get started with the project, follow these steps:

1. **Clone the repository:**
   
       git clone https://github.com/Andrei-Chiorian/cloudLib.git

2. **Navigate to the project directory:**
   
       cd cloudLib

3. **Install dependencies:**
   
       composer install
       npm install

4. **Set up the environment:**
   
   Duplicate .env.example and rename it to .env.
   Configure your database and other environment variables in the .env file.
  
5. **Generate an application key:**
  
       php artisan key:generate
   
6. **Run database migrations:**
    
       php artisan migrate
   
7. **Start the development server:**
    
        php artisan serve
        npm run dev

8. **Open your browser and visit:**
 
        http://localhost:8000

## Customization
You can customize various aspects of the project:

- **UI Styling:** Modify the Tailwind CSS configurations in tailwind.config.js and styles in the resources/css directory.
- **Database Structure:** Adjust the migrations or models in the database/migrations and app/Models directories.
- **Routes and Controllers:** Customize the logic in routes/web.php and the corresponding controllers in app/Http/Controllers.
    
## Contributions
Contributions are welcome! If you have suggestions or improvements, feel free to fork the repository and submit a pull request. Feedback and enhancements are highly appreciated.

## License
This project is licensed under the MIT License.

## Contact
- **Name:** Andrei Chiorian
- **Email:** contacto@andreiwebdevelopment.es
- **LinkedIn:** https://www.linkedin.com/in/andrei-chiorian-web-development
- **GitHub:** https://github.com/Andrei-Chiorian

