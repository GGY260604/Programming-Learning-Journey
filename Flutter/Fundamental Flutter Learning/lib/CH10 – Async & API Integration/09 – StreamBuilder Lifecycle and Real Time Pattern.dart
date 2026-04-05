/*
CH10 - 09
StreamBuilder Lifecycle and Real-Time Pattern

GOAL:
- Understand StreamBuilder lifecycle clearly
- See connectionState transitions
- Learn proper real-time usage pattern
- Know when StreamBuilder is appropriate

CORE IDEA:

StreamBuilder listens to a Stream.

Lifecycle states:
- none      → no stream attached
- waiting   → waiting for first event
- active    → receiving data
- done      → stream closed

StreamBuilder automatically:
- subscribes when inserted
- cancels subscription when disposed

Mental Model:

FutureBuilder:
  One async result.

StreamBuilder:
  Continuous async updates.
*/

import 'dart:async';
import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: StreamLifecyclePage(),
    ),
  );
}

class StreamLifecyclePage extends StatefulWidget {
  const StreamLifecyclePage({super.key});

  @override
  State<StreamLifecyclePage> createState() => _StreamLifecyclePageState();
}

class _StreamLifecyclePageState extends State<StreamLifecyclePage> {
  final StreamController<int> controller = StreamController<int>();

  int counter = 0;

  void _addValue() {
    counter++;
    controller.add(counter);
    debugPrint("Added value to stream: $counter");
  }

  void _closeStream() {
    controller.close();
    debugPrint("Stream closed");
  }

  @override
  void dispose() {
    controller.close();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 StreamLifecyclePage rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH10/09 – StreamBuilder Lifecycle")),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            StreamBuilder<int>(
              stream: controller.stream,
              builder: (context, snapshot) {
                debugPrint("ConnectionState: ${snapshot.connectionState}");

                switch (snapshot.connectionState) {
                  case ConnectionState.none:
                    return const Text("No Stream Attached");

                  case ConnectionState.waiting:
                    return const Text("Waiting for data...");

                  case ConnectionState.active:
                    return Text(
                      "Active Value: ${snapshot.data}",
                      style: const TextStyle(
                        fontSize: 26,
                        fontWeight: FontWeight.bold,
                      ),
                    );

                  case ConnectionState.done:
                    return const Text("Stream Completed");
                }
              },
            ),
            const SizedBox(height: 30),

            ElevatedButton(
              onPressed: _addValue,
              child: const Text("Add Value"),
            ),

            const SizedBox(height: 10),

            ElevatedButton(
              onPressed: _closeStream,
              child: const Text("Close Stream"),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Observe carefully:

1) Initially → waiting
2) Press Add Value → active
3) Press Close Stream → done

Important Rules:

- StreamBuilder rebuilds on every new event.
- It manages subscription automatically.
- Always close StreamController in dispose().

When to use StreamBuilder:

✔ WebSocket
✔ Real-time chat
✔ Firebase snapshots
✔ Countdown timer
✔ Continuous sensor data

When NOT needed:

❌ One-time API call (use FutureBuilder)
❌ Static data
❌ Simple state (use setState or Provider)

You now understand:
Future
Stream
FutureBuilder
StreamBuilder

Async foundation complete.
*/
