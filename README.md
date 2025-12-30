 Web-Based Online Quiz Platform

A full-stack web application that allows users to test their knowledge through subject-wise and level-wise MCQs. The platform tracks user performance and provides detailed, visual feedback.

# Key Features
User Management: Secure user registration and login system.
Dynamic Quiz Selection: Users can choose quizzes based on specific Subjects and Difficulty Levels.
Interactive Quiz Interface: Questions are displayed one-by-one with a "Next" and "Submit" flow.
Instant Feedback: Answers are checked and scored immediately upon submission.
Graphical Analytics: Scores are visualized using a **Chart.js donut chart**, showing correct vs. incorrect answers.
PDF Scorecards: Professional scorecards are generated using **Dompdf** (via Composer), featuring the username, subject, and difficulty.
Solution Review: Users can review the correct solutions after finishing the quiz.

#  Tech Stack
Backend: PHP
Database: MySQL (for tracking user activities and quiz history)
Frontend: HTML5, CSS3, JavaScript
Data Visualization:Chart.js
DF Generation:Dompdf via Composer
Server Environment: XAMPP/WAMP
