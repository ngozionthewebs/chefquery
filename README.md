
![Frame 554](https://github.com/user-attachments/assets/f81a7dfc-33f9-4519-a815-6e7ed90c2d66)


## About Chef Query

Chef Query is a vibrant Q&A platform designed for food lovers, home cooks, and culinary experts to connect, share, and learn from one another. Whether you're seeking advice on perfecting a recipe, troubleshooting a baking mishap, or simply looking to discover new culinary techniques, Chef Query provides a space where your questions can be answered by a passionate community. The platform is built to foster collaboration and knowledge-sharing, making it the ultimate destination for anyone interested in the culinary arts. Whether you're a beginner looking for tips or an expert wanting to share your expertise, Chef Query is your go-to hub for all things cooking and baking.

## Built With

[![HTML5](https://img.shields.io/badge/-HTML5-E34F26?logo=html5&logoColor=white&style=for-the-badge)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![CSS3](https://img.shields.io/badge/-CSS3-1572B6?logo=css3&logoColor=white&style=for-the-badge)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![Bootstrap](https://img.shields.io/badge/-Bootstrap-563D7C?logo=bootstrap&logoColor=white&style=for-the-badge)](https://getbootstrap.com/)
[![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?logo=javascript&logoColor=black&style=for-the-badge)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![PHP](https://img.shields.io/badge/-PHP-777BB4?logo=php&logoColor=white&style=for-the-badge)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/-MySQL-4479A1?logo=mysql&logoColor=white&style=for-the-badge)](https://www.mysql.com/)

## Chef Query Profile Screenshot
<img width="1440" alt="Screenshot 2024-08-31 at 17 33 23" src="https://github.com/user-attachments/assets/f37ad39e-aaa2-4caa-b5ee-12ad33e6fa74">


## How to Install Chef Query

### Prerequisites
Before you begin, make sure you have the following installed on your machine:

- **XAMPP** (or any other Apache distribution containing PHP and MySQL)
- **Composer** (optional, if you’re using PHP packages)

### Step-by-Step Installation

#### Step 1: Clone the Repository

1. **Clone the Repository:**
   - First, clone the Chef Query repository to your local machine using Git:
     ```bash
     git clone [https://github.com/your-username/chefquery.git](https://github.com/ngozionthewebs/chefquery.git
     cd chefquery 
     ```
 

#### Step 2: Set Up the Database

1. **Start XAMPP:**
   - Launch XAMPP and start both **Apache** and **MySQL** services.

2. **Create a Database:**
   - Open your browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new database named `chefquery`.

3. **Import the Database Schema:**
   - In `phpMyAdmin`, select the `chefquery` database.
   - Click on the "Import" tab.
   - Choose the SQL file provided in the repository (usually named `chefquery.sql`) and click "Go".

#### Step 3: Configure the Application

1. **Configuration File:**
   - Navigate to the `includes/` directory.
   - Rename `config.example.php` to `config.php`.

2. **Set Up Database Credentials:**
   - Open `config.php` in a text editor.
   - Update the database credentials to match your local environment. For example:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root'); // default username for XAMPP
     define('DB_PASSWORD', '');     // leave empty for XAMPP
     define('DB_NAME', 'chefquery');
     ```

#### Step 4: Run the Application

1. **Start Your Local Server:**
   - Ensure **Apache** and **MySQL** are running in XAMPP.

2. **Access Chef Query:**
   - Open your browser and navigate to [http://localhost/chefquery/pages/home.php](http://localhost/chefquery/pages/home.php).

3. **Login and Explore:**
   - You can use the admin credentials you created or sign up as a new user to explore the features of Chef Query.

#### Optional: Installing Dependencies via Composer

1. **Install Dependencies:**
   - If your project includes PHP packages managed by Composer, run the following command in the project directory:
     ```bash
     composer install
     ```



## Features


| Page                | Description                                                                 |
|---------------------|-----------------------------------------------------------------------------|
| **Login Page**      | - Allows users to create a profile<br>- Provides login functionality for registered users |
| **Home Page**       | - Displays the latest questions <br>- Users can browse through categories |
| **Ask A Question Page**| - Allows users to ask new questions <br>- Enables users to post a question  |
| **Answer A Question Page**| - Allows users to answer questions <br>- Enables users to answer a question and it will diplay on the question details page  |
| **Question Details Page** | - Displays the full content of a question<br>- Provides the ability to for user to answer question as well as view other answers to questions |
| **Admin Page** | - Page displays incoming questions <br>- Admin can approve and delete quetions these questions will display on the homepage |

## The Idea

The idea behind Chef Query is to create an interactive platform where culinary enthusiasts, from beginners to experts, can come together to share their knowledge, seek advice, and explore new recipes. The platform is designed to foster a community-driven environment where users can ask questions, share cooking experiences, and provide answers to help others. Chef Query aims to be the go-to hub for anyone passionate about cooking and baking, offering a space for learning, sharing, and engaging with like-minded individuals.

## UI Design

### Home Page
<img width="1440" alt="Screenshot 2024-08-31 at 18 50 37" src="https://github.com/user-attachments/assets/ee531de9-0aca-4f42-bafc-115ac52a47c7">

### Login Page
<img width="1440" alt="Screenshot 2024-08-31 at 18 56 23" src="https://github.com/user-attachments/assets/926650eb-e636-4670-90ea-9ee306843fe6">

### Sign Up Page
<img width="1437" alt="Screenshot 2024-08-31 at 18 56 32" src="https://github.com/user-attachments/assets/a1354b9f-a43c-4c61-86c7-56b9a9fab32b">

### Ask A Question Page
<img width="1440" alt="Screenshot 2024-08-31 at 18 57 32" src="https://github.com/user-attachments/assets/dc6cc425-7088-424b-b4ef-166a7766d62d">

### Answer A Question Page + Question Details Page
<img width="1440" alt="Screenshot 2024-08-31 at 19 29 15" src="https://github.com/user-attachments/assets/b62fb1b7-defe-439b-81f0-f7452b5e94f7">
<img width="1439" alt="Screenshot 2024-08-31 at 19 36 53" src="https://github.com/user-attachments/assets/77323f21-1460-4d84-baff-ee89e8e70f1a">


### Admin Page
<img width="1440" alt="Screenshot 2024-08-31 at 19 57 41" src="https://github.com/user-attachments/assets/fb8bba7a-082c-49ea-8865-23976afef376">


## Development Process

### Highlights
User-Friendly Interface: Chef Query offers a clean and intuitive interface, making it easy for users to ask and answer cooking-related questions.
Secure Authentication: The platform ensures secure user registration and login processes, incorporating password hashing and user role management to safeguard user data.
Admin Dashboard: An admin-specific dashboard allows for effective management of content, enabling admins to approve or delete questions to maintain quality and relevance.
Dynamic Content Filtering: Users can filter questions by the newest or oldest entries, enhancing the browsing experience and ensuring they can find relevant content quickly.
PHP and MySQL Backend: Chef Query leverages the power of PHP and MySQL to provide a robust backend, efficiently handling user interactions, data storage, and content management.
Custom Navigation: A dynamic navigation system tailored for both users and admins ensures that each role has access to the appropriate features and pages.

### Challenges
Scalability: Ensuring the platform can scale effectively as the user base grows, while maintaining performance and responsiveness.
Security: Implementing secure authentication and authorization mechanisms to protect user data and prevent unauthorized access.
Responsive Design: Developing a responsive design that works seamlessly across different devices and screen sizes, ensuring a consistent user experience.
Content Moderation: Creating efficient processes for content moderation, allowing admins to manage the quality of content without overwhelming manual efforts.
User Engagement: Encouraging user interaction and participation while maintaining the platform's ease of use and simplicity in navigating and contributing content.

## Mockups

### Ask A Question Page
![Free_MacBook_Pro_1 copy](https://github.com/user-attachments/assets/359591d9-fe5e-41b8-ac4b-e866d773276f)

### Home Page
![Free_MacBook_Pro_2 copy](https://github.com/user-attachments/assets/63b1595e-bcd1-45ff-9194-5fa6c744ac4a)

### Login Page
![Free_MacBook_Pro_3 copy](https://github.com/user-attachments/assets/5b5cc2db-614e-40aa-a944-48fff0edb257)

### Admin Dashboard
![Free_MacBook_Pro_4 copy](https://github.com/user-attachments/assets/f66e92a9-783b-4a90-80f6-72ce0de99ab2)


## Demonstration Video

```
https://drive.google.com/file/d/1NdljcN6lTr2J_vZ5Pr2M3xgjya-5yXqE/view?usp=sharing
```
