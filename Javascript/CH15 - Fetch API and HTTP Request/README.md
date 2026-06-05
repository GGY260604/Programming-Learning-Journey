# CH15 - Fetch API and HTTP Request

This chapter teaches how JavaScript communicates with servers using the Fetch API.

The examples in this chapter are executable HTML files. Open each file in a browser and click the buttons to test the behavior.

> Most examples use online sample APIs, so an internet connection is required.

## Files in this chapter

| File | Main topic | What you learn |
|---|---|---|
| `01 - Fetch GET Request.html` | Basic GET request | Use `fetch(url)`, handle the `Response` object, and process a Promise with `.then()` and `.catch()`. |
| `02 - Fetch JSON Data.html` | JSON response data | Use `response.json()`, receive arrays/objects from an API, and display selected records. |
| `03 - Fetch POST Request.html` | POST request | Send data using `method`, `headers`, and `body`, plus convert objects with `JSON.stringify()`. |
| `04 - Headers.html` | HTTP headers | Add request headers and read allowed response headers using `response.headers.get()`. |
| `05 - Loading and Error State.html` | Loading and error handling | Show loading status, check `response.ok`, handle HTTP errors, and handle network errors. |
| `06 - AbortController.html` | Cancel requests | Use `AbortController`, pass `signal` into `fetch()`, and cancel active requests. |

## Important syntax summary

```js
fetch("https://example.com/data")
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    console.log(data);
  })
  .catch(function (error) {
    console.log(error.message);
  });
```

## GET request

```js
fetch("https://example.com/posts/1")
```

A GET request is used to read data. `fetch(url)` uses GET by default.

## POST request

```js
fetch("https://example.com/posts", {
  method: "POST",
  headers: {
    "Content-Type": "application/json"
  },
  body: JSON.stringify({ title: "Hello" })
});
```

A POST request is commonly used to create or submit data.

## Response status checking

```js
if (response.ok === false) {
  throw new Error("HTTP error: " + response.status);
}
```

`fetch()` does not automatically treat HTTP statuses like 404 as a rejected Promise. Use `response.ok` to check whether the response is successful.

## Request cancellation

```js
const controller = new AbortController();

fetch(url, {
  signal: controller.signal
});

controller.abort();
```

`AbortController` is useful when a request is no longer needed.

## Notes

- The Fetch API is asynchronous.
- `response.json()` also returns a Promise.
- Some online APIs may block requests because of CORS rules.
- Do not put real private API keys directly inside front-end JavaScript files.
