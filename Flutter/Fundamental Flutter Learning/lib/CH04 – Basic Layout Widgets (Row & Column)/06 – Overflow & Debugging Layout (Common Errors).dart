/*
CH04 - 06
Overflow & Debugging Layout (Common Errors)

GOAL:
- Understand WHY overflow happens
- Learn how to FIX overflow correctly
- Build a calm debugging mindset

IMPORTANT:
Overflow is NOT a bug.
Overflow is Flutter WARNING you about impossible layout.
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
      home: OverflowDemoPage(),
    );
  }
}

/*
This page intentionally shows
BAD and GOOD layout examples.
*/
class OverflowDemoPage extends StatelessWidget {
  const OverflowDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH04/06 – Overflow & Debugging')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: const [
          Text(
            "Try to minimize horizontal space to see overflow warnings.",
            style: TextStyle(fontStyle: FontStyle.italic),
          ),

          SizedBox(height: 16),

          _Title('1️⃣ OVERFLOW EXAMPLE (Row with fixed width children)'),
          _BadRow(),

          _Title('2️⃣ FIX #1 – Expanded'),
          _GoodRowExpanded(),

          _Title('3️⃣ FIX #2 – Flexible'),
          _GoodRowFlexible(),

          _Title('4️⃣ FIX #3 – Scrollable (ListView / SingleChildScrollView)'),
          _ScrollableExample(),
        ],
      ),
    );
  }
}

/*
------------------------------------
1️⃣ BAD EXAMPLE
------------------------------------

This Row WILL overflow on small screens.
*/
class _BadRow extends StatelessWidget {
  const _BadRow();

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 80,
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,

      /*
      PROBLEM:
      - Children have fixed width
      - Row has limited horizontal space
      - No child is flexible
      */
      child: Row(
        children: const [
          _WideBox(color: Colors.red),
          _WideBox(color: Colors.green),
          _WideBox(color: Colors.blue),
        ],
      ),
    );
  }
}

/*
------------------------------------
2️⃣ FIX #1 – Expanded
------------------------------------

Expanded forces a child to adapt to space.
*/
class _GoodRowExpanded extends StatelessWidget {
  const _GoodRowExpanded();

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 80,
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,

      child: Row(
        children: const [
          Expanded(child: _WideBox(color: Colors.red)),
          Expanded(child: _WideBox(color: Colors.green)),
          Expanded(child: _WideBox(color: Colors.blue)),
        ],
      ),
    );
  }
}

/*
------------------------------------
3️⃣ FIX #2 – Flexible
------------------------------------

Flexible allows shrinking if needed.
*/
class _GoodRowFlexible extends StatelessWidget {
  const _GoodRowFlexible();

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 80,
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,

      child: Row(
        children: const [
          Flexible(child: _WideBox(color: Colors.red)),
          Flexible(child: _WideBox(color: Colors.green)),
          Flexible(child: _WideBox(color: Colors.blue)),
        ],
      ),
    );
  }
}

/*
------------------------------------
4️⃣ FIX #3 – SCROLLING
------------------------------------

If content is truly too large,
make it scrollable.
*/
class _ScrollableExample extends StatelessWidget {
  const _ScrollableExample();

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 100,
      color: Colors.white,

      /*
      ListView allows horizontal scrolling
      */
      child: ListView(
        scrollDirection: Axis.horizontal,
        children: const [
          _WideBox(color: Colors.red),
          _WideBox(color: Colors.green),
          _WideBox(color: Colors.blue),
          _WideBox(color: Colors.orange),
        ],
      ),
    );
  }
}

/*
Wide box intentionally large
*/
class _WideBox extends StatelessWidget {
  final Color color;

  const _WideBox({required this.color});

  @override
  Widget build(BuildContext context) {
    return Container(
      width: 250,
      height: 50,
      margin: const EdgeInsets.only(right: 8),
      color: color,
    );
  }
}

/*
Simple title widget
*/
class _Title extends StatelessWidget {
  final String text;

  const _Title(this.text);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 8),
      child: Text(text, style: const TextStyle(fontWeight: FontWeight.bold)),
    );
  }
}

/*
------------------------------------
🧠 WHY OVERFLOW HAPPENS (CRITICAL)
------------------------------------

Overflow happens when:
- Parent gives LIMITED space
- Children demand MORE space
- Flutter refuses to clip silently

Flutter chooses:
"Show warning instead of hiding bugs"

------------------------------------
🧠 HOW TO DEBUG OVERFLOW (STEP-BY-STEP)
------------------------------------

1) Ask:
   - Is this Row or Column?

2) Ask:
   - Are children fixed-size?

3) Ask:
   - Is there extra space or not enough space?

4) Choose FIX:
   - Expanded / Flexible → adapt size
   - ScrollView → allow scrolling
   - Wrap → allow wrapping (later chapter)

------------------------------------
❌ WRONG APPROACH
------------------------------------

❌ Randomly add Expanded everywhere
❌ Shrink font size blindly
❌ Ignore overflow warnings

------------------------------------
✅ RIGHT APPROACH
------------------------------------

✅ Understand parent constraints
✅ Decide who should flex
✅ Decide if scrolling is correct

------------------------------------
🧠 FINAL MENTAL MODEL (REMEMBER THIS)
------------------------------------

Flutter layout = negotiation

Parent says:
"This is how much space you get"

Child says:
"This is how much I want"

Overflow = disagreement

Your job:
Resolve the disagreement logically.
*/
