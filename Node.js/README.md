# Node.js Backend Fundamentals Tutorial

This project is a **structured learning note for Node.js backend development**.  
It is designed for beginners who already understand **HTML, CSS, and basic JavaScript (browser-side)** and want to learn how **backend systems work**.

The tutorial teaches backend concepts through **executable `.js` files**, where each file demonstrates a concept with **working code and detailed comments**.

Instead of reading theory alone, you **run the code and observe the behavior**, which makes learning backend concepts clearer and more practical.

---

# Learning Philosophy

This tutorial follows a **learn-by-execution approach**:

- Each concept is placed in a **separate JavaScript file**
- The code is **runnable using Node.js**
- Detailed explanations are written using **comment syntax inside the code**
- Running the file demonstrates the concept immediately

Example structure of a learning file:

    /**
     * Goal:
     * - Demonstrate a backend concept
     * - Explain using comments
     */

    console.log("Example concept demonstration");

    function example() {
      return "Hello Backend";
    }

    console.log(example());

You learn by:

1. Reading the comments  
2. Running the code  
3. Observing the output  

---

# Requirements

Install the following before starting:

- **Node.js (LTS recommended)**  
  https://nodejs.org

Verify installation:

    node -v
    npm -v

---

# Running Example Files

Navigate into a chapter folder and run any file:

    node "01 - File Name.js"

Example:

    node "01 - What is Node.js.js"

---

# Project Directory Structure

    NodeJS Backend Tutorial
    │
    ├── CH00 - Setup & How To Run
    │
    ├── CH01 - Node Basics
    │
    ├── CH02 - Node Runtime
    │
    ├── CH03 - Modules
    │
    ├── CH04 - File System
    │
    ├── CH05 - Async Programming
    │
    ├── CH06 - HTTP Fundamentals
    │
    ├── CH07 - Express
    │
    ├── CH08 - Data Storage
    │
    ├── CH09 - Environment Variables
    │
    ├── CH10 - REST API Design
    │
    ├── CH11 - Authentication
    │
    ├── CH12 - Authorization
    │
    ├── CH13 - Security Basics
    │
    └── CH14 - Deployment Basics

Each chapter folder contains **multiple executable `.js` files** explaining the topic step-by-step.

---

# Topics Covered

## Node.js Fundamentals

- What Node.js is  
- Node runtime vs browser runtime  
- Node module system (`require`)  
- Built-in modules  

---

## File System

- Reading files  
- Writing files  
- Streams  
- Async file operations  

---

## Asynchronous Programming

- Callbacks  
- Promises  
- async / await  
- Event loop basics  

---

## HTTP & Web Servers

- Node HTTP server  
- Request & response  
- Handling routes manually  
- HTTP request methods  

---

## Express Framework

- Express server  
- Routing  
- Middleware  
- JSON request handling  

---

## REST API Design

- REST principles  
- Resource naming conventions  
- HTTP methods  
- Status codes  
- Good vs bad API design  

---

## Authentication

- Password hashing with bcrypt  
- JSON Web Tokens (JWT)  
- Login system  
- Protected routes  

---

## Authorization

- Role-Based Access Control (RBAC)  
- Role middleware  
- Permission checks  
- Ownership authorization  

---

## Backend Security Basics

- CORS  
- Helmet security headers  
- Rate limiting  
- Input validation  

---

## Deployment Concepts

- Development vs production environments  
- .env configuration  
- Using process.env  
- Logging  
- Production folder structure  

---

# Example Backend Request Flow

A typical backend request flow looks like this:

    Client Request
          ↓
    Route
          ↓
    Middleware
    (Auth / Validation / Security)
          ↓
    Controller
          ↓
    Service Logic
          ↓
    Database
          ↓
    Response Returned

---

# Example Production Backend Structure

    project-root
    │
    ├── package.json
    ├── .env
    ├── src
    │
    ├── config
    │   └── database.js
    │
    ├── routes
    │
    ├── controllers
    │
    ├── middleware
    │
    ├── services
    │
    ├── models
    │
    └── utils

This structure helps keep large backend systems **organized and maintainable**.

---

# Skills You Gain

After completing this tutorial, you will understand:

- How Node.js runs backend servers  
- How REST APIs work  
- How authentication systems work  
- How authorization controls access  
- How to secure backend APIs  
- How production backend projects are structured  

This knowledge prepares you for frameworks like:

- Express  
- Next.js backend  
- NestJS  
- TypeScript backend development  

---

# Recommended Next Steps

After finishing this tutorial, you may continue with:

1. TypeScript for backend development  
2. Database integration (MongoDB / PostgreSQL)  
3. Full-stack frameworks  
4. Production deployment (Docker / Cloud)  

---

# Summary

This tutorial provides a **complete beginner-to-foundation guide for Node.js backend development**, using executable code files and structured learning chapters.

It focuses on building **real backend understanding** rather than only memorizing syntax.

By the end, you will understand the **core architecture behind modern web backends**.
