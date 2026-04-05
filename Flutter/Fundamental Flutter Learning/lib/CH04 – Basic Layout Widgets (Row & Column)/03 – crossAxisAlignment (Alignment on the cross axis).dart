/*
CH04 - 03
crossAxisAlignment (Alignment on the CROSS axis)

GOAL:
- Understand what crossAxisAlignment does
- VISUALLY see each value
- Stop confusing main axis with cross axis

REMINDER:
Row:
- main axis  = horizontal
- cross axis = vertical

Column:
- main axis  = vertical
- cross axis = horizontal
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
      home: CrossAxisAlignmentPage(),
    );
  }
}

/*
This page demonstrates crossAxisAlignment
using ROW (so cross axis = vertical).
*/
class CrossAxisAlignmentPage extends StatelessWidget {
  const CrossAxisAlignmentPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH04/03 – crossAxisAlignment')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: const [
          _Title('crossAxisAlignment.start'),
          _DemoRow(CrossAxisAlignment.start),

          _Title('crossAxisAlignment.center'),
          _DemoRow(CrossAxisAlignment.center),

          _Title('crossAxisAlignment.end'),
          _DemoRow(CrossAxisAlignment.end),

          _Title('crossAxisAlignment.stretch'),
          _DemoRow(CrossAxisAlignment.stretch),
        ],
      ),
    );
  }
}

/*
------------------------------------
Reusable demo row
------------------------------------

We use different HEIGHT boxes
to make vertical alignment obvious.
*/
class _DemoRow extends StatelessWidget {
  final CrossAxisAlignment alignment;

  const _DemoRow(this.alignment);

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 120, // If this height used, stretch will NOT work, as it is parent-imposed
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,

      /*
      Row CROSS AXIS = vertical
      crossAxisAlignment controls
      VERTICAL alignment of children
      */
      child: Row(
        crossAxisAlignment: alignment,
        children: const [
          _Box(color: Colors.red, height: 40),
          SizedBox(width: 10),
          _Box(color: Colors.green, height: 60),
          SizedBox(width: 10),
          _Box(color: Colors.blue, height: 80),
        ],
      ),
    );
  }
}

/*
Colored box with variable height
*/
class _Box extends StatelessWidget {
  final Color color;
  final double height;

  const _Box({required this.color, required this.height});

  @override
  Widget build(BuildContext context) {
    return Container(width: 40, height: height, color: color);
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
🧠 HOW TO READ crossAxisAlignment
------------------------------------

Read this:
crossAxisAlignment: start

As:
"Align children to the START
of the CROSS axis"

------------------------------------
🧠 VISUAL RULES (VERY IMPORTANT)
------------------------------------

1) start
   - Children aligned to TOP (in Row)

2) center
   - Children aligned to MIDDLE vertically

3) end
   - Children aligned to BOTTOM

4) stretch
   - Children stretch to fill
     the CROSS axis

------------------------------------
⚠️ IMPORTANT STRETCH RULE
------------------------------------

crossAxisAlignment.stretch:
- Forces children to EXPAND
- Children MUST NOT have fixed height
  (otherwise stretch is ignored)

If children have fixed height,
stretch will NOT work as expected.

------------------------------------
🧠 CORE MENTAL MODEL (CRITICAL)
------------------------------------

mainAxisAlignment
→ distributes SPACE along the line

crossAxisAlignment
→ aligns CHILDREN across the line

------------------------------------
COMMON CONFUSION (NOW RESOLVED)
------------------------------------

❌ "center means center everything"
✅ center depends on WHICH axis

Always ask:
- Is this main axis or cross axis?
*/
