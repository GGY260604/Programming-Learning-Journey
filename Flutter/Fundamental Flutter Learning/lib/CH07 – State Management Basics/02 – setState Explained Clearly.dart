/*
CH07 - 02
setState Explained Clearly

GOAL:
- Understand StatefulWidget
- Learn what setState does
- See dynamic UI update
- Connect rebuild process

IMPORTANT:
setState tells Flutter:
"Something changed. Rebuild me."
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App wrapper (still Stateless)
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: CounterPage(),
    );
  }
}

/*
================================================
STATEFUL WIDGET
================================================

Unlike StatelessWidget,
this widget has mutable state.
*/

class CounterPage extends StatefulWidget {
  const CounterPage({super.key});

  @override
  State<CounterPage> createState() => _CounterPageState();
}

/*
This class holds the STATE.
*/
class _CounterPageState extends State<CounterPage> {
  /*
  This is state.
  It can change.
  */
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    /*
    build() is called:
    - First time widget appears
    - Every time setState() is called
    */

    return Scaffold(
      appBar: AppBar(title: const Text('CH07/02 – setState')),

      body: Center(
        child: Text(
          'Counter: $counter',
          style: const TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
        ),
      ),

      floatingActionButton: FloatingActionButton(
        onPressed: () {
          /*
          setState() does TWO things:

          1️⃣ Update state
          2️⃣ Trigger rebuild
          */

          // setState inherited from State class
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
🧠 WHAT IS StatefulWidget?
------------------------------------------------

StatefulWidget:
- Widget that can change over time
- Has associated State class

Structure:

StatefulWidget
  ↓
State class
  ↓
build()

------------------------------------------------
🧠 WHAT setState DOES
------------------------------------------------

setState(() {
  counter++;
});

This does NOT:
- Directly redraw UI

It DOES:
1️⃣ Mark widget as dirty
2️⃣ Tell Flutter to call build() again

Flutter rebuilds widget tree
with new counter value.

------------------------------------------------
🧠 WHY setState TAKES A FUNCTION
------------------------------------------------

setState(() {
  counter++;
});

Flutter wants:
- All state changes to happen inside that function
- So it knows exactly when state changes

------------------------------------------------
🧠 VERY IMPORTANT
------------------------------------------------

If you change counter WITHOUT setState:

counter++;

UI will NOT update.

Because Flutter was not notified.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

State changes
→ setState called
→ build() runs again
→ UI reflects new state
*/
