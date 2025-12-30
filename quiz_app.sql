-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2025 at 03:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `answer` varchar(244) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `explanation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `subject`, `difficulty`, `explanation`) VALUES
(1, 'What does HTML stand for', 'Hyper Training Marking Language', 'HyperText Markup Language', 'HyperText Machine Language', 'HighText Markup Language', 'B', 'HTML', 'Easy', 'HTML (HyperText Markup Language) was coined by Tim Berners-Lee, a British computer scientist.It is the standard language used to create and structure web pages.'),
(2, 'Which CSS property controls the text size?', 'font-style', 'text-style', 'font-size', 'text-size', 'C', 'CSS', 'Medium', 'font-size.\r\nThe font-size property sets the size of text on a webpage. It can be defined in units like px, em, or rem to control how text appears, improving readability and design.\r\n'),
(3, 'Which keyword is used to declare a variable in JavaScript?', 'var', 'int', 'string', 'letvar', 'A', 'Javascript', 'Easy', 'var.\r\nIn JavaScript, var is used to declare a variable. It has function-level scoping, but newer keywords like let and const provide better scoping for variables.\r\n\r\n'),
(4, 'Which of the following is used to declare a variable in PHP?', '$variable', '@variable', '&variable', '%variable', 'A', 'PHP', 'Medium', '$variable.\r\nPHP variables start with a dollar sign ($). This distinguishes them from other elements and allows them to hold different types of data.\r\n'),
(5, 'Which value of the position property makes the element stay in the same place even while scrolling?', 'relative', 'fixed', 'absolute', 'sticky', 'B', 'CSS', 'Medium', 'fixed.\r\nThe fixed value of the position property ensures an element stays in the same place on the screen, even when the user scrolls. This is often used for headers or navigation bars.\r\n\r\n'),
(6, 'What is the correct file extension for Python files?', '.pt', '.pyt', '.py', '.python', 'C', 'Python', 'Easy', '.py.\r\n Python files must have the .py extension, which tells the system that the file contains Python code. It’s the standard for all Python scripts.\r\n'),
(7, ' What will be the output of print(type([]))?', '<class \'tuple\'>\r\n', '<class \'list\'>', '<class \'dict\'>\r\n', '<class \'set\'>\r\n', 'B', 'Python', 'Medium', '<class \'list\'>.\r\nThe empty square brackets [] represent a list in Python. The type() function returns the type of an object, and in this case, it will return <class \'list\'>.\r\n\r\n'),
(8, 'How do you prevent an element from being displayed?', 'visibility:none;', 'display:none;', 'hide:true;', 'opacity:0;', 'B', 'CSS', 'Hard', 'display:none;.\r\nThe display: none; property completely hides an element from the webpage, removing it from the layout as if it doesn’t exist.\r\n'),
(9, 'What is closure in JavaScript?', 'A function having access to parent scope', 'A data type', 'An object inside a function', 'A new feature in ES6', 'A', 'Javascript', 'Hard', 'A function having access to its parent scope.\r\nA closure occurs when a function remembers its lexical scope even when executed outside that scope. This allows functions to access variables from their parent functions.\r\n\r\n'),
(10, 'Which function converts a JSON text into a JavaScript object?', 'JSON.stringify()', 'JSON.parse()', 'JSON.objectify()', 'JSON.convert()', 'B', 'Javascript', 'Medium', 'JSON.parse().\r\nJSON.parse() converts a JSON string into a JavaScript object, allowing you to work with the data as an object within your code.\r\n'),
(11, 'Which tag is used to create a hyperlink in HTML?', '<a>', '<link>', '<href>', '<url>', 'A', 'HTML', 'Easy', '<a>.\r\nThe <a> tag is used to create hyperlinks in HTML. It links to other web pages or resources when clicked.\r\n'),
(12, 'Which function in PHP is used to check if a variable is set?', 'isset()', 'check()', 'is_defined()', 'issetvar()', 'A', 'PHP', 'Medium', 'isset().\r\nisset() checks whether a variable is defined and not null. It’s often used to verify if a form field or session variable exists.\r\n'),
(13, 'In CSS, which property is used to change the font size?', 'font-size', 'text-size', 'font-family', 'font-style', 'A', 'CSS', 'Easy', 'font-family.\r\nThe font-family property specifies the font of text in HTML elements. It allows you to choose fonts that fit the design of your site.\r\n\r\n'),
(14, 'Which method is used to add an item at the end of an array in JavaScript?', 'push()', 'add()', 'insert()', 'append()', 'A', 'Javascript', 'Medium', 'push().\r\nThe push() method adds an item to the end of an array in JavaScript, increasing the array\'s length.\r\n'),
(15, 'What is the correct syntax to create a function in JavaScript?', 'function name()', 'def name()', 'create name()', 'func name()', 'A', 'Javascript', 'Easy', 'function name().\r\nIn JavaScript, functions are declared using the function keyword followed by the function name and parentheses.\r\n\r\n'),
(16, 'Which Python function is used to get the length of a list?', 'len()', 'size()', 'length()', 'count()', 'A', 'Python', 'Easy', 'len().\r\nThe len() function returns the number of items in an object, such as a list or string, in Python.\r\n'),
(17, 'What does the `border-radius` property do in CSS?', 'Creates rounded corners', 'Changes the border color', 'Adds a border', 'Makes the element invisible', 'A', 'CSS', 'Medium', 'Creates rounded corners.\r\nThe border-radius property in CSS rounds the corners of an element, creating a smooth, curved effect.\r\n'),
(18, 'In Python, what is the output of `print(2 ** 3)`?', '8', '6', '3', '5', 'A', 'Python', 'Easy', '8.\r\n2 ** 3 raises 2 to the power of 3, resulting in 8.'),
(19, 'Which of the following is used to declare a variable in JavaScript?', 'let', 'var', 'int', 'string', 'A', 'Javascript', 'Medium', 'let.\r\nlet is used to declare variables in JavaScript. It has block-level scope and is preferred over var for modern code.\r\n'),
(20, 'What does SQL stand for?', 'Structured Query Language', 'Simple Query Language', 'Sequential Query Language', 'Standard Question Language', 'A', 'SQL', 'Easy', 'Structured Query Language.\r\nSQL is used to communicate with databases, allowing you to manage, manipulate, and query data.'),
(21, 'Which of the following is a correct CSS selector?', '#id', '.class', 'div', 'All of the above', 'D', 'CSS', 'Hard', 'All of the above.\r\n#id, .class, and div are all valid CSS selectors used to target specific elements in HTML.\r\n\r\n'),
(22, 'Which operator is used to assign a value in PHP?', '=', '==', ':=', '=>', 'A', 'PHP', 'Medium', '=.\r\nThe = operator is used to assign values to variables in PHP.\r\n'),
(23, 'What is the purpose of the `while` loop in JavaScript?', 'To repeat a block of code as long as a condition is true', 'To execute code once', 'To iterate over an array', 'To define a function', 'A', 'Javascript', 'Medium', 'To repeat a block of code as long as a condition is true.\r\nThe while loop in JavaScript continues executing a block of code as long as the given condition evaluates to true.\r\n\r\n'),
(24, 'In Python, which of the following is used to handle exceptions?', 'try/except', 'try/catch', 'throw/catch', 'error/handle', 'A', 'Python', 'Hard', 'try/except.\r\nThe try/except block in Python is used to handle errors by catching exceptions and allowing the program to continue running.\r\n'),
(25, 'Which of the following HTML tags is used to display a line break?', '<hr>', '<br>', '<break>', '<line>', 'B', 'HTML', 'Easy', '<br>.\r\nThe <br> tag is used to insert a line break, forcing text to continue on a new line.'),
(26, 'Which keyword is used to define a constant in PHP?', 'define', 'constant', 'const', 'var', 'A', 'PHP', 'Hard', 'define.\r\n The define() function in PHP is used to define constants, which are values that cannot be changed during script execution.'),
(27, 'What is the default value of the `position` property in CSS?', 'static', 'relative', 'absolute', 'fixed', 'A', 'CSS', 'Medium', 'static.\r\nThe default position value is static, meaning elements are positioned based on their normal flow in the document.'),
(28, 'Which JavaScript function is used to parse a string into a number?', 'parseInt()', 'toString()', 'parse()', 'convert()', 'A', 'Javascript', 'Hard', 'parseInt().\r\nThe parseInt() function converts a string to an integer, parsing only the first part of the string as a number.\r\n'),
(29, 'In Python, which of the following is the correct syntax to create a set?', 'set() = {1, 2, 3}', 'set {1, 2, 3}', 'set([1, 2, 3])', 'set{1, 2, 3}', 'C', 'Python', 'Medium', 'set([1, 2, 3])\r\n A set is created using the set() function in Python. It removes duplicate values and stores them in an unordered collection.'),
(30, 'What will the following SQL query return? `SELECT * FROM users WHERE age > 30 ORDER BY age DESC`', 'All users older than 30', 'Users older than 30, sorted by age descending', 'Users older than 30, sorted by age ascending', 'Users older than 30 with random order', 'B', 'SQL', 'Hard', 'Users older than 30, sorted by age descending.\r\nThis query returns users older than 30, sorted from oldest to youngest.'),
(31, 'In CSS, what is the difference between `visibility: hidden` and `display: none`?', 'Both make the element invisible', 'visibility: hidden keeps space for the element; display: none removes it', 'display: none keeps space for the element; visibility: hidden removes it', 'visibility: hidden makes the element disappear; display: none makes it visible again', 'B', 'CSS', 'Hard', 'visibility: hidden makes the element disappear; display: none removes it from the layout.\r\nvisibility: hidden hides an element but retains its space, while display: none removes the element and its space from the layout entirely.'),
(32, 'In JavaScript, what is the correct syntax to create a function?', 'function name()', 'create function name()', 'def name()', 'function: name()', 'A', 'Javascript', 'Medium', 'function name().\r\nFunctions in JavaScript are defined using the function keyword followed by the function name and parentheses.'),
(33, 'What is the output of `print(3 == \"3\")` in Python?', 'True', 'False', 'TypeError', 'None of the above', 'B', 'Python', 'Medium', 'False.\r\nThe comparison 3 == \"3\" returns False because one is an integer and the other is a string, which are of different types.\r\n'),
(34, 'Which method is used to add an element to the beginning of an array in JavaScript?', 'push()', 'pop()', 'shift()', 'unshift()', 'D', 'Javascript', 'Medium', 'unshift().\r\nThe unshift() method adds an element to the start of an array in JavaScript, shifting the existing elements to the right.'),
(35, 'In SQL, which clause is used to filter records?', 'ORDER BY', 'WHERE', 'HAVING', 'GROUP BY', 'B', 'SQL', 'Hard', 'WHERE.\r\nThe WHERE clause in SQL filters records based on specific conditions.'),
(36, 'What does the `reduce()` method do in JavaScript?', 'Loops over an array and reduces the array length', 'Combines all elements of an array into a single value based on a function', 'Filters elements from an array based on a condition', 'Reverses the order of an array', 'B', 'Javascript', 'Hard', 'Combines all elements of an array into a single value.\r\nreduce() processes each element in an array and combines them into a single value, such as summing all the elements.'),
(37, 'What does `@import` do in CSS?', 'Imports a file from another server', 'Includes the content of another CSS file', 'Imports a JavaScript file', 'Imports an HTML file', 'B', 'CSS', 'Medium', 'Includes the content of another CSS file.\r\nThe @import rule is used to include an external CSS file into another CSS file.'),
(38, 'In Python, which of the following is used to concatenate strings?', 'concat()', '+', 'append()', 'add()', 'B', 'Python', 'Medium', '+.\r\nThe + operator is used to concatenate strings in Python, combining them into one continuous string.'),
(39, 'What is the purpose of the `text-align` property in CSS?', 'Aligns text vertically', 'Aligns text horizontally', 'Changes the color of the text', 'Sets the font size', 'B', 'CSS', 'Hard', ' Aligns text horizontally.\r\nThe text-align property is used to control the horizontal alignment of text within an element, such as left, center, or right.'),
(40, 'Which superglobal variable is used to collect form data sent with the POST method?', '$_GET', '$_REQUEST', ' $_POST', '$POST', 'C', 'PHP', 'easy', '$_POST is used to collect form data after submitting an HTML form using method=\"post\".');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `date_taken` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `user_id`, `score`, `total_questions`, `date_taken`, `subject`, `difficulty`, `created_at`) VALUES
(1, 11, 3, NULL, '2025-05-01 06:55:36', 'Javascript', 'hard', '2025-05-01 03:25:36'),
(2, 11, 1, NULL, '2025-05-01 07:03:31', 'CSS', 'easy', '2025-05-01 03:33:31'),
(3, 2, 3, NULL, '2025-05-01 13:44:32', 'HTML', 'easy', '2025-05-01 10:14:32'),
(4, 2, 2, NULL, '2025-05-01 14:56:44', 'Javascript', 'hard', '2025-05-01 11:26:44'),
(5, 11, 3, NULL, '2025-05-02 13:01:08', 'HTML', 'easy', '2025-05-02 09:31:08'),
(6, 2, 3, NULL, '2025-05-02 16:07:40', 'PHP', 'medium', '2025-05-02 12:37:40'),
(7, 1, 1, NULL, '2025-05-02 18:47:39', 'Python', 'hard', '2025-05-02 15:17:39'),
(8, 1, 3, NULL, '2025-05-02 19:18:04', 'HTML', 'easy', '2025-05-02 15:48:04'),
(9, 1, 1, NULL, '2025-05-02 19:22:38', 'CSS', 'easy', '2025-05-02 15:52:38'),
(10, 11, 3, NULL, '2025-05-02 19:46:06', 'Python', 'easy', '2025-05-02 16:16:06'),
(11, 1, 2, NULL, '2025-05-02 19:54:46', 'HTML', 'easy', '2025-05-02 16:24:46'),
(12, 2, 2, NULL, '2025-05-03 02:55:51', 'HTML', 'easy', '2025-05-02 23:25:51'),
(13, 2, 1, NULL, '2025-05-03 03:05:33', 'CSS', 'easy', '2025-05-02 23:35:33'),
(14, 11, 1, NULL, '2025-05-03 03:27:40', 'Javascript', 'easy', '2025-05-02 23:57:40'),
(15, 2, 2, NULL, '2025-05-03 04:40:42', 'HTML', 'easy', '2025-05-03 01:10:42'),
(16, 1, 1, NULL, '2025-05-03 05:18:20', 'HTML', 'easy', '2025-05-03 01:48:20'),
(17, 12, 2, NULL, '2025-05-03 06:48:14', 'PHP', 'medium', '2025-05-03 03:18:14'),
(18, 1, 2, NULL, '2025-05-03 08:22:22', 'Javascript', 'medium', '2025-05-03 04:52:22'),
(19, 12, 1, NULL, '2025-05-04 13:06:34', 'CSS', 'easy', '2025-05-04 09:36:34'),
(20, 12, 0, NULL, '2025-05-04 13:11:40', 'PHP', 'hard', '2025-05-04 09:41:40'),
(21, 12, 2, NULL, '2025-05-06 13:20:00', 'HTML', 'easy', '2025-05-06 09:50:00'),
(22, 11, 1, NULL, '2025-05-07 17:19:21', 'PHP', 'easy', '2025-05-07 13:49:21'),
(23, 1, 3, NULL, '2025-05-08 02:17:50', 'CSS', 'medium', '2025-05-07 22:47:50'),
(24, 2, 1, NULL, '2025-05-08 04:23:13', 'HTML', 'easy', '2025-05-08 00:53:13'),
(25, 1, 2, NULL, '2025-06-25 05:08:34', 'Javascript', 'easy', '2025-06-25 01:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123@gmail.com', '$2y$10$5jxQLo3oAW7AvJj3OtjWq.bCJ/G40SQ1NKpQ1tlo2oWJ8P993bMAa', '2025-04-26 10:35:10'),
(2, 'rupali', 'rupali123@gmail.com', '$2y$10$hdaevXB8SkxJ7Kbp9AT0kOlis3JYK7Hbk9I1BOgZgjgICVDxhZCCa', '2025-04-27 08:05:03'),
(11, 'Pakhi', 'pakhinegi.pn@gmail.com', '$2y$10$RJSkCUkz437aCkz3fB3/a.HHXT.gG3yJc1.w05jYPwGrt8aLE5mh6', '2025-04-28 10:44:44'),
(12, 'Rajkanya', 'rajkanyabhadade123@gmail.com', '$2y$10$A75O2mzi8BRkMytG.E2AwuUvjjVp5wa1/M0w0t/HUuIMUyy08b4xS', '2025-05-03 05:06:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
