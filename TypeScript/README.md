# TypeScript Basics Learning Project

## Purpose

This project is designed to learn **TypeScript fundamentals through executable code examples**.  
Each concept is demonstrated using small `.ts` files that can be executed directly, allowing learners to understand how **TypeScript behaves in real code instead of only reading theory**.

The goal of this project is to help developers who already know **JavaScript, HTML, CSS, and basic Node.js** understand:

- What **TypeScript adds on top of JavaScript**
- How **static typing improves code safety**
- How TypeScript is used in **real-world full-stack development (Node.js / React / Next.js)**

Each file focuses on **one concept at a time**, with comments explaining important ideas directly inside the code.

---

# Prerequisites

Before starting this project, you should already know:

- Basic **JavaScript syntax**
- Basic **Node.js usage**
- Basic command line usage
- How to use **VS Code or another code editor**

You need the following installed on your machine.

### Node.js

Download and install Node.js:

https://nodejs.org

Verify installation:

```bash
node -v
npm -v
```

---

# Install TypeScript Environment

Initialize a Node project:

```bash
npm init -y
```

Install TypeScript and development tools:

```bash
npm install -D typescript ts-node @types/node
```

Create a TypeScript configuration file:

```bash
npx tsc --init
```

---

# How to Run `.ts` Files

There are two common ways to run TypeScript code.

---

## Method 1 — Run Directly with ts-node (Recommended for Learning)

This allows you to run `.ts` files without compiling.

```bash
npx ts-node "path/to/file.ts"
```

Example:

```bash
npx ts-node "CH03 - Functions/01 - Parameter and Return Types.ts"
```

This is the easiest method for learning and experimentation.

---

## Method 2 — Compile TypeScript to JavaScript

Compile the project:

```bash
npx tsc
```

This generates JavaScript output files.

Then run the compiled JavaScript with Node:

```bash
node dist/example.js
```

This workflow is closer to how **production TypeScript projects work**.

---

# Learning Approach

This project follows a **practical, code-first learning approach**.

- Each file demonstrates **one concept**
- Files are **small and executable**
- Explanations are written using **comments inside the code**
- Concepts are demonstrated using **real examples**

Instead of reading long theoretical explanations, you learn by **reading and running code examples**.

---

# What You Will Learn

This project covers the **core TypeScript knowledge required for modern web development**.

---

# 1. Type System Fundamentals

You will learn how TypeScript introduces static typing to JavaScript.

Topics include:

- type inference
- explicit typing
- primitive types
- union types
- literal types
- `any`, `unknown`, `never`, `void`

These features help prevent many runtime errors.

---

# 2. Functions in TypeScript

Functions become safer and clearer with type annotations.

Topics include:

- parameter typing
- return types
- optional parameters
- default parameters
- rest parameters
- function overloads
- callback typing

These concepts are widely used in **backend APIs and application logic**.

---

# 3. Object Typing

TypeScript allows defining the structure of objects.

Topics include:

- object type annotations
- interfaces
- type aliases
- optional properties
- readonly properties
- index signatures

These are essential when working with:

- API responses
- database models
- React props

---

# 4. Arrays, Tuples, and Enums

You will learn how to type collections of data.

Topics include:

- typed arrays
- arrays of objects
- tuples
- enums
- literal union types

These appear frequently in **backend data handling**.

---

# 5. Type Narrowing and Type Guards

TypeScript can intelligently determine types during runtime checks.

Topics include:

- `typeof`
- `in`
- `instanceof`
- discriminated unions
- custom type guards

These techniques are important for **safe data processing and API validation**.

---

# 6. Generics

Generics allow writing **reusable and flexible type-safe code**.

Topics include:

- generic functions
- generic constraints
- multiple generic parameters
- generic classes
- generic API response types

Generics are widely used in:

- React hooks
- API clients
- database libraries
- reusable utilities

---

# 7. Classes in TypeScript

TypeScript enhances JavaScript classes with type safety.

Topics include:

- typed class properties
- constructor shorthand
- access modifiers (`public`, `private`, `protected`)
- `readonly`
- `extends`
- `implements`
- abstract classes

These are useful for **OOP-style application architecture**.

---

# 8. Modules and Imports

You will learn how large projects organize code across files.

Topics include:

- `export`
- `import`
- default exports
- named exports
- modular architecture
- path alias concepts

These are essential in **Node.js and Next.js projects**.

---

# 9. Utility Types

TypeScript provides powerful built-in utilities to transform types.

Topics include:

- `Partial`
- `Required`
- `Readonly`
- `Pick`
- `Omit`
- `Record`
- `ReturnType`
- `Parameters`
- `Awaited`

These utilities are heavily used in:

- APIs
- React props
- backend services
- database models

---

# 10. Async TypeScript

Modern applications rely heavily on asynchronous programming.

Topics include:

- typing `Promise<T>`
- `async / await`
- extracting async return types
- safe error handling using `unknown`

These patterns are used in:

- API calls
- database queries
- backend services
- server logic

---

# 11. Real-World TypeScript Patterns

The project also demonstrates practical scenarios such as:

- converting JavaScript code to TypeScript
- typing API responses
- handling optional data safely
- avoiding common TypeScript mistakes

These examples show how TypeScript improves **real application code**.

---

# Who This Project Is For

This project is ideal for developers who:

- already know **JavaScript**
- want to learn **TypeScript for modern web development**
- plan to work with **Node.js, React, or Next.js**
- prefer learning through **executable code examples**

---

# Final Goal

After completing this project, you should be comfortable with:

- reading TypeScript code
- writing type-safe functions and objects
- typing API responses
- using generics and utility types
- understanding TypeScript in real projects

This knowledge forms a **strong foundation for working in modern full-stack TypeScript environments** such as:

- Next.js
- React
- Node.js backends
- full-stack TypeScript applications