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

## Configuration File (`config.php`):

In your project, create or modify the configuration file (`config.php`) to include the necessary settings. Here's an example section to include in your configuration file:

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
