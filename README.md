# CESIZen

A web application designed to help users understand and manage their
stress through educational content and a stress diagnostic tool.

This project was developed as part of the CESI -- Concepteur
Développeur d'Applications program, within the module:

Bloc 2 -- Développer et tester les applications informatiques

------------------------------------------------------------------------

# Project Overview

CESIZen provides users with tools to better understand their stress
levels and access reliable information about stress management.

The application includes:

- Educational resources about stress\
- A stress diagnostic questionnaire\
- A personal user profile\
- A history of diagnostic results\
- An administration interface for managing content and diagnostic
configuration

------------------------------------------------------------------------

# Main Features

## User Accounts

-   User registration
-   Login / logout
-   Password reset
-   User profile
-   Diagnostic history

## Information Pages

-   Educational content pages
-   Categories for organizing resources
-   Admin CRUD management

## Stress Diagnostic

-   Questionnaire
-   Score calculation
-   Result interpretation
-   Storage of results in user profile

------------------------------------------------------------------------

# Technology Stack

Backend - PHP - Laravel

Frontend - Blade Templates - HTML5 - CSS3 - JavaScript

Visualization - Chart.js

Database - SQLite (development)

Architecture - MVC (Model View Controller)

ORM - Eloquent ORM

------------------------------------------------------------------------

# Application Architecture

The project follows the MVC pattern:

Model Represents business entities and handles database interactions.

View Responsible for rendering the user interface.

Controller Handles application logic and user interactions.

------------------------------------------------------------------------

# Core Data Model

Main entities:

User
Page
PageCategory
DiagnosticQuestion
DiagnosticSubmission
DiagnosticAnswer
DiagnosticResultRule

Relationships:

User -> DiagnosticSubmission\
DiagnosticSubmission -> DiagnosticAnswer\
DiagnosticQuestion -> DiagnosticAnswer\
PageCategory -> Page

------------------------------------------------------------------------

# Installation Guide

## 1 Install dependencies

Make sure you have:

-   PHP 8+
-   Composer

## 2 Clone the repository

git clone `https://github.com/ElieMouchnino/CesiZen`

cd cesizen

## 3 Install dependencies

composer install

## 4 Configure environment

Copy the environment file:

cp .env.example .env

Configure database settings if necessary.

## 5 Run migrations

php artisan migrate

## 6 Start development server

php artisan serve

Application will run at:

http://127.0.0.1:8000

------------------------------------------------------------------------

# Useful Laravel Commands

Start server

php artisan serve

Run migrations

php artisan migrate

Create migration

php artisan make:migration

Create model

php artisan make:model ModelName

Create controller

php artisan make:controller ControllerName

List routes

php artisan route:list

Clear cache

php artisan cache:clear

------------------------------------------------------------------------

# Admin Features

Administrators can:

- Manage information pages
- Manage page categories
- Manage users
- Manage diagnostic questions
- Manage diagnostic result rules

------------------------------------------------------------------------

# Diagnostic Workflow

1 User opens diagnostic page
2 Questions are loaded from database
3 User answers questions
4 Score is calculated
5 Result rule is applied
6 Result is displayed
7 Submission is saved to user history

------------------------------------------------------------------------

# Security

The application includes:

- CSRF protection
- Input validation
- Role-based access control
- Route protection using middleware

------------------------------------------------------------------------

# Future Improvements

Possible future extensions:

- Emotion tracking system
- Relaxation activities catalog
- Breathing exercises
- Advanced analytics dashboard

------------------------------------------------------------------------

# Author

Elie Mouchnino
