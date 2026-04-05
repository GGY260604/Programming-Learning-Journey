/**
 * What this file teaches:
 * - Common TypeScript + Node setup problems
 * - The *idea* behind them (so you can fix fast)
 *
 * This file itself runs like normal, but read the comments carefully.
 */

console.log("If this prints, your execution pipeline works.");

/**
 * 1) "Cannot use import statement outside a module"
 * Cause:
 * - Your TS/Node module system is mismatched (ESM vs CommonJS).
 *
 * Typical fixes:
 * - If you want CommonJS (simpler for Node beginners):
 *   tsconfig: "module": "CommonJS"
 *   and use require() in Node-style projects
 *
 * - If you want ESM (Next.js / modern):
 *   tsconfig: "module": "ESNext" (or NodeNext)
 *   package.json: { "type": "module" }
 *   and use import/export
 *
 * For this TS basics project, we can keep it simple first.
 */

/**
 * 2) JS output appears in your root folder
 * Cause:
 * - outDir not set, so tsc outputs next to the .ts files (or near root).
 *
 * Fix:
 * - Set "outDir": "./dist"
 * - (Optional) set "rootDir" so folder structure mirrors inside dist.
 */

/**
 * 3) "Cannot find name 'process'" or "Cannot find module 'fs'"
 * Cause:
 * - Node types not installed.
 *
 * Fix:
 * - npm i -D @types/node
 * - tsconfig: "types": ["node"] (or omit "types" to auto-include)
 */

/**
 * 4) "Type 'string' is not assignable to type ..."
 * This is not an error to fear—this is TypeScript doing its job.
 * It means: your types and values don't match, so fix the logic.
 */

/**
 * Quick sanity checklist for a TS Node project:
 * - npm init -y
 * - npm i -D typescript ts-node @types/node
 * - tsconfig.json: strict true, outDir dist
 * - Try: npx ts-node path/to/file.ts
 */

export {};
// (This export makes the file a module, avoiding some global-scope conflicts in TS projects)