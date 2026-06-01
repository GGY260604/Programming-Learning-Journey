/**
 * In large projects, relative imports become messy.
 *
 * Example:
 *
 * import { User } from "../../../../models/User"
 *
 * TypeScript allows path aliases to simplify imports.
 */


/**
 * Example alias
 *
 * tsconfig.json
 *
 * {
 *   "compilerOptions": {
 *     "baseUrl": "./src",
 *     "paths": {
 *       "@models/*": ["models/*"],
 *       "@utils/*": ["utils/*"]
 *     }
 *   }
 * }
 */


/**
 * Then imports become:
 *
 * import { User } from "@models/User"
 * import { calculate } from "@utils/math"
 */


/**
 * Why this is useful:
 *
 * - cleaner imports
 * - easier refactoring
 * - common in large projects
 *
 * Used heavily in:
 * - Next.js
 * - React
 * - large backend systems
 */

const message = "Path aliases help organize large projects.";

console.log(message);