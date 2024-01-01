<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'googleConfig.php';
include_once 'config.php';


$calendarService = new Google_Service_Calendar($client);
$driveService = new Google_Service_Drive($client);
$eventId = $_POST['eventId'];
$fileId = $_POST['fileId'];
//$events = $calendarService->events->listEvents($calendarId, ['q' => $eventId])->getItems();
$events = $calendarService->events->get('primary', $eventId);

if (!empty($events)) {

    $file = $driveService->files->get($fileId, ['fields' => 'id,name,mimeType,webContentLink,webViewLink']);

    $attachments[] = array(
        'fileUrl' => $file->webViewLink,
        'mimeType' => $file->mimeType,
        'title' => $file->name
    );

    $changes = new Google_Service_Calendar_Event(array(
        'attachments' => $attachments
    ));

// Update the event with the new attachment
    $updatedEvent = $calendarService->events->patch('primary', $eventId, $changes,
        array(
            'supportsAttachments' => TRUE
        )
    );

    // Print the updated event ID
    echo 'Updated Event ID: ' . $updatedEvent->getId();
} else {
    echo 'Event not found.';
}


