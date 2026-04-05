/**
 * ============================================================
 * 04 - Streams Intro.js
 * ============================================================
 *
 * Goal:
 * - Understand what streams are
 * - Learn createReadStream()
 * - Learn createWriteStream()
 * - Understand chunk-based processing
 *
 * Run:
 * node "04 - Streams Intro.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");
const { finished, pipeline } = require("stream/promises");

const sourcePath = path.join(__dirname, "bigfile.txt");
const copyPath = path.join(__dirname, "copy.txt");

(async () => {
  console.log("__dirname =", __dirname);
  console.log("sourcePath =", sourcePath);

  console.log("===== 1️⃣ Creating Large File =====");

  if (!fs.existsSync(sourcePath)) {
    const writeStream = fs.createWriteStream(sourcePath);

    // Always handle stream errors
    writeStream.on("error", (err) => {
      console.log("WriteStream error:", err.message);
    });

    for (let i = 0; i < 10000; i++) {
      writeStream.write(`Line ${i}\n`);
    }

    writeStream.end();

    // ✅ Wait until file is fully flushed/closed
    await finished(writeStream);

    console.log("Large file created.");
  } else {
    console.log("Large file already exists.");
  }

  console.log("\n===== 2️⃣ Reading File with Stream =====");

  const readStream = fs.createReadStream(sourcePath, { encoding: "utf-8" });

  readStream.on("data", (chunk) => {
    console.log("Received chunk of size:", chunk.length);
  });

  readStream.on("end", () => {
    console.log("Finished reading file.");
  });

  readStream.on("error", (err) => {
    console.log("Stream error:", err.message);
  });

  // Optional: wait for the read to finish before moving on
  await finished(readStream).catch(() => {});

  console.log("\n===== 3️⃣ Copy File Using Streams =====");

  // ✅ pipeline handles errors properly and returns a promise
  await pipeline(
    fs.createReadStream(sourcePath),
    fs.createWriteStream(copyPath)
  );

  console.log("File copied using streams.");
})().catch((err) => {
  console.log("Unexpected error:", err.message);
});

/**
 * ============================================================
 * WHY STREAMS ARE IMPORTANT
 * ============================================================
 *
 * Without streams:
 * - Entire file loads into memory
 * - Memory explosion risk
 *
 * With streams:
 * - Data processed in chunks
 * - Memory efficient
 *
 * ============================================================
 * REAL BACKEND USAGE
 * ============================================================
 *
 * - Video streaming server
 * - File upload handling
 * - Large CSV processing
 * - HTTP response streaming
 *
 * Express example:
 *
 * app.get("/download", (req, res) => {
 *   fs.createReadStream("bigfile.txt").pipe(res);
 * });
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Streams handle large data efficiently
 * ✔ data event gives chunk
 * ✔ end event signals completion
 * ✔ pipe() connects streams
 *
 * Streams are core to Node performance.
 *
 * ============================================================
 */