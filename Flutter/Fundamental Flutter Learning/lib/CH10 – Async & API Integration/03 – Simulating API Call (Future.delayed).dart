/*
CH10 - 03
Simulating API Call (Future.delayed)

GOAL:
- Simulate real API behavior
- Show loading state
- Show success state
- Show error state

IMPORTANT:
Async UI usually has 3 states:
Loading / Success / Error
*/

import 'package:flutter/material.dart';
import 'dart:math';

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
      home: FakeApiPage(),
    );
  }
}

class FakeApiPage extends StatefulWidget {
  const FakeApiPage({super.key});

  @override
  State<FakeApiPage> createState() => _FakeApiPageState();
}

class _FakeApiPageState extends State<FakeApiPage> {
  bool isLoading = false;
  String? data;
  String? error;

  /*
  Fake API that randomly succeeds or fails.
  */
  Future<String> fakeApiCall() async {
    await Future.delayed(const Duration(seconds: 3));

    /*
    Random success or error.
    */
    if (Random().nextBool()) {
      return "🎉 Data loaded from server!";
    } else {
      throw Exception("Server error occurred!");
    }
  }

  Future<void> loadData() async {
    setState(() {
      isLoading = true;
      data = null;
      error = null;
    });

    try {
      final result = await fakeApiCall();

      setState(() {
        data = result;
      });
    } catch (e) {
      setState(() {
        error = e.toString();
      });
    } finally {
      setState(() {
        isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    Widget content;

    /*
    Decide UI based on state.
    */
    if (isLoading) {
      content = const CircularProgressIndicator();
    } else if (error != null) {
      content = Text(
        error!,
        style: const TextStyle(color: Colors.red),
        textAlign: TextAlign.center,
      );
    } else if (data != null) {
      content = Text(
        data!,
        style: const TextStyle(fontSize: 18),
        textAlign: TextAlign.center,
      );
    } else {
      content = const Text("Press button to load data");
    }

    return Scaffold(
      appBar: AppBar(title: const Text('CH10/03 – Simulated API')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            content,

            const SizedBox(height: 30),

            ElevatedButton(
              onPressed: isLoading ? null : loadData, // disable if loading
              child: const Text("Load Data"),
            ),
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

Press button:
1️⃣ isLoading = true
2️⃣ Show CircularProgressIndicator
3️⃣ Wait 3 seconds
4️⃣ Randomly:
    - Success → show data
    - Error → show error message
5️⃣ isLoading = false

------------------------------------------------
🧠 IMPORTANT PATTERN
------------------------------------------------

Async UI = 3 states:

bool isLoading
String? data
String? error

Never mix them incorrectly.

------------------------------------------------
🧠 try / catch / finally
------------------------------------------------

try:
  await async task

catch:
  handle error

finally:
  always runs

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Async flow:

Start → Loading
Then → Success OR Error
Then → Stop Loading
*/
