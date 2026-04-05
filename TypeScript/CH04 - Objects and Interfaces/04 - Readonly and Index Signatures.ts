/**
 * readonly
 * Prevents modification after creation
 */

interface Config {
  readonly apiKey: string
  baseURL: string
}

const config: Config = {
  apiKey: "ABC123",
  baseURL: "https://api.example.com"
};

config.baseURL = "https://api2.example.com"; // OK

// ❌ Cannot modify readonly
// config.apiKey = "NEWKEY"

console.log(config);


/**
 * Index signatures
 * Used when object keys are dynamic
 */

interface ScoreBoard {
  [player: string]: number
}

const scores: ScoreBoard = {
  Alice: 10,
  Bob: 15,
  Carol: 20
};

console.log(scores["Alice"]);


/**
 * Example: API dynamic data
 */

interface ApiData {
  [key: string]: string | number
}

const data: ApiData = {
  name: "Server1",
  uptime: 10234,
  region: "Asia"
};

console.log(data);