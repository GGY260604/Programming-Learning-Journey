/**
 * ============================================================
 * 03 - path Module.js
 * ============================================================
 *
 * Goal:
 * - Understand Node built-in path module
 * - Learn path.join()
 * - Learn path.resolve()
 * - Learn path.basename(), dirname(), extname()
 *
 * Very important for file system & backend projects.
 *
 * Run:
 * node "03 - path Module.js"
 * ============================================================
 */

const path = require("path");

console.log("===== 1️⃣ path.join() =====");

/**
 * Safely joins path segments.
 * Automatically handles slashes.
 */

const joinedPath = path.join("folder", "subfolder", "file.txt");
console.log("Joined Path:", joinedPath);


/**
 * On Windows:
 * folder\subfolder\file.txt
 *
 * On Mac/Linux:
 * folder/subfolder/file.txt
 *
 * It automatically adapts to OS.
 */


console.log("\n===== 2️⃣ path.resolve() =====");

/**
 * Resolves into absolute path.
 */

const resolvedPath = path.resolve("file.txt");
console.log("Resolved Path:", resolvedPath);


/**
 * resolve() gives absolute path from current working directory.
 */


console.log("\n===== 3️⃣ Using __dirname with path.join() =====");

/**
 * This is VERY common in backend.
 */

const filePath = path.join(__dirname, "data.txt");

console.log("Safe file path:", filePath);


/**
 * Always combine __dirname + path.join()
 * to avoid path errors.
 */


console.log("\n===== 4️⃣ path.basename() =====");

const examplePath = "/users/admin/documents/report.pdf";

console.log("Basename:", path.basename(examplePath)); // report.pdf


console.log("\n===== 5️⃣ path.dirname() =====");

console.log("Dirname:", path.dirname(examplePath)); // /users/admin/documents


console.log("\n===== 6️⃣ path.extname() =====");

console.log("Extension:", path.extname(examplePath)); // .pdf


/**
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 */

console.log("\n===== BACKEND SIMULATION =====");

/**
 * Suppose user uploads a file.
 * We want to:
 * - Get file extension
 * - Save with new name
 */

function generateUploadPath(originalName) {
    const extension = path.extname(originalName);
    const newName = `upload_${Date.now()}${extension}`;
    return path.join(__dirname, "uploads", newName);
}

const uploadPath = generateUploadPath("profile.png");
console.log("Generated upload path:", uploadPath);


/**
 * ============================================================
 * WHY THIS MATTERS
 * ============================================================
 *
 * Without path module:
 * ❌ You may break app on Windows
 * ❌ Hardcoded slashes cause bugs
 *
 * With path module:
 * ✔ Cross-platform safe
 * ✔ Clean file handling
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ path.join() → safe path combining
 * ✔ path.resolve() → absolute path
 * ✔ path.extname() → file extension
 * ✔ Always use with __dirname
 *
 * Backend file handling depends on this.
 * ============================================================
 */