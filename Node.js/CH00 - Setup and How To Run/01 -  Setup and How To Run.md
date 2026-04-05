# CH00 – Setup & How To Run

This chapter prepares your environment for learning Node.js backend development.

There are no executable files in this chapter.
This chapter is purely conceptual and setup-based.

---

# 1️⃣ What is Node.js?

Node.js is a JavaScript runtime that allows JavaScript to run outside the browser.

Before:
- JavaScript runs in the browser (HTML + CSS + JS)
- JS handles UI, DOM, user interaction

Now with Node.js:
- JavaScript runs on your computer/server
- JS can access:
  - Files
  - Operating system
  - Network
  - Environment variables
  - Create HTTP servers
  - Connect to databases

Node.js = Backend JavaScript

---

# 2️⃣ Frontend vs Backend (Clear Difference)

Frontend:
- Runs in browser
- Has DOM
- Has window object
- Cannot access local file system directly
- Focus on UI

Backend (Node.js):
- Runs on server / local machine
- No DOM
- No window object
- Can access file system
- Can create HTTP server
- Handles database logic
- Handles authentication
- Returns JSON to frontend

---

# 3️⃣ Install Node.js

Step 1:
Download Node.js from:
https://nodejs.org

Install the LTS (Long Term Support) version.

---

# 4️⃣ Check Installation

Open terminal or PowerShell and run:

node -v
npm -v

You should see versions like:

v20.x.x
10.x.x

If versions appear → installation successful.

---

# 5️⃣ How to Run a JavaScript File in Node

Create a file:

test.js

Example content:

console.log("Hello Node");

Run it using:

node test.js

Node will execute the file.

```text
Unlike browser JS:
- No HTML required
- No <script> tag
- No DOM
```

Node runs pure JavaScript.

---

# 6️⃣ What is npm?

npm = Node Package Manager

It allows you to:
- Install libraries
- Manage dependencies
- Create scripts
- Manage project versions

Initialize a project:

npm init -y

This creates:

package.json

package.json stores:
- Project name
- Version
- Dependencies
- Scripts

---

# 7️⃣ What is package.json?

It is the brain of your Node project.

Example structure:

{
  "name": "my-backend",
  "version": "1.0.0",
  "main": "index.js",
  "scripts": {
    "start": "node index.js"
  }
}

You can now run:

npm start

Instead of:

node index.js

---

# 8️⃣ Common Project Structure (Basic)

```
project-folder/
│
├── package.json
├── index.js
└── node_modules/
```

node_modules:
- Contains installed packages
- Never manually edit
- Usually ignored in Git

---

# 9️⃣ Important Difference from Browser JavaScript

In Node.js:
- No document
- No window
- No alert()

Instead:
- console.log()
- require() / import
- fs module
- http module

Node provides built-in modules.

---

End of CH00