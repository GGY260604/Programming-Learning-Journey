/*
CH13 - 02
HTTP Client Discipline (Uri, Headers, Timeout, Status)

GOAL:
- Learn proper HTTP request structure
- Use Uri correctly
- Handle status codes properly
- Add timeout protection

IMPORTANT:
Never just do:
http.get("string-url")

Always:
1) Build Uri properly
2) Check statusCode
3) Handle errors
4) Add timeout
*/

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: HttpDisciplinePage(),
    ),
  );
}

class HttpDisciplinePage extends StatefulWidget {
  const HttpDisciplinePage({super.key});

  @override
  State<HttpDisciplinePage> createState() => _HttpDisciplinePageState();
}

class _HttpDisciplinePageState extends State<HttpDisciplinePage> {
  String status = "Idle";
  String? data;
  String? error;

  Future<void> fetchPost() async {
    setState(() {
      status = "Loading...";
      data = null;
      error = null;
    });

    debugPrint("HTTP: building Uri");

    final uri = Uri.https("jsonplaceholder.typicode.com", "/posts/1");

    try {
      final response = await http
          .get(uri, headers: {"Accept": "application/json"})
          .timeout(const Duration(seconds: 5));

      debugPrint("HTTP: statusCode = ${response.statusCode}");

      if (response.statusCode == 200) {
        final decoded = jsonDecode(response.body);
        setState(() {
          status = "Success ✅";
          data = decoded["title"];
        });
      } else {
        throw Exception("Server error: ${response.statusCode}");
      }
    } catch (e) {
      setState(() {
        status = "Error ❌";
        error = e.toString();
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH13/02 – HTTP Discipline')),
      body: Center(
        child: Padding(
          padding: const EdgeInsets.all(20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              const Text(
                "Proper HTTP Discipline:",
                style: TextStyle(fontWeight: FontWeight.bold),
              ),
              const SizedBox(height: 8),
              const Text(
                "1) Use Uri.https()\n"
                "2) Add headers\n"
                "3) Check statusCode\n"
                "4) Add timeout\n"
                "5) Decode JSON safely\n",
                style: TextStyle(fontSize: 13),
              ),
              const SizedBox(height: 20),

              Card(
                child: Padding(
                  padding: const EdgeInsets.all(16),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        "Status: $status",
                        style: const TextStyle(fontWeight: FontWeight.bold),
                      ),
                      const SizedBox(height: 8),
                      if (data != null) Text("Title: $data"),
                      if (error != null)
                        Text(
                          "Error: $error",
                          style: const TextStyle(color: Colors.red),
                        ),
                      const SizedBox(height: 12),
                      ElevatedButton(
                        onPressed: fetchPost,
                        child: const Text("Fetch Post"),
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

/*
Mental Model:

HTTP Discipline Checklist:

✔ Always construct Uri properly
✔ Never trust statusCode blindly
✔ Always protect with timeout
✔ Parse JSON only after validation

Next:
We design a proper error system
with custom exceptions and result wrappers.
*/
