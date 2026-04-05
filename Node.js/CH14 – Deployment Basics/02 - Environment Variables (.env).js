/**
 * ============================================================
 * 02 - Environment Variables (.env).js
 * ============================================================
 *
 * Goal:
 * - Understand environment variables
 * - Use dotenv to load variables from .env file
 * - Access variables using process.env
 *
 * Run:
 * npm install dotenv
 * node "02 - Environment Variables (.env).js"
 *
 * ============================================================
 */

/**
 * Load .env file variables
 */

require("dotenv").config();

console.log("===== Environment Variables (.env) =====");


/**
 * ============================================================
 * Example .env File
 * ============================================================
 */

console.log("\nExample .env file:");

const exampleEnv = `
PORT=4000
DATABASE_URL=mongodb://localhost:27017/myapp
JWT_SECRET=super-secret-key
`;

console.log(exampleEnv);


/**
 * ============================================================
 * Access Environment Variables
 * ============================================================
 */

console.log("\nAccessing variables using process.env:");

const port = process.env.PORT;
const databaseURL = process.env.DATABASE_URL;
const jwtSecret = process.env.JWT_SECRET;

console.log("PORT:", port);
console.log("DATABASE_URL:", databaseURL);
console.log("JWT_SECRET:", jwtSecret);


/**
 * ============================================================
 * Default Values
 * ============================================================
 */

console.log("\nUsing default value if variable missing:");

const serverPort = process.env.PORT || 3000;

console.log("Server port:", serverPort);


/**
 * ============================================================
 * Why .env Files Are Important
 * ============================================================
 */

console.log("\nWhy environment variables are important:");

const reasons = [
  "Keep secrets out of source code",
  "Different configs for development and production",
  "Easier deployment configuration"
];

reasons.forEach(r => console.log("-", r));


/**
 * ============================================================
 * Important Security Rule
 * ============================================================
 */

console.log("\nSecurity rule:");

console.log("Never commit .env file to GitHub!");

console.log("\nUse .gitignore to exclude it.");


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ .env stores environment variables
 * ✔ dotenv loads variables into process.env
 * ✔ process.env accesses the values
 * ✔ Never expose secrets in source code
 *
 * ============================================================
 */