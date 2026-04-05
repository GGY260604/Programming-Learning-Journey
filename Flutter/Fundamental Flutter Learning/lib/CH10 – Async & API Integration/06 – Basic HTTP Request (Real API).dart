/*
Open your pubspec.yaml and add:
  dependencies:
    flutter:
      sdk: flutter
    http: ^1.2.1

Then run:
  flutter pub get
*/

/*
CH10 - 06
Basic HTTP Request (Real API)

GOAL:
- Make real HTTP request
- Decode JSON
- Handle loading / success / error
- Display real data

IMPORTANT:
Network call is async.
*/

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(const MyApp());
}

/*
App root
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: RealApiPage(),
    );
  }
}

class RealApiPage extends StatefulWidget {
  const RealApiPage({super.key});

  @override
  State<RealApiPage> createState() => _RealApiPageState();
}

class _RealApiPageState extends State<RealApiPage> {
  Future<Map<String, dynamic>>? _future;

  /*
  Real API call
  */
  Future<Map<String, dynamic>> fetchTodo() async {
    final url = Uri.parse("https://jsonplaceholder.typicode.com/todos/1");

    final response = await http.get(url);

    /*
    Check HTTP status code
    */
    if (response.statusCode == 200) {
      /*
      Convert JSON string into Map
      */
      return jsonDecode(response.body);
    } else {
      throw Exception("Failed to load data");
    }
  }

  void loadData() {
    setState(() {
      _future = fetchTodo();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/06 – Real API')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            if (_future == null)
              const Text("Press button to load data")
            else
              FutureBuilder<Map<String, dynamic>>(
                future: _future,
                builder: (context, snapshot) {
                  if (snapshot.connectionState == ConnectionState.waiting) {
                    return const CircularProgressIndicator();
                  }

                  if (snapshot.hasError) {
                    return Text(
                      snapshot.error.toString(),
                      style: const TextStyle(color: Colors.red),
                    );
                  }

                  if (snapshot.hasData) {
                    final data = snapshot.data!;

                    return Column(
                      children: [
                        Text(
                          "Title:",
                          style: const TextStyle(fontWeight: FontWeight.bold),
                        ),

                        const SizedBox(height: 10),

                        Text(data["title"], textAlign: TextAlign.center),

                        const SizedBox(height: 20),

                        Text("Completed: ${data["completed"]}"),
                      ],
                    );
                  }

                  return const SizedBox();
                },
              ),

            const SizedBox(height: 30),

            ElevatedButton(onPressed: loadData, child: const Text("Load Data")),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT JUST HAPPENED?
------------------------------------------------

1️⃣ Press button
2️⃣ HTTP GET request sent
3️⃣ Wait for server response
4️⃣ If status 200:
      Decode JSON
5️⃣ Show result in UI

------------------------------------------------
🧠 IMPORTANT CONCEPTS
------------------------------------------------

http.get()
→ returns Future<Response>

jsonDecode()
→ converts JSON string to Map

response.statusCode
→ check if request succeeded

------------------------------------------------
🧠 REAL WORLD FLOW
------------------------------------------------

UI → Call API
API → Returns JSON
Decode → Convert to Map
Display → Show in UI

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Network call = Future
JSON string → jsonDecode → Map
Always check statusCode
*/
