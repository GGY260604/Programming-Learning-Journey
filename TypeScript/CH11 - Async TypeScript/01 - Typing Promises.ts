/**
 * Many backend operations are asynchronous:
 * - API requests
 * - database queries
 * - file operations
 *
 * TypeScript allows us to specify the type inside a Promise.
 */

// Promise<number>
function getRandomNumber(): Promise<number> {
  return new Promise((resolve) => {
    const value = Math.floor(Math.random() * 100);
    resolve(value);
  });
}

getRandomNumber().then((num) => {
  console.log("Random number:", num);
});


/**
 * Promise<object>
 */

type User = {
  id: number
  name: string
};

function fetchUser(): Promise<User> {
  return new Promise((resolve) => {
    resolve({
      id: 1,
      name: "Galen"
    });
  });
}

fetchUser().then((user) => {
  console.log("User:", user.name);
});


/**
 * Key idea:
 *
 * Promise<T>
 * means the async result will eventually return type T.
 */