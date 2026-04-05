/*
CH07 - 03
Rebuild & build() Lifecycle

GOAL:
- Understand when build() runs
- See rebuild in action
- Remove fear of rebuild
- Connect to widget immutability

IMPORTANT:
Rebuilding widgets is NORMAL in Flutter.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App wrapper
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("MyApp build() called");

    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: RebuildDemoPage(),
    );
  }
}

/*
Stateful widget to demonstrate rebuild.
*/
class RebuildDemoPage extends StatefulWidget {
  const RebuildDemoPage({super.key});

  @override
  State<RebuildDemoPage> createState() => _RebuildDemoPageState();
}

class _RebuildDemoPageState extends State<RebuildDemoPage> {
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    debugPrint("RebuildDemoPage build() called");

    return Scaffold(
      appBar: AppBar(title: const Text('CH07/03 – Rebuild Lifecycle')),
      body: Center(
        child: Text('Counter: $counter', style: const TextStyle(fontSize: 24)),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          setState(() {
            counter++;
          });
        },
        child: const Icon(Icons.add),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHEN DOES build() RUN?
------------------------------------------------

build() runs:

1️⃣ First time widget appears
2️⃣ When setState() is called
3️⃣ When parent rebuilds
4️⃣ When inherited data changes (advanced topic)

------------------------------------------------
🧠 WHAT HAPPENS WHEN YOU PRESS BUTTON?
------------------------------------------------

1️⃣ counter changes
2️⃣ setState() called
3️⃣ Flutter marks widget dirty
4️⃣ Flutter calls build() again
5️⃣ New widget tree is created

------------------------------------------------
🧠 IMPORTANT REALIZATION
------------------------------------------------

Flutter does NOT:
- Recreate entire app
- Redraw everything blindly

Flutter:
- Compares old and new widgets
- Updates only what changed

This process is optimized.

------------------------------------------------
🧠 WHY REBUILD IS CHEAP
------------------------------------------------

Widgets are:
- Immutable
- Lightweight configuration objects

Creating new widgets is cheap.

Heavy work happens in:
- RenderObject layer (optimized)

------------------------------------------------
🧠 COMMON BEGINNER FEAR
------------------------------------------------

❌ "Rebuilding is expensive"
❌ "Avoid rebuild at all cost"

Correct thinking:

Rebuild is normal.
Premature optimization is bad.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

setState
→ build() runs
→ new widget tree created
→ Flutter diffs and updates efficiently

Rebuild is not destruction.
Rebuild is configuration refresh.
*/
