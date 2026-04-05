/*
CH08 - 06
Navigation Common Mistakes

GOAL:
- Avoid common navigation bugs
- Understand correct usage patterns
- Strengthen navigation thinking

IMPORTANT:
Navigation depends on correct context and lifecycle.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
================================================
APP ROOT
================================================
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: FirstPage(),
    );
  }
}

/*
================================================
PAGE 1
================================================
*/
class FirstPage extends StatelessWidget {
  const FirstPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/06 – Navigation Mistakes')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Correct way:
            Call push inside event handler.
            */
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => const SecondPage()),
            );
          },
          child: const Text('Open Page 2'),
        ),
      ),
    );
  }
}

/*
================================================
PAGE 2
================================================
*/
class SecondPage extends StatelessWidget {
  const SecondPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Page 2')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Safe pop:
            Check if canPop before popping.
            */
            if (Navigator.canPop(context)) {
              Navigator.pop(context);
            }
          },
          child: const Text('Back Safely'),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 COMMON NAVIGATION MISTAKES
------------------------------------------------

❌ 1️⃣ Calling Navigator.push inside build()

WRONG:

@override
Widget build(BuildContext context) {
  Navigator.push(...); // DO NOT DO THIS
  return ...
}

Why?
build() can run multiple times.
You may push page repeatedly.

Correct:
Call navigation inside:
- onPressed
- onTap
- lifecycle method (carefully)

------------------------------------------------
❌ 2️⃣ Using wrong context

If you use a context
that does not have Navigator above it,
navigation fails.

Example:
Using context from a dialog builder incorrectly.

Rule:
Use context from a widget
that is inside MaterialApp.

------------------------------------------------
❌ 3️⃣ Forgetting await when expecting result

If you want returned data:

final result = Navigator.push(...);

This is wrong.
push returns Future.

Correct:

final result = await Navigator.push(...);

------------------------------------------------
❌ 4️⃣ Popping when no route exists

If this is first page:

Navigator.pop(context);

May close app or cause issue.

Better:

if (Navigator.canPop(context)) {
  Navigator.pop(context);
}

------------------------------------------------
❌ 5️⃣ Pushing same page repeatedly

Pressing button multiple times
quickly can push same page many times.

In real apps:
Use flags or navigation guards.

------------------------------------------------
🎯 FINAL NAVIGATION RULES
------------------------------------------------

Rule 1:
Navigate inside event handlers.

Rule 2:
Understand push = Future.

Rule 3:
Check canPop if unsure.

Rule 4:
Navigation is stack-based.
*/
