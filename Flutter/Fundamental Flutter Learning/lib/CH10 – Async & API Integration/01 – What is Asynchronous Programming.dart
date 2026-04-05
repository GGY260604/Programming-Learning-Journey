/*
CH10 - 01
What is Asynchronous Programming

GOAL:
- Understand sync vs async
- Understand UI blocking
- Build mental model before Future

IMPORTANT:
Long tasks must not block UI.
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
      home: AsyncConceptPage(),
    );
  }
}

class AsyncConceptPage extends StatelessWidget {
  const AsyncConceptPage({super.key});

  /*
  Simulate long task (bad version).
  */
  void blockingTask() {
    /*
    Simulate heavy computation
    by blocking thread for 3 seconds.
    */
    final end = DateTime.now().add(const Duration(seconds: 3));

    while (DateTime.now().isBefore(end)) {
      // Busy wait (VERY BAD)
    }

    debugPrint("Blocking task finished");
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/01 – Async Concept')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Press this and UI will freeze.
            */
            blockingTask();
          },
          child: const Text('Run Blocking Task (Freeze UI)'),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT JUST HAPPENED?
------------------------------------------------

When you press button:
- while loop runs for 3 seconds
- UI becomes unresponsive
- App appears frozen

------------------------------------------------
🧠 WHY?
------------------------------------------------

Flutter runs UI on single thread.
If that thread is busy,
UI cannot update.

------------------------------------------------
🧠 WHAT ASYNC SOLVES
------------------------------------------------

Instead of blocking:
- Start task
- Let UI continue
- Receive result later

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

UI thread must stay free.
Long task must be async.
*/
