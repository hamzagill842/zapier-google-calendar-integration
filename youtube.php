<?php
require __DIR__ . '/vendor/autoload.php'; // Include Google API Client Library

$clientID = 'YOUR_GOOGLE_CLIENT_ID'; // Replace with your actual Google Client ID
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET'; // Replace with your actual Google Client Secret
$redirectUri = 'YOUR_GOOGLE_REDIRECT_URI'; // Replace with your actual Redirect URI

// Create the Google YouTube service
$client = new Google_Client();
$client->setApplicationName('Your Application Name');
$client->addScope([Google_Service_YouTube::YOUTUBE]);
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->setAccessType('offline');

// Load previously authorized credentials from a file, if available.
$credentialsPath = 'path/to/credentials.json'; // Replace with the path to your credentials file

if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
    $client->setAccessToken($accessToken);
} else {
    // If no credentials are available, prompt the user to authorize the application.
    $authUrl = $client->createAuthUrl();
    echo "Open the following link in your browser:\n" . $authUrl;
    echo "\nEnter verification code: ";
    $authCode = trim(fgets(STDIN));

    // Exchange authorization code for an access token and store it in the credentials file.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    file_put_contents($credentialsPath, json_encode($accessToken));
}

// Create YouTube service
$youtube = new Google_Service_YouTube($client);

// Set the video details
$videoPath = 'path/to/your/video.mp4'; // Replace with the path to your video file
$videoTitle = 'Your Video Title';
$videoDescription = 'Your Video Description';
$playlistId = 'YOUR_PLAYLIST_ID'; // Replace with the ID of your playlist

// Create a snippet with title, description, tags, category ID, and playlist ID
$snippet = new Google_Service_YouTube_VideoSnippet();
$snippet->setTitle($videoTitle);
$snippet->setDescription($videoDescription);
$snippet->setTags(['tag1', 'tag2']);
$snippet->setCategoryId('22'); // You can find category IDs on the YouTube API documentation
$snippet->setPlaylistId($playlistId);

// Create a video status with privacy status (public, private, unlisted)
$status = new Google_Service_YouTube_VideoStatus();
$status->privacyStatus = 'public';

// Create a video with the snippet and status
$video = new Google_Service_YouTube_Video();
$video->setSnippet($snippet);
$video->setStatus($status);

// Set the chunk size for the media upload
$client->setDefer(true);
$insertRequest = $youtube->videos->insert('snippet,status', $video);

// Create a media file upload object
$media = new Google_Http_MediaFileUpload(
    $client,
    $insertRequest,
    'video/*',
    null,
    true,
    1 << 20
);
$media->setFileSize(filesize($videoPath));

// Read the media file and upload it chunk by chunk
$status = false;
$handle = fopen($videoPath, 'rb');
while (!$status && !feof($handle)) {
    $chunk = fread($handle, 1 << 20);
    $status = $media->nextChunk($chunk);
}
fclose($handle);

// If you want to make other changes to the video metadata, you can do it here

$client->setDefer(false);

// Print the video ID of the uploaded video
echo "Video uploaded successfully to playlist: " . $status['id'];
