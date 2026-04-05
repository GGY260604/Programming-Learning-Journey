# Next.js Project Architecture Practice

This README is designed for someone who already knows **JavaScript for browser, HTML, CSS, Node.js, and TypeScript** and now wants to understand **how a real Next.js project is organized**.

The goal is not only to run a Next.js app, but to understand **why each file and folder exists**, how the **App Router** works, and how frontend and backend logic can live in the same project.

This guide uses the **App Router**, which is the recommended router for new Next.js applications. Next.js currently documents two routers—**App Router** and **Pages Router**—but the docs recommend the newer App Router for the latest React features. The `create-next-app` CLI can scaffold a TypeScript project with App Router, Tailwind, ESLint, and Turbopack by default. Next.js also documents a minimum Node.js version of **20.9** for current releases.

---

## 1. What you are trying to learn

When learning Next.js architecture, you are really learning these 6 things:

1. **How the project starts and runs**
2. **How routes are created from folders and files**
3. **How shared UI is structured with layouts**
4. **Where reusable components and helper functions belong**
5. **How frontend and backend can exist in one codebase**
6. **How to keep the project scalable when it grows**

In plain words:

- `app/` is where routes are defined in App Router.
- `page.tsx` creates a route page.
- `layout.tsx` creates shared layout UI.
- `route.ts` creates backend request handlers.
- Other folders like `components/`, `lib/`, `types/`, and `public/` help keep the codebase clean.

These roles match the official App Router conventions in the Next.js docs. A page is created by placing a `page` file in the `app` directory, a layout is created with a `layout` file, and Route Handlers are created with `route` files inside `app`. 

---

## 2. Create the project practically

### Step 1: Create a new project

Use the official CLI:

```bash
npx create-next-app@latest nextjs-architecture-practice
```

A modern recommended setup usually includes:

- TypeScript
- ESLint
- Tailwind CSS
- App Router
- Turbopack
- Import alias such as `@/*`

That matches the current official installation flow for `create-next-app`. 

### Step 2: Move into the project folder

```bash
cd nextjs-architecture-practice
```

### Step 3: Start the development server

```bash
npm run dev
```

By default, the app runs locally at:

```bash
http://localhost:3000
```

This is the standard dev flow documented by Next.js.

---

## 3. Suggested learning project structure

Below is a good practice structure for learning architecture clearly:

```text
nextjs-architecture-practice/
├── app/
│   ├── api/
│   │   └── users/
│   │       └── route.ts
│   ├── about/
│   │   └── page.tsx
│   ├── dashboard/
│   │   ├── layout.tsx
│   │   └── page.tsx
│   ├── products/
│   │   ├── [id]/
│   │   │   └── page.tsx
│   │   └── page.tsx
│   ├── favicon.ico
│   ├── globals.css
│   ├── layout.tsx
│   └── page.tsx
├── components/
│   ├── Navbar.tsx
│   ├── Footer.tsx
│   ├── PageTitle.tsx
│   └── ProductCard.tsx
├── lib/
│   ├── data.ts
│   └── utils.ts
├── public/
│   └── images/
│       └── logo.png
├── types/
│   └── product.ts
├── .gitignore
├── eslint.config.mjs
├── next.config.ts
├── package.json
├── postcss.config.mjs
├── tsconfig.json
└── README.md
```

This structure combines the official routing conventions with a beginner-friendly way to separate concerns: routes in `app`, reusable UI in `components`, shared logic in `lib`, public assets in `public`, and TypeScript definitions in `types`. The official docs describe the key root-level files such as `package.json`, `next.config.*`, `tsconfig.json`, and `public/`, and explain the folder and file conventions inside `app/`. 

---

## 4. Architecture overview before file-by-file explanation

Think of the project in layers:

### A. Entry and configuration layer
This is how the project is recognized, configured, and executed.

- `package.json` → project metadata and scripts
- `tsconfig.json` → TypeScript rules
- `next.config.ts` or `next.config.js` → Next.js configuration
- `eslint.config.mjs` → linting rules
- `postcss.config.mjs` → CSS tooling configuration when using Tailwind/PostCSS

### B. Routing layer
This defines what URL shows what content.

- `app/page.tsx` → homepage (`/`)
- `app/about/page.tsx` → `/about`
- `app/products/page.tsx` → `/products`
- `app/products/[id]/page.tsx` → dynamic route such as `/products/1`

### C. Layout layer
This defines shared UI wrappers.

- `app/layout.tsx` → root layout for the whole app
- `app/dashboard/layout.tsx` → layout only for dashboard-related routes

### D. UI component layer
This holds reusable visual pieces.

- `components/Navbar.tsx`
- `components/Footer.tsx`
- `components/ProductCard.tsx`

### E. Logic and data layer
This stores helper functions, mock data, or server-side logic helpers.

- `lib/data.ts`
- `lib/utils.ts`
- `types/product.ts`

### F. Static asset layer
This stores files directly served to the browser.

- `public/images/logo.png`

### G. Backend endpoint layer
This handles requests inside the same Next.js project.

- `app/api/users/route.ts`

This full-stack pattern is supported directly by Route Handlers in the App Router. Next.js documents Route Handlers as the App Router equivalent of API Routes from the older Pages Router.

---

## 5. Very detailed explanation of each important part

## 5.1 `package.json`

This is the root identity card of the project.

Typical responsibilities:

- stores project name
- stores dependencies
- stores scripts like `dev`, `build`, and `start`

Example:

```json
{
  "name": "nextjs-architecture-practice",
  "version": "0.1.0",
  "private": true,
  "scripts": {
    "dev": "next dev",
    "build": "next build",
    "start": "next start",
    "lint": "eslint"
  }
}
```

Why it matters:

Without `package.json`, Node.js and npm do not know how to run or manage the project.

---

## 5.2 `app/` — the heart of App Router

In App Router, the `app` directory is the most important folder. It contains your routes, layouts, loading UI, error UI, and route handlers. The official docs describe `app` as the place where file-system routing conventions are used for the newer router. 

You should mentally think:

> “If a URL exists in my app, it probably comes from a folder or file inside `app/`.”

### Example mental mapping

- `app/page.tsx` → `/`
- `app/about/page.tsx` → `/about`
- `app/products/page.tsx` → `/products`
- `app/products/[id]/page.tsx` → `/products/:id`

That route mapping is part of the official layouts-and-pages model.

---

## 5.3 `app/layout.tsx` — root layout

This file is required for an App Router application. The root layout wraps the entire app and is the closest equivalent to the old global HTML shell. Next.js documents that an App Router application must include a root layout.

Typical responsibilities:

- defines `<html>` and `<body>`
- imports global CSS
- wraps every page in shared UI
- provides global providers later if needed

Example:

```tsx
import './globals.css'
import Navbar from '@/components/Navbar'
import Footer from '@/components/Footer'

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <body>
        <Navbar />
        <main>{children}</main>
        <Footer />
      </body>
    </html>
  )
}
```

Why it matters:

- Every route lives inside this layout.
- Shared UI should often go here.
- It prevents repeating the same structure on every page.

---

## 5.4 `app/page.tsx` — homepage

This file represents the route `/`.

Example:

```tsx
export default function HomePage() {
  return (
    <section>
      <h1>Welcome to Next.js Architecture Practice</h1>
      <p>This is the homepage.</p>
    </section>
  )
}
```

A `page` file default-exporting a React component is the core convention for pages in the App Router.

---

## 5.5 Nested route folders

Example:

```text
app/
├── about/
│   └── page.tsx
├── products/
│   ├── page.tsx
│   └── [id]/
│       └── page.tsx
```

This means:

- `/about` → static route
- `/products` → static route
- `/products/123` → dynamic route

### Why dynamic folders matter

When building real apps, many pages are based on data:

- product detail
- blog post
- user profile
- order detail

A dynamic segment such as `[id]` lets one file handle many URLs.

---

## 5.6 `app/dashboard/layout.tsx` — route group layout

Nested layouts are a major architectural feature.

Example:

```tsx
export default function DashboardLayout({ children }: { children: React.ReactNode }) {
  return (
    <section>
      <aside>Dashboard Sidebar</aside>
      <div>{children}</div>
    </section>
  )
}
```

Why it matters:

- dashboard pages can share a sidebar
- admin area can have a different shell from public pages
- the project becomes modular

The docs explain that layouts are shared UI and preserve state across navigation rather than rerendering like ordinary pages.

---

## 5.7 `app/globals.css` — global styling

Global CSS is usually imported in the root layout so it applies across the whole app. Next.js documents importing global CSS in the root layout for App Router projects. 

Typical use:

```css
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

* {
  box-sizing: border-box;
}
```

Why it matters:

- resets
- typography defaults
- app-wide styles
- Tailwind entry styles if using Tailwind

---

## 5.8 `components/` — reusable UI pieces

This folder is not a special Next.js folder by framework rule, but it is a common and recommended organization pattern.

Example:

### `components/Navbar.tsx`

```tsx
import Link from 'next/link'

export default function Navbar() {
  return (
    <nav>
      <Link href="/">Home</Link> | <Link href="/about">About</Link> | <Link href="/products">Products</Link>
    </nav>
  )
}
```

Why separate components:

- avoids giant page files
- increases reusability
- improves readability
- makes testing easier later

A strong architecture rule is:

> Pages describe a route. Components describe reusable UI.

---

## 5.9 `lib/` — shared logic, helpers, and mock data

This is another convention folder rather than a framework-enforced folder.

Example contents:

### `lib/data.ts`

```ts
export const products = [
  { id: 1, name: 'Laptop', price: 3000 },
  { id: 2, name: 'Mouse', price: 80 },
  { id: 3, name: 'Keyboard', price: 150 }
]
```

### `lib/utils.ts`

```ts
export function formatCurrency(value: number) {
  return `RM ${value.toFixed(2)}`
}
```

Why it matters:

- avoids hardcoding logic everywhere
- keeps page components cleaner
- creates a clear place for shared functions

A simple architectural habit:

- UI code in `components/`
- route code in `app/`
- helper logic in `lib/`

---

## 5.10 `types/` — TypeScript model definitions

Because you already know TypeScript, this folder helps keep data shapes organized.

### `types/product.ts`

```ts
export type Product = {
  id: number
  name: string
  price: number
}
```

Why it matters:

- improves readability
- avoids duplicated inline types
- makes larger projects easier to scale

Next.js has built-in TypeScript support and can auto-generate a recommended TypeScript setup when you use `create-next-app` with TypeScript or rename files to `.ts/.tsx` in an existing project.

---

## 5.11 `public/` — static files

Files in `public/` are served directly from the site root.

Example:

- `public/images/logo.png`

Can be accessed as:

```text
/images/logo.png
```

Why it matters:

Use it for:

- images
- icons
- downloadable files
- other static assets

---

## 5.12 `app/api/users/route.ts` — backend inside Next.js

This is one of the most important parts for understanding Next.js as a full-stack framework.

Example:

```ts
export async function GET() {
  const users = [
    { id: 1, name: 'Alice' },
    { id: 2, name: 'Bob' }
  ]

  return Response.json(users)
}
```

This creates an endpoint at:

```text
/api/users
```

Why it matters:

- frontend and backend can live in one project
- you do not always need a separate Express server
- good for APIs, authentication callbacks, and server logic

The official docs define Route Handlers as custom request handlers using the Web `Request` and `Response` APIs, available in the `app` directory.

---

## 5.13 `next.config.ts`

This file is used for project-level Next.js configuration.

Example:

```ts
import type { NextConfig } from 'next'

const nextConfig: NextConfig = {
  reactStrictMode: true,
}

export default nextConfig
```

Typical reasons to use it:

- image domains
- redirects
- experimental features
- build behavior

Next.js documents configuration through `next.config.js`, and current projects may also use a TypeScript config file depending on setup. The config file lives in the project root.

---

## 5.14 `tsconfig.json`

This file controls TypeScript behavior.

Typical responsibilities:

- compiler options
- module resolution
- path aliases
- strictness

Example path alias idea:

```json
{
  "compilerOptions": {
    "baseUrl": ".",
    "paths": {
      "@/*": ["./*"]
    }
  }
}
```

Why it matters:

Instead of:

```ts
import Navbar from '../../../components/Navbar'
```

You can write:

```ts
import Navbar from '@/components/Navbar'
```

The installation docs explicitly mention support for absolute imports and module path aliases.

---

## 6. Practical example: how one request flows through the architecture

Suppose the user visits:

```text
/products/2
```

### What happens conceptually

1. Next.js checks the `app/` folder.
2. It sees `app/products/[id]/page.tsx`.
3. The dynamic segment matches `2`.
4. The page component renders.
5. The page may import helper data from `lib/data.ts`.
6. Shared UI still comes from `app/layout.tsx`.
7. If inside a nested section, another layout may also wrap the page.

This is why the architecture feels powerful:

- routing is folder-based
- layout is layered
- logic is import-based
- backend can live nearby if needed

---

## 7. Suggested practice files you should build

To learn architecture properly, do not make only one page. Build a mini project with these files.

### `app/page.tsx`
Purpose: homepage

### `app/about/page.tsx`
Purpose: simple static page

### `app/products/page.tsx`
Purpose: list products

### `app/products/[id]/page.tsx`
Purpose: dynamic detail page

### `app/dashboard/layout.tsx`
Purpose: nested shared layout

### `app/dashboard/page.tsx`
Purpose: dashboard home

### `app/api/users/route.ts`
Purpose: simple backend endpoint

### `components/Navbar.tsx`
Purpose: top navigation

### `components/ProductCard.tsx`
Purpose: reusable product display

### `lib/data.ts`
Purpose: mock data source

### `types/product.ts`
Purpose: reusable data type

This set is enough to teach the major parts of a real Next.js architecture.

---

## 8. Best mental model for Next.js architecture

Use this mental model:

### Route files answer “Which URL?”
Examples:

- `/`
- `/about`
- `/products`
- `/products/1`

### Layout files answer “What wrapper surrounds this route?”
Examples:

- global navbar/footer
- dashboard sidebar
- admin shell

### Components answer “What UI can be reused?”
Examples:

- cards
- navbar
- buttons
- form sections

### Lib files answer “What logic or data can be shared?”
Examples:

- formatters
- fetchers
- mock arrays
- helpers

### Route handlers answer “What backend endpoint exists?”
Examples:

- `/api/users`
- `/api/auth/login`
- `/api/products`

If you keep this separation in mind, your architecture stays clean.

---

## 9. What makes Next.js different from a plain React project

A plain React project often needs you to add and organize many things manually. Next.js gives you a stronger structure through conventions such as file-system routing, root layouts, and built-in server features. The official docs distinguish App Router from general React-style setups by centering everything around the `app` directory conventions. 

Main differences:

- routing is built in
- server rendering features are built in
- API endpoints can be built in the same project
- layouts are built into routing architecture
- TypeScript integration is built in

This is why Next.js is often easier to scale than manually assembling many libraries yourself. That said, good architecture still depends on how you organize your own folders like `components`, `lib`, and `types`.

---

## 10. A good beginner architecture rule set

When you build your first serious Next.js project, follow these rules:

### Rule 1
Keep route files thin.

A page should mainly:

- define the route UI
- import components
- call helpers or fetch data

### Rule 2
Move repeated UI into `components/`.

### Rule 3
Move repeated logic into `lib/`.

### Rule 4
Move reusable types into `types/`.

### Rule 5
Put backend handlers in `app/api/.../route.ts`.

### Rule 6
Use layouts for shared shells, not copy-paste wrappers.

### Rule 7
Do not dump everything into `app/` directly.

Create subfolders with clear meaning as the project grows.

---

## 11. Recommended learning order inside this project

Since you already know browser JavaScript, HTML, CSS, Node.js, and TypeScript, this is a strong order:

1. Create the project with `create-next-app`
2. Understand root files in the project root
3. Understand `app/layout.tsx`
4. Create simple pages with `page.tsx`
5. Create nested routes
6. Create a dynamic route
7. Create reusable components
8. Create a simple API route handler
9. Separate helpers into `lib/`
10. Separate types into `types/`

This order moves from visible structure to deeper architecture.

---

## 12. Final summary

A clean Next.js project architecture can be understood like this:

- **Root files** configure and run the app
- **`app/`** defines routes and layouts
- **`page.tsx`** files represent pages
- **`layout.tsx`** files represent shared wrappers
- **`route.ts`** files represent backend handlers
- **`components/`** stores reusable UI
- **`lib/`** stores shared logic and data
- **`types/`** stores TypeScript types
- **`public/`** stores static files

The biggest idea is this:

> Next.js architecture is based on convention.
>
> The folder structure is not just organization.
> In many places, the folder structure becomes the behavior of the app.

That is why learning the architecture early is so important.

---

