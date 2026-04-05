/*
CH02 - 03
StatelessWidget (build() is a Snapshot)

GOAL of this file:
- Understand what "stateless" actually means
- Understand build() as a UI SNAPSHOT
- Remove the fear of build() being called many times

VERY IMPORTANT IDEA:
build() does NOT mean "run logic".
build() means "describe the UI right now".
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
1️⃣ WHAT DOES "STATELESS" MEAN?
------------------------------------

StatelessWidget means:
- This widget has NO internal data that changes
- UI does NOT depend on changing values
- Every build() returns the SAME UI

It does NOT mean:
❌ build() runs only once
❌ widget is created only once
*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: StatelessDemoPage(),
    );
  }
}

class StatelessDemoPage extends StatelessWidget {
  const StatelessDemoPage({super.key});

  /*
  ------------------------------------
  2️⃣ build() RETURNS A SNAPSHOT
  ------------------------------------

  Think of build() like this:
  - Flutter asks: "What should the UI look like now?"
  - You answer by returning a widget tree

  build() does NOT:
  ❌ store data
  ❌ remember clicks
  ❌ manage state
  */
  @override
  Widget build(BuildContext context) {
    debugPrint('build() called');

    return Scaffold(
      appBar: AppBar(
        title: const Text('StatelessWidget'),
      ),
      body: const Center(
        child: Text(
          'This UI never changes.\n'
          'Check the console for build() calls.',
          textAlign: TextAlign.center,
        ),
      ),
    );
  }
}

/*
------------------------------------
3️⃣ WHY build() CAN RUN MANY TIMES
------------------------------------

Flutter may call build():
- When app starts
- When screen size changes
- When theme changes
- When parent rebuilds

THIS IS NORMAL.
build() is CHEAP and FAST.

You are NOT supposed to worry about it.
*/

/*
------------------------------------
4️⃣ WHAT SHOULD GO INSIDE build()
------------------------------------

✅ UI description
- Widgets
- Layout
- Styling

❌ Heavy logic
❌ API calls
❌ Database access
❌ Expensive computation

WHY?
Because build() may run MANY times.
*/

/*
------------------------------------
5️⃣ MENTAL MODEL (CRITICAL)
------------------------------------

StatelessWidget =
"Given the same input,
the UI output is always the same."

build() =
"A snapshot of UI at a moment in time."

No memory.
No state.
Just description.
*/

/*
------------------------------------
✅ KEY TAKEAWAYS
------------------------------------

1) StatelessWidget has NO changing data
2) build() may be called many times
3) build() returns UI description
4) StatelessWidget = predictable UI

NEXT:
StatefulWidget exists because UI SOMETIMES 
needs to change, but we will cover that later.
------------------------------------
*/
