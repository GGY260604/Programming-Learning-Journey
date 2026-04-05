# React Learning Tutorial (Executable HTML Version)

## Overview

This project is a **practical React learning tutorial** designed to help beginners understand React concepts by running **independent executable HTML files** in the browser.

Instead of using a full React build environment (like Vite or Next.js), this tutorial uses:

- React CDN
- ReactDOM CDN
- Babel CDN

This allows every example file to be **opened directly in the browser** without installing dependencies or running build commands.

Each concept is demonstrated through **real working examples**, and the code includes **clear comments explaining the concepts**.

The goal of this project is to build a **solid React foundation before moving into Next.js full-stack development**.

---

# How to Run the Examples

Each file is an **independent React example**.

To run any example:

1. Open the `.html` file in your browser  
2. Or right-click the file in VSCode and choose **Open with Live Server**

Because React and Babel are loaded via CDN, **no installation is required**.

Example libraries used in every file:

```html
<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>

<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
```

Babel allows us to write **JSX directly inside the browser**.

---

# What You Will Learn

This tutorial covers the **core React fundamentals required before learning Next.js**.

### React Fundamentals

- JSX
- Rendering elements
- React components
- Component composition

### Data Flow

- Props
- Parent → Child communication
- Child → Parent communication

### State Management

- `useState`
- updating objects
- updating arrays
- immutable state updates

### User Interaction

- event handling
- forms
- controlled components
- validation

### Rendering Logic

- conditional rendering
- rendering lists
- keys in lists
- filtering data

### React Hooks

- `useEffect`
- `useRef`
- custom hooks

### Component Architecture

- lifting state up
- shared state
- reusable components

### Performance Optimization

- `React.memo`
- `useMemo`
- `useCallback`

---

# Why This Learning Style

This tutorial uses **executable examples instead of static notes**.

Benefits:

- You **see real behavior in the browser**
- You can **modify the code and experiment**
- Each file focuses on **one specific concept**
- No complex tooling required

This approach helps build **strong intuition about how React works internally**.

---

# Who This Project Is For

This tutorial is suitable for developers who already know:

- HTML
- CSS
- JavaScript

And want to learn:

- **React fundamentals**
- **modern React hooks**
- **component architecture**

before moving into:

- **Next.js**
- **full-stack React applications**

---

# Next Learning Step

After completing this tutorial, the next step is learning **Next.js**, which adds:

- file-based routing
- server components
- API routes
- authentication
- database integration
- full-stack architecture

Example learning roadmap:

```
React Fundamentals → Next.js Framework → Full Stack Applications
```

---

# Summary

This project provides a **hands-on React learning experience** through runnable examples.

By completing all chapters, you will gain a **strong understanding of React's core concepts**, preparing you to build real-world applications using **Next.js and modern React ecosystems**.