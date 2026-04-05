/*
CH04 - 02
mainAxisAlignment (Spacing on the MAIN axis)

GOAL:
- Understand what mainAxisAlignment does
- See ALL common values visually
- Build intuition, not memorization

REMINDER:
mainAxis = direction of layout
- Row    -> horizontal
- Column -> vertical
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
      home: MainAxisAlignmentPage(),
    );
  }
}

/*
This page shows MULTIPLE Row examples,
each with a different mainAxisAlignment.
*/
class MainAxisAlignmentPage extends StatelessWidget {
  const MainAxisAlignmentPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH04/02 – mainAxisAlignment')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: const [
          _Title('mainAxisAlignment.start'),
          _DemoRow(MainAxisAlignment.start),

          _Title('mainAxisAlignment.center'),
          _DemoRow(MainAxisAlignment.center),

          _Title('mainAxisAlignment.end'),
          _DemoRow(MainAxisAlignment.end),

          _Title('mainAxisAlignment.spaceBetween'),
          _DemoRow(MainAxisAlignment.spaceBetween),

          _Title('mainAxisAlignment.spaceAround'),
          _DemoRow(MainAxisAlignment.spaceAround),

          _Title('mainAxisAlignment.spaceEvenly'),
          _DemoRow(MainAxisAlignment.spaceEvenly),
        ],
      ),
    );
  }
}

/*
------------------------------------
Reusable demo row
------------------------------------

This widget draws:
- a white "stage"
- three colored boxes
- applies mainAxisAlignment passed in
*/
class _DemoRow extends StatelessWidget {
  final MainAxisAlignment alignment;

  const _DemoRow(this.alignment);

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 80,
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,

      /*
      Row MAIN AXIS = horizontal
      mainAxisAlignment controls spacing HORIZONTALLY
      */
      child: Row(
        mainAxisAlignment: alignment, // APPLY passed-in alignment here
        children: const [
          _Box(color: Colors.red),
          _Box(color: Colors.green),
          _Box(color: Colors.blue),
        ],
      ),
    );
  }
}

/*
Small colored box used in demos
*/
class _Box extends StatelessWidget {
  final Color color;

  const _Box({required this.color});

  @override
  Widget build(BuildContext context) {
    return Container(width: 40, height: 40, color: color);
  }
}

/*
Simple section title
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
🧠 HOW TO READ mainAxisAlignment
------------------------------------

Read this:
mainAxisAlignment: spaceBetween

As:
"Distribute free space BETWEEN children
along the MAIN axis"

------------------------------------
🧠 VISUAL RULES (VERY IMPORTANT)
------------------------------------

1) start
   - All children packed at the START

2) center
   - All children packed at the CENTER

3) end
   - All children packed at the END

4) spaceBetween
   - No space at edges
   - Space ONLY between children

5) spaceAround
   - Space around each child
   - Edge space is HALF of middle space

6) spaceEvenly
   - Equal space EVERYWHERE
   - Edges == middle

------------------------------------
🧠 CORE MENTAL MODEL
------------------------------------

mainAxisAlignment controls:
"How extra space is distributed along the main axis"

It does NOT:
❌ change child size
❌ affect cross axis
*/
