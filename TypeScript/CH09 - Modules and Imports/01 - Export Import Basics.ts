/**
 * TypeScript modules work the same way as modern JavaScript modules.
 *
 * Files can export values (functions, variables, classes)
 * and other files can import them.
 *
 * In a real project these would be in separate files.
 * Here we simulate the idea in one file for demonstration.
 */

/**
 * Example export
 */

export function add(a: number, b: number): number {
  return a + b;
}

export const projectName = "Disaster AI System";

export class Logger {
  log(message: string) {
    console.log("[LOG]:", message);
  }
}


/**
 * Example import (concept demonstration)
 *
 * In another file you would write:
 *
 * import { add, projectName, Logger } from "./01 - Export Import Basics";
 */

const result = add(2, 3);

const logger = new Logger();

logger.log(`Result = ${result}`);
logger.log(`Project: ${projectName}`);


/**
 * Important idea:
 *
 * export -> makes something available outside the file
 * import -> brings it into another file
 *
 * This is how large applications are structured.
 */