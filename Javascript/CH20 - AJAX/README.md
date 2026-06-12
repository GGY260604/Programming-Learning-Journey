# CH20 - AJAX

This chapter is a compact AJAX chapter based on the main lecture flow:

```text
1. What AJAX is
2. How AJAX works
3. XMLHttpRequest object
4. Sending requests
5. Handling responses
6. readyState and status
7. jQuery AJAX
8. Fetch API
```

AJAX means **Asynchronous JavaScript and XML**. It is a browser technique that allows JavaScript to request small amounts of data from a server and update part of a web page without refreshing the whole page.

Although AJAX originally mentions XML, modern AJAX commonly works with:

```text
Plain text
JSON
XML
HTML
```

---

## Files Included

| File | Purpose |
|---|---|
| `01 - AJAX Concept and Workflow.html` | Explains what AJAX is and demonstrates a simple text request. |
| `02 - XMLHttpRequest GET Text and JSON.html` | Shows how to use `XMLHttpRequest` to load text and JSON. |
| `03 - readyState status and responseText.html` | Explains `readyState`, `status`, and `responseText`. |
| `04 - GET POST and Form Data.html` | Shows GET query string format and POST JSON format. |
| `05 - Error Timeout and Abort.html` | Shows how to handle failure, timeout, and abort cases. |
| `06 - AJAX with jQuery.html` | Shows `.load()`, `$.get()`, and `$.ajax()` using jQuery CDN. |
| `07 - AJAX with Fetch.html` | Shows the modern `fetch()` API for AJAX-style requests. |
| `08 - Method Property and Value Reference.html` | Provides a compact reference for common AJAX methods and values. |

---

## Data Files

```text
data/
├── message.txt
├── users.json
└── menu.xml
```

These files are used as local server responses for the AJAX demos.

---

## How to Run

AJAX examples should be run through a local server.

Do not open the files directly using `file://` because browser security may block local AJAX requests.

### Option 1: VS Code Live Server

```text
1. Open the JavaScript folder in VS Code.
2. Right-click an HTML file.
3. Choose "Open with Live Server".
```

### Option 2: Python Server

Open terminal inside the `JavaScript` folder and run:

```bash
python -m http.server 5500
```

Then open:

```text
http://localhost:5500/CH20%20-%20AJAX/
```

---

## Important Notes

### About CORS

If an AJAX request tries to access a different domain, the browser may block it because of CORS.

For learning, use:

```text
Local files through a local server
A public API that allows CORS
Your own backend with correct CORS headers
```

Do not disable browser security for normal practice.

### About GET and POST

```text
GET  - commonly receives data or sends simple query string data.
POST - commonly sends data in the request body.
```

Example GET query string:

```text
plus2num.php?num1=10&num2=5
```

Example POST JSON body:

```json
{
  "num1": 10,
  "num2": 5
}
```

---

## Main Syntax Summary

### XMLHttpRequest Basic Template

```javascript
const ajax = new XMLHttpRequest();

ajax.open("GET", "data/users.json", true);

ajax.onload = function () {
  if (ajax.status === 200) {
    console.log(ajax.responseText);
  }
};

ajax.send();
```

### readyState Check Template

```javascript
ajax.onreadystatechange = function () {
  if (ajax.readyState === 4 && ajax.status === 200) {
    console.log(ajax.responseText);
  }
};
```

### POST JSON Template

```javascript
const ajax = new XMLHttpRequest();

ajax.open("POST", url, true);
ajax.setRequestHeader("Content-Type", "application/json");
ajax.send(JSON.stringify(data));
```

### jQuery AJAX Template

```javascript
$.ajax({
  url: "data/users.json",
  method: "GET",
  dataType: "json",
  success: function (response) {
    console.log(response);
  },
  error: function (xhr, status, error) {
    console.log(error);
  }
});
```

### Fetch Template

```javascript
fetch("data/users.json")
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    console.log(data);
  })
  .catch(function (error) {
    console.log(error);
  });
```

---

## Learning Goal

After this chapter, you should understand how to:

```text
Use AJAX to update part of a page without refreshing.
Create and send XMLHttpRequest requests.
Read responseText and JSON data.
Check readyState and status.
Send GET and POST requests.
Handle errors, timeouts, and aborts.
Use jQuery AJAX methods.
Use fetch() as a modern AJAX method.
```
