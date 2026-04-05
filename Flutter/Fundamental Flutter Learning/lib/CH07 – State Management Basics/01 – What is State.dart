/*
CH07 - 01
What is State?

GOAL:
- Understand what "state" means
- Understand static vs dynamic UI
- Prepare for setState
- Connect to widget immutability

IMPORTANT:
State is data that can change over time.
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
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: StaticVsDynamicPage(),
    );
  }
}

class StaticVsDynamicPage extends StatelessWidget {
  const StaticVsDynamicPage({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    This value never changes.
    So this UI is STATIC.
    */
    const int counter = 0;

    return Scaffold(
      appBar: AppBar(title: const Text('CH07/01 – What is State?')),
      body: Center(
        child: Text('Counter: $counter', style: const TextStyle(fontSize: 24)),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS STATE?
------------------------------------------------

State = data that can change over time.

Examples:
- Counter value
- User input
- API response
- Selected tab
- Checkbox value

------------------------------------------------
🧠 STATIC UI
------------------------------------------------

If value never changes:
UI never updates.

Example:
const int counter = 0;

This page is completely static.

------------------------------------------------
🧠 DYNAMIC UI
------------------------------------------------

If value changes:
UI must update.

But remember:

Widgets are IMMUTABLE.

You cannot change a widget.
You must rebuild it with new data.

------------------------------------------------
🧠 WHY STATE MATTERS
------------------------------------------------

Real apps are dynamic:
- Chat apps
- Shopping carts
- Login forms
- Timers
- Notifications

Without state:
App is just a poster.

------------------------------------------------
🧠 IMPORTANT CONNECTION
------------------------------------------------

Widgets are immutable.

So how does UI update?

Flutter:
- Rebuilds widgets
- With new state values

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

State = changeable data
UI = reflection of state

When state changes,
UI must rebuild.
*/
