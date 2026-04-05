/*
CH10 - 02
Future & async / await

GOAL:
- Understand Future
- Learn async keyword
- Learn await keyword
- See non-blocking behavior

IMPORTANT:
Future = value that comes later
await = wait without blocking UI
*/

import 'package:flutter/material.dart';

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
      home: FutureDemoPage(),
    );
  }
}

class FutureDemoPage extends StatefulWidget {
  const FutureDemoPage({super.key});

  @override
  State<FutureDemoPage> createState() => _FutureDemoPageState();
}

class _FutureDemoPageState extends State<FutureDemoPage> {
  String message = 'Press button to start async task';

  /*
  This function returns Future<String>.
  That means:
  It will provide a String later.
  */
  Future<String> fakeApiCall() async {
    /*
    Simulate network delay.
    */
    await Future.delayed(const Duration(seconds: 3));

    return "Data loaded successfully!";
  }

  Future<void> startTask() async {
    setState(() {
      message = 'Loading...';
    });

    /*
    await means:
    Wait for result without blocking UI.
    */
    final result = await fakeApiCall();

    setState(() {
      message = result;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/02 – Future & async')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              message,
              textAlign: TextAlign.center,
              style: const TextStyle(fontSize: 18),
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: startTask,
              child: const Text('Start Async Task'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Future?
------------------------------------------------

Future<String> means:
- It will eventually give a String.
- Not immediately.

------------------------------------------------
🧠 WHAT DOES async DO?
------------------------------------------------

Marks function as asynchronous.
Allows use of await inside.

------------------------------------------------
🧠 WHAT DOES await DO?
------------------------------------------------

Waits for Future to complete.
BUT does NOT block UI thread.

------------------------------------------------
🧠 FLOW OF THIS PROGRAM
------------------------------------------------

1. Press button
2. message = "Loading..."
3. fakeApiCall starts
4. 3 seconds pass
5. Result returned
6. UI updates

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Future = promise of future value
async = function contains async work
await = pause here, but keep UI alive
*/
