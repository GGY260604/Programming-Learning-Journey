# Backend Project Structure (Clean Architecture)

This file teaches how to organize Node.js / Express backend code in a clean and scalable way.

If you keep everything inside one file:

- it becomes hard to debug  
- it becomes hard to maintain  
- adding new features becomes painful  
- teamwork becomes difficult  

A good backend is not only **working**, but also **organized**.

---

# 1️⃣ Typical Backend Folder Structure

A common structure:

```txt
Backend-App/
│  package.json
│  .env
│  .gitignore
│
└─ src/
   ├─ server.js
   ├─ routes/
   ├─ controllers/
   ├─ services/
   ├─ middlewares/
   ├─ models/
   ├─ utils/
   └─ config/
```

---

# 2️⃣ What Each Folder Usually Means

## src/server.js

The **main entry point** of the backend application.

Responsibilities:

- Start the Express application
- Register middleware
- Register routes
- Start listening on the server port

---

## routes/

Defines **route paths** and maps **URL → controller functions**.

Routes should contain **very little logic**.

Example files:

```
userRoutes.js
authRoutes.js
```

Example responsibility:

```
POST /users  → userController.createUser
GET  /users  → userController.getUsers
```

---

## controllers/

Controllers handle **request and response logic**.

They extract input from:

- `req.params`
- `req.query`
- `req.body`

Then they call the **service layer** to perform business logic.

Finally, they send a **JSON response** back to the client.

Controllers should stay **thin** and mainly focus on:

- input validation
- calling service functions
- returning responses

---

## services/

Services contain the **core business logic** of the application.

This is where the **real work happens**.

Typical responsibilities:

- perform calculations
- communicate with database
- process data
- apply business rules

Example service functions:

```
createUser()
getUserById()
updateUser()
deleteUser()
```

Services return results back to **controllers**.

---

## middlewares/

Middleware functions run **before the controller is executed**.

Common middleware responsibilities:

- authentication
- logging
- request validation
- error handling
- rate limiting
- parsing request body

Example:

```
authMiddleware.js
loggerMiddleware.js
errorHandler.js
```

---

## models/

Models define the **data structure** used by the application.

In database-driven projects, models represent **database schemas**.

Examples:

- **Mongoose Schema (MongoDB)**
- **Prisma Models**
- **Sequelize Models**

Models define things like:

- field names
- data types
- validation rules
- relationships

---

## utils/

Utility functions that are shared across the project.

These functions **do not contain business logic**.

Examples:

- formatting dates
- generating random IDs
- hashing passwords
- parsing CSV files

Example files:

```
dateFormatter.js
hashPassword.js
randomId.js
```

---

## config/

Configuration files used by the application.

Typical configuration includes:

- database connection settings
- environment variable loaders
- constant values
- application settings

Example files:

```
db.js
env.js
constants.js
```

---

# 3️⃣ Request Flow in a Clean Backend

When a client calls:

```
POST /users
```

The request usually flows like this:

```
Client Request
   ↓
Middleware (auth / logger / json parser)
   ↓
Route (routes/users.js)
   ↓
Controller (controllers/userController.js)
   ↓
Service (services/userService.js)
   ↓
Database / Data Layer
   ↓
Return result back
   ↓
Response JSON to client
```

This layered structure provides:

- clarity
- easier debugging
- easier extension
- cleaner teamwork

---

# 4️⃣ Why This Matters for TypeScript Backend

When you move into **TypeScript**, this structure becomes even more important.

Benefits include:

- easier type management
- clearer module boundaries
- better maintainability
- professional code organization

Most TypeScript backend projects follow the same architecture:

```
routes
controllers
services
models
middlewares
```

This separation allows TypeScript types to stay **clean and reusable**.

---