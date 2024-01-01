# Zapier Integration: Upload Attachments to Google Calendar via Google Drive

## Overview:

Streamline your workflow by integrating Zapier to automatically upload attachments from Google Drive to events in Google Calendar. This integration ensures that relevant documents, files, or media are associated with your calendar events, providing a comprehensive overview of your schedule.

## Prerequisites:

Before setting up the integration, ensure you have completed the following steps:

1. **Enable Google Calendar API and Google Drive API:**
   - Go to the [Google Cloud Console](https://console.cloud.google.com/).
   - Create a new project or select an existing project.
   - Enable the Google Calendar API and Google Drive API for your project.
   - Create credentials (OAuth client ID) for the application.

2. **Configure API Credentials in Your Project:**
   - Obtain the client ID and client secret from the Google Cloud Console.
   - Add these credentials to your project's configuration file.

## Installation:

To get started with the project, follow these steps:

1. **Clone the Repository:**
   - Clone this repository to your local machine using the following command:
     ```bash
     git clone https://github.com/your-username/your-repository.git
     ```

2. **Install Composer Dependencies:**
   - Navigate to the project directory:
     ```bash
     cd your-repository
     ```
   - Install Composer dependencies:
     ```bash
     composer install
     ```

3. **Set Up Google Calendar and Google Drive API Credentials:**
   - Follow the instructions in the "Prerequisites" section to enable and configure the Google Calendar and Google Drive APIs.

4. **Configure the `config.php` File:**
   - Open the `config.php` file and update the database connection details, Google Calendar and Google Drive API credentials, and any additional configuration details.

    ```php
    <?php
    // config.php

    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "calendar";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    global $conn;

    // Google Calendar and Google Drive API credentials
    const GOOGLE_Client_ID = "4560468dfdf07463-jqed90d72efocnd3756q1gtj353temi7.apps.googleusercontent.com";
    const GOOGLE_Client_SERECT = "GOCSddffdPX-EEWkFNX0wBPoboAupucJzL3I8CBQ";
    const GOOGLE_REDIRECT_URI = "https://7f89-2400-adc5-15d-da00-1546-cc9e-7b6e-a58d.ngrok-free.app";

    // Additional configuration details
    const PLAY_LIST_ID = 'PLpt6gOTzg2dffd33RKs3x7ner8ShF15j2enQ8';
    ?>
    ```

5. **Import Database Schema:**
    - Import the `database.sql` file into your MySQL database after creating it.

## PHP Version Compatibility:

This project requires PHP version 8.1 or higher. Ensure that your development environment is using a compatible PHP version.

Follow these steps to check your PHP version:

```bash
php --version
