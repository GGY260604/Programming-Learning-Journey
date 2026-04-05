/*
CH06 - 01
Why Scrolling Exists (Overflow Problem)

GOAL:
- See what happens when content is larger than screen
- Understand overflow
- Understand viewport concept
- Understand why scrolling is necessary

IMPORTANT:
Screen height is LIMITED.
Column height can grow infinitely.
This mismatch causes overflow.
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

class OverflowDemoPage extends StatelessWidget {
  const OverflowDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/01 – Overflow Problem')),

      /*
      Column is NOT scrollable.
      It tries to display everything.
      */
      body: Column(
        children: List.generate(
          20,
          (index) => Container(
            height: 80,
            margin: const EdgeInsets.all(8),
            color: Colors.blue,
            alignment: Alignment.center,
            child: Text(
              'Item ${index + 1}',
              style: const TextStyle(color: Colors.white),
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT HAPPENS HERE?
------------------------------------------------

We created:
20 items
Each 80px tall
With margin

Total height > screen height

Column tries to render ALL of them.

But screen has limited height.

Result:
OVERFLOW ERROR (yellow/black stripes)

------------------------------------------------
🧠 WHAT IS VIEWPORT?
------------------------------------------------

Viewport = visible area of screen.

The screen can only display:
A limited vertical region.

Anything beyond that must:
- Be clipped
- Or scroll

------------------------------------------------
🧠 WHY COLUMN FAILS
------------------------------------------------

Column is NOT scrollable.

Column assumes:
"I must show everything."

But when content > viewport,
it cannot.

------------------------------------------------
🧠 THIS CONNECTS TO CONSTRAINTS
------------------------------------------------

Scaffold body gives:
Tight height constraint (screen height).

Column:
- Gets limited height
- But its children exceed it

Overflow occurs.

------------------------------------------------
🎯 KEY REALIZATION
------------------------------------------------

Overflow happens when:
Child size > Parent constraint.

Scrolling exists to solve this.

------------------------------------------------
🚀 NEXT STEP
------------------------------------------------

To fix overflow:
We need a scrollable widget.

That will be:
SingleChildScrollView
ListView
*/
