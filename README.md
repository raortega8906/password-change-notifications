<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Password Change Notifications (This project is under construction)

**Password Change Notifications** is a Laravel-based application designed to notify users about password update statuses for their assigned projects. It automates notifications, provides a centralized dashboard, and ensures efficient project management.

## Features

- **Automated notifications**: Daily reminders for projects with outdated passwords.
- **Project state management**: Track and update project password statuses (`Not Updated` or `Updated`).
- **User-friendly dashboard**: Centralized interface to manage projects and notifications.
- **Cron automation**: Automates daily notifications and quarterly project state resets.

## Requirements

Make sure you have the following installed:

- PHP >= 8.1
- Composer
- MySQL or any other compatible database

## Installation

Follow these steps to set up the project locally:

1. Clone this repository:

    ```bash
    git clone https://github.com/raortega8906/password-change-notifications.git
    cd password-change-notifications
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Create the `.env` file from the example provided:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Configure the database credentials in the `.env` file.

6. Run the database migrations:

    ```bash
    php artisan migrate --seed
    ```

7. Set up cron jobs for automation:
    - Add the following to your crontab:
      ```bash
      * * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1
      ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

Your application should be running at [http://localhost:8000](http://localhost:8000).

## Contribution

Contributions are welcome! If you'd like to collaborate, please open an issue or submit a pull request.

## Security

If you discover any security vulnerabilities, please report them to [your-email@example.com](mailto:your-email@example.com).

## License

This project is licensed under the [MIT License](LICENSE).
