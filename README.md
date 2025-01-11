# MPE Socket Server and Client on PHP

## Overview

This project is an educational example for learning about socket programming in PHP. It consists of a TCP server and a client that can communicate with each other. The server listens for incoming connections from clients, processes commands, and sends responses back. The client connects to the server, sends messages, and receives responses.

## Features

### Server

Watch this https://github.com/XackiGiFF/MPE-SocketServer

### Client

- **TCP Socket Client**: Connects to the TCP server and allows users to send messages.
- **User Authentication**: Prompts the user to enter a nickname for identification.
- **Message Sending**: Sends messages to the server and listens for responses.
- **Command Support**:
    - `info`: Returns information about the server, including its name, creator, version, creation date, operating system, RAM usage, and CPU usage.
    - `exit`: Disconnects from the server.
    - `stop`: Sends a request to the server to stop.

## Prerequisites

- PHP installed on your machine (version 7.0 or later recommended).
- Basic understanding of PHP and command-line usage.

## Getting Started

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <repository-directory>
```

### 2. Start the Server

Open a terminal and run the server script:

```bash
php server.php
```

### 3. Start the Client

Open another terminal and run the client script:

```bash
php client.php
```

### 4. Interact with the Server

- Enter your nickname when prompted by the client.
- Use the following commands to interact with the server:
    - Type `info` to get information about the server.
    - Type any message to send it to the server.
    - Type `exit` to disconnect from the server.
    - Type `stop` to request the server to stop.

## Example Usage

1. Start the server:
   ```
   Server starts on 127.0.0.1:12345...
   ```

2. Start the client:
   ```
   Enter your nickname: JohnDoe
   Authenticating you as JohnDoe...
   Connected to server 127.0.0.1:12345...
   Enter message (or 'exit' to quit, 'stop' to stop the server):
   ```

3. Send a message:
   ```
   Enter message (or 'exit' to quit, 'stop' to stop the server): info
   ```

4. Receive a response:
   ```
   [MPE-SocketServer] 2025-01-11 02:52:34 > 
   - Creator: XackiGiFF, 
   - Ver: 1.0, 
   - Date: 2025-01-11 02:52:34, 
   - OS: Linux, 
   - RAM: 5.12 MB, 
   - CPU: 0.25%
   ```

## Conclusion

This project serves as a practical example for understanding socket programming in PHP. You can modify and expand upon this code to explore more advanced features such as error handling, multi-threading, and client authentication.

Feel free to contribute to this project or use it as a reference for your own socket programming endeavors!

## Author

- **XackiGiFF** - [My GitHub Profile](https://github.com/XackiGiFF)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.