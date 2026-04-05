/*
CH10 - 08
What is Stream and When to Use It

GOAL:
- Understand what a Stream is
- Know difference between Future and Stream
- See how multiple async events work

CORE IDEA:

Future:
- Returns ONE value
- Completes once

Stream:
- Emits MULTIPLE values over time
- Can keep emitting until closed

Mental Model:

Future  = one-time delivery
Stream  = continuous delivery

This file demonstrates a simple Stream
that emits numbers every second.
*/

import 'dart:async';
import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: StreamConceptPage(),
    ),
  );
}

class StreamConceptPage extends StatefulWidget {
  const StreamConceptPage({super.key});

  @override
  State<StreamConceptPage> createState() => _StreamConceptPageState();
}

class _StreamConceptPageState extends State<StreamConceptPage> {
  late final Stream<int> numberStream;

  @override
  void initState() {
    super.initState();

    /*
    Create a stream that emits 0,1,2,3,... every second.
    */
    numberStream = Stream.periodic(
      const Duration(seconds: 1),
      (count) => count,
    ).take(20); // limit to 10 emissions
  }

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 StreamConceptPage rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH10/08 – Stream Concept")),
      body: Center(
        child: StreamBuilder<int>(
          stream: numberStream,
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return const CircularProgressIndicator();
            }

            if (snapshot.hasError) {
              return const Text("Error occurred");
            }

            if (!snapshot.hasData) {
              return const Text("No data yet");
            }

            return Text(
              "Stream value: ${snapshot.data}",
              style: const TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
            );
          },
        ),
      ),
    );
  }
}

/*
Observe behavior:

- UI updates every second.
- No setState used.
- StreamBuilder listens automatically.

ConnectionState values:
- waiting
- active
- done

Next:
CH10-09 – StreamBuilder Deep Dive and Lifecycle.
*/
