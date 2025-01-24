<h1>TRIP COMPANY</h1>

> Status: status: finished ✔️

_Read this in other languages:_
[_Português_](./translations/README-ptBR.md)

## About the project

This project is part of an activity proposed by the Fundamentals of Web Programming course. The system, called Trip Company, is a web platform designed to manage and organize travel plans, allowing users to create trips, add destinations to visit, and invite participants.

The platform includes a client-side interface developed with HTML, CSS, and JavaScript, and a server-side backend built with PHP. Data is stored and managed using a MySQL database.

### Features

- User Registration and Login: Secure user authentication system for accessing trip-related functionalities.

- Trip Creation: Users can create trips with a title, description, and planned dates.

- Adding Destinations: Users can list places to visit within each trip.

- Adding Participants: Users can list participants to join their trip.

- CRUD Functionalities: Complete support for creating, reading, updating, and deleting trips, destinations, and participants.

## Technologies Used and Dependecies

<table>
  <tr>
    <td>Php</td>
    <td>Javascript</td>
  </tr>
  <tr>
    <td>^8.1</td>
    <td>^ES6+</td>
  </tr>
</table>

## How to Use

Follow these steps to set up and run the **Trip Company** project:  

### Prerequisites  

- Install **XAMPP** (ensure it includes PHP version 8.1 and MySQL).  
- A modern web browser (e.g., Chrome, Firefox).  
- Git installed on your machine.  

## Step-by-Step Guide  

1. **Clone the Repository**  
   - Open a terminal or command prompt.  
   - Navigate to the directory where you want to store the project.  
   - Run the following command to clone the repository:  

     ```bash
     git clone https://github.com/eriksgda/somativa-web-2.git
     ```  

2. **Set Up XAMPP**  
   - Open XAMPP and start the **Apache** and **MySQL** services.  

3. **Configure the Database**  
   - Access the phpMyAdmin panel by navigating to `http://localhost/phpmyadmin` in your browser.  
   - Import the SQL file included in the project (`database.sql`) to create the necessary tables and data.  

4. **Place the Project Files**  
   - Copy the cloned project folder into the `htdocs` directory of your XAMPP installation (e.g., `C:/xampp/htdocs/tripCompany`).

5. **Run the Application**  
   - Open your browser and navigate to `http://localhost/tripCompany`.  
   - You will be directed to the homepage or login page.  

6. **Create an Account**  
   - Register as a new user to start using the platform.  

7. **Start Creating Trips**  
   - Once logged in, you can create trips, add destinations, and invite participants.  

### Notes  

- Ensure XAMPP is running while using the application.

## License

This project is under [MIT](./LICENSE) license.
