
# Vaccine Registration Application

[**Vaccine Registration Google Form 1**](https://forms.gle/i8AyxmZeBorwcZcZ7)  
[**Vaccine Registration Google Form 2**](https://forms.gle/V3gu6zo2gkCYmD6A8)

This Vaccine Registration Application helps users register for vaccinations at designated centers, schedule appointments, and receive notifications about their vaccination schedules. The system integrates with Google Forms for user registration and Zapier for automation, ensuring a seamless and efficient process.

## Features

- **Google Form Integration**: Users can register for vaccines through the Google Forms links above, which collect necessary data.
- **Automated Registration via Zapier**: Zapier automates the registration process by linking Google Form submissions with the backend system.
- **Vaccine Center Management**: Manage vaccine centers, including daily scheduling limits.
- **User Scheduling**: Automatically schedule users for vaccinations based on availability.
- **Email Notifications**: Notify users of their scheduled vaccination date.
- **Background Processing**: Asynchronous task execution using Laravel queues for scheduling notifications.

## Requirements

- PHP >= 8.1
- Composer
- Laravel >= 11
- MySQL >= 8.0
- Node.js and npm (for frontend assets)
- Queue worker (e.g., Redis, database, or SQS)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/kawsar24ahmad/vaccine-center-with-google-form-and-zapier.git
   cd vaccine-registration-app
   ```

2. **Install Dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment Configuration**

   Copy the example `.env` file and configure it:

   ```bash
   cp .env.example .env
   ```

   Update the following in your `.env` file:
   - **Database**: Configure `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
   - **Mail Settings**: Configure `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, and `MAIL_FROM_ADDRESS`.
   - **Queue Driver**: Set `QUEUE_CONNECTION` to `database` or another preferred driver.

4. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**

   ```bash
   php artisan migrate
   ```

6. **Seed Database**

   ```bash
   php artisan db:seed
   ```

7. **Install Filament**

   Set up Filament for admin panel functionality:

   ```bash
   php artisan make:filament-user
   ```

   Follow the prompts to create a Filament admin user.

8. **Start the Application**

   ```bash
   php artisan serve
   ```

   Open your browser and navigate to `http://localhost:8000`.

9. **Start the Queue Worker**

   To process notifications and other queued tasks:

   ```bash
   php artisan queue:work
   ```

## Usage

1. **User Registration via Google Form**

   - Users can register via the **Google Form 1** or **Google Form 2** linked above. Their data is collected and sent to the backend system using **Zapier**.
   - Zapier listens for new form submissions and sends the data to your Laravel application.

2. **Manage Vaccine Centers**

   - Admins can add and manage vaccine centers with daily scheduling limits.

3. **Schedule Users**

   - Run the scheduling logic via the controller to assign users to vaccine centers:

     ```bash
     php artisan schedule:run
     ```

4. **Email Notifications**

   - Users will receive email notifications about their scheduled vaccination dates once they are successfully assigned to a vaccine center.

## Key Files

- **Controllers**:
  - `ScheduleController`: Handles user scheduling and dispatching jobs.

- **Jobs**:
  - `ScheduleUserJob`: Processes individual user scheduling and notifications.

- **Notifications**:
  - `ScheduledUserNotification`: Sends email notifications to users.

- **Zapier Integration**:
  - Zapier listens for new Google Form submissions and triggers actions to add users to the database and schedule appointments.

## Deployment

1. **Set Up a Server**

   - Install PHP, MySQL, and a web server (e.g., Nginx or Apache).
   - Set up a queue worker service (e.g., Supervisor for managing `queue:work`).

2. **Deploy the Application**

   - Clone the repository to your server.
   - Set up the `.env` file with production credentials.
   - Run migrations and install dependencies.

3. **Secure the Application**

   - Use SSL for HTTPS.
   - Set appropriate file permissions for storage and logs.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
