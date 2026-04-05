/**
 * What this file teaches:
 * - What tsconfig.json does conceptually
 * - Why "strict" matters
 * - A tiny example that becomes safer with strict checking
 *
 * tsconfig.json is NOT code that runs.
 * It's TypeScript compiler settings (how TS checks + outputs JS).
 */

// Example: a value that might be missing (undefined)
type ApiUser = {
  id: number;
  name?: string; // optional property (could be missing)
};

// Pretend this came from an API
const apiUser: ApiUser = { id: 7 };

// Without strict settings (or with weak checks), devs might write:
// const greeting = "Hello, " + apiUser.name.toUpperCase(); // <- risky!
const greeting = "Hello, " + apiUser.name?.toUpperCase(); // safer with optional chaining
console.log(greeting);

/**
 * Why risky?
 * - apiUser.name can be undefined
 * - calling .toUpperCase() on undefined will crash at runtime
 *
 * With "strict": true, TypeScript will warn you here:
 * "Object is possibly 'undefined'."
 *
 * The TS way: handle the undefined case safely.
 */

// ✅ Safe version:
const safeName = apiUser.name ?? "Anonymous"; // if undefined, use fallback
console.log("Safe Hello,", safeName.toUpperCase());

/**
 * Key tsconfig options you will likely use:
 * - "strict": true
 * - "rootDir": "./src" (if you use src folder)
 * - "outDir": "./dist" (where compiled JS goes)
 * - "esModuleInterop": true (common compatibility setting)
 * - "skipLibCheck": true (faster builds, common in real projects)
 *
 * The goal is not to memorize options:
 * The goal is: strict mode helps you catch bugs earlier.
 */