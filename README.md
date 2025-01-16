Character Frequency Analysis Application

A Laravel-based application that analyzes text to identify the most frequent character and its frequency. This app integrates a Vue.js frontend for an interactive user experience.

Features

Text Analysis: Detects the most frequent character in a given text and its frequency.

REST API: Provides an endpoint for character frequency analysis.

Validation: Ensures proper input handling with informative error messages.

Frontend Integration: A dynamic Vue.js interface for user interaction.

Requirements

To run this application, ensure the following are installed:

PHP: >= 8.1

Composer: Dependency manager for PHP

Node.js: For frontend dependencies

Laravel: >= 9.x

Database: MySQL or SQLite (optional)

Installation

Step 1: Clone the Repository

Clone the project to your local machine:

git clone <repository-url>
cd <project-folder>

Step 2: Install Dependencies

Install the backend dependencies:

composer install

Step 3: Configure Environment Variables

Set up your .env file:

cp .env.example .env

Update the .env file with your environment details, such as database credentials.

Step 4: Generate Application Key

Generate the Laravel application key:

php artisan key:generate

Step 5: Run the Development Server

Start the Laravel development server:

php artisan serve

The server will run on http://127.0.0.1:8000.

Usage

API Endpoint

POST /api/analyze

Analyze a text input to determine the most frequent character.

Request Body:

{
    "text": "Hello, World!"
}

Response:

{
    "original_text": "Hello, World!",
    "most_frequent_character": "l",
    "frequency": 3
}

Validation Rules:

text: Required string. Special characters and numbers are ignored.

Error Response:

{
    "error": "The text field is required."
}

Project Structure

Backend

Routes: Defined in routes/api.php

Controller: TextAnalysisController handles the logic

Middleware: Validates input

Frontend

Vue.js app in a separate folder/repository

Handles user interaction and displays API results

Communicates with the API using Axios

Run npm i & npm run dev 
Note: run the both commend php artisan serve and other tab npm run dev 
then open
http://127.0.0.1:8000/

