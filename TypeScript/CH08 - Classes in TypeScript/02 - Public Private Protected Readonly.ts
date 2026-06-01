/**
 * TypeScript supports access modifiers.
 *
 * public    -> accessible everywhere
 * private   -> accessible only inside the class
 * protected -> accessible inside class + subclasses
 */

class BankAccount {

  public owner: string;
  private balance: number;

  constructor(owner: string, balance: number) {
    this.owner = owner;
    this.balance = balance;
  }

  deposit(amount: number) {
    this.balance += amount;
  }

  getBalance() {
    return this.balance;
  }

}

const account = new BankAccount("Alice", 1000);

account.deposit(500);

console.log(account.owner);
console.log(account.getBalance());

// ❌ not allowed
// console.log(account.balance)


/**
 * readonly property
 */

class Config {

  readonly apiKey: string;

  constructor(apiKey: string) {
    this.apiKey = apiKey;
  }

}

const cfg = new Config("ABC123");

console.log(cfg.apiKey);

// ❌ cannot modify
// cfg.apiKey = "NEWKEY"