# phpserial

---

# Laravel to Arduino Project

This project demonstrates the integration between Laravel and Arduino for controlling and monitoring Arduino devices via a web interface.

## Features

1. **PHP Serial Connection**: Establishes a serial communication link between Laravel and Arduino for data exchange.
2. **Web Connection to Arduino**: Provides a web-based interface to interact with Arduino devices remotely.
3. **XAMPP Integration**: Utilizes XAMPP (Apache and MySQL) for local web server hosting and database management.

## Prerequisites

Before running this project, ensure you have the following installed:

1. [Arduino IDE](https://www.arduino.cc/en/software)
2. [XAMPP](https://www.apachefriends.org/index.html)
3. [Composer](https://getcomposer.org/download/)
4. [Node.js and npm](https://nodejs.org/en/download/)

## Setup Instructions

1. Clone the repository to your local machine:

    ```bash
    [git clone https://](https://github.com/AbelShikanda/phpserial.git)
    ```

2. Navigate to the project directory:

    ```bash
    cd phpserial
    ```

3. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies using npm:

    ```bash
    npm install
    ```

5. Create a `.env` file by duplicating `.env.example`:

    ```bash
    cp .env.example .env
    ```

6. Generate an application key:

    ```bash
    php artisan key:generate
    ```

7. Configure the database settings in `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

8. Start the Apache and MySQL servers using XAMPP control panel.

9. Run database migrations to create necessary tables:

    ```bash
    php artisan migrate
    ```

10. Connect your Arduino device to your computer and upload the Arduino sketch provided in the `arduino` directory.

11. Update the serial port configuration in the Laravel application (`config/serial.php`) to match your Arduino device's port.

12. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

13. Access the web application in your browser at `http://localhost:8000`.

## Usage

- Use the web interface to interact with Arduino devices and monitor data.
- Customize the Arduino sketch (`arduino/arduino_sketch.ino`) to add additional functionalities as needed.

## Contributing

Contributions are welcome! Please submit a pull request with your enhancements.

## License

---

Feel free to customize the README according to your project's specific details and requirements.
