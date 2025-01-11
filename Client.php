<?php
/**
 * MPE Client
 *
 * This script implements a TCP client that connects to a specified server.
 * The client allows users to send messages and receive responses from the server.
 *
 * Client Parameters:
 * - Server Address: 127.0.0.1
 * - Server Port: 12345
 *
 * Usage:
 * - Enter your nickname to authenticate.
 * - Type messages to send to the server.
 * - Use the command 'exit' to disconnect from the server.
 * - Use the command 'stop' to request the server to stop.
 *
 * Running the Client:
 * - Ensure the server is running on the specified address and port.
 * - Run this script in the terminal.
 *
 * @author XackiGiFF
 * @version 1.0
 * @date [2025\01\11]
 */

// Specify the server address and port
$address = '127.0.0.1';
$port = 12345;

echo "Enter your nickname: "; // Todo: make json Client <=> Server data and add auth
$username = trim(fgets(STDIN));

echo "Authenticating you as {$username}...";

// Create a client socket
$socket = stream_socket_client("tcp://$address:$port", $errno, $errstr);
if (!$socket) {
    die("Error: $errstr ($errno)n");
}

echo "Connected to server $address:$port...\n";

echo "Enter message (or 'exit' to quit, 'stop' to stop the server): ";

// Infinite loop for sending and receiving messages
while (true) {
    $nowtime = date("Y-m-d H:i:s");
    // Array to check for readiness to read
    $read = [$socket, STDIN];
    $write = null;
    $except = null;

    // Use stream_select to wait for data
    if (stream_select($read, $write, $except, 0) > 0) {
        // If there is data from the server
        if (in_array($socket, $read)) {
            $response = fread($socket, 1024);
            if ($response === false || $response === '') {
                echo "Server closed the connection.\n";
                break; // Exit the loop if the server closed the connection
            }
            echo "\n" . trim($response) . "\n"; // Output the server's response
            echo "Enter message (or 'exit' to quit, 'stop' to stop the server): ";
        }

        // If there is input from the user
        if (in_array(STDIN, $read)) {
            echo "Enter message (or 'exit' to quit, 'stop' to stop the server): ";
            $message = trim(fgets(STDIN));

            fwrite($socket, $message . "\n"); // Send message to the server

            if ($message === 'exit') {
                break; // Exit the loop on 'exit' command
            }

            if ($message === 'stop') {
                echo "Command 'stop' sent. Waiting for the server to finish...\n";
                break; // Exit the loop on 'stop' command
            }
        }
    }
}

// Close the client socket
fclose($socket);
echo "Client has finished working.\n";
