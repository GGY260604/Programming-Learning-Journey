/*
CH10 - 05
Handling Errors Properly

GOAL:
- Catch errors properly
- Show user-friendly messages
- Add retry mechanism
- Improve async UX

IMPORTANT:
Never show raw technical errors to users.
*/

import 'package:flutter/material.dart';
import 'dart:math';

void main() {
  runApp(const MyApp());
}

/*
Custom exception types
*/
class NetworkException implements Exception {} // represents no internet

class ServerException implements Exception {} // represents server error

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ErrorHandlingPage(),
    );
  }
}

class ErrorHandlingPage extends StatefulWidget {
  const ErrorHandlingPage({super.key});

  @override
  State<ErrorHandlingPage> createState() => _ErrorHandlingPageState();
}

class _ErrorHandlingPageState extends State<ErrorHandlingPage> {
  Future<String>? _future;

  /*
  Fake API that throws specific errors.
  */
  Future<String> fakeApiCall() async {
    await Future.delayed(const Duration(seconds: 3));

    final random = Random().nextInt(3);

    if (random == 0) {
      throw NetworkException();
    } else if (random == 1) {
      throw ServerException();
    }

    return "✅ Data loaded successfully!";
  }

  void loadData() {
    setState(() {
      _future = fakeApiCall();
    });
  }

  /*
  Convert exception into user-friendly message.
  */
  String mapErrorToMessage(Object error) {
    if (error is NetworkException) {
      return "📡 Network error.\nPlease check your connection.";
    }

    if (error is ServerException) {
      return "🛠 Server error.\nPlease try again later.";
    }

    return "⚠️ Unexpected error occurred.";
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/05 – Error Handling')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            if (_future == null)
              const Text("Press button to load data")
            else
              FutureBuilder<String>(
                future: _future,
                builder: (context, snapshot) {
                  if (snapshot.connectionState == ConnectionState.waiting) {
                    return const CircularProgressIndicator();
                  }

                  if (snapshot.hasError) {
                    final message = mapErrorToMessage(snapshot.error!);

                    return Column(
                      children: [
                        Text(
                          message,
                          textAlign: TextAlign.center,
                          style: const TextStyle(color: Colors.red),
                        ),

                        const SizedBox(height: 20),

                        ElevatedButton(
                          onPressed: loadData,
                          child: const Text("Retry"),
                        ),
                      ],
                    );
                  }

                  if (snapshot.hasData) {
                    return Text(
                      snapshot.data!,
                      style: const TextStyle(fontSize: 18),
                      textAlign: TextAlign.center,
                    );
                  }

                  return const SizedBox(); // should never reach here
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
🧠 WHAT IMPROVED?
------------------------------------------------

1️⃣ Custom exception types
2️⃣ Error mapping to friendly messages
3️⃣ Retry button
4️⃣ Clean separation of concerns

------------------------------------------------
🧠 WHY MAP ERRORS?
------------------------------------------------

Technical error:
Exception: NetworkException

User-friendly:
"Please check your internet connection."

------------------------------------------------
🧠 REAL APP PATTERN
------------------------------------------------

API layer:
- Throws specific exceptions

UI layer:
- Maps to friendly messages

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Never expose raw exception.
Always map error → friendly message.
*/
