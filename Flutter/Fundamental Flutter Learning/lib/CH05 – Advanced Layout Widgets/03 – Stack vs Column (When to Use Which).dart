/*
CH05 - 03
Stack vs Column (When to Use Which)

GOAL:
- Understand the difference in layout behavior
- Learn WHEN to use each
- Build layout decision intuition

IMPORTANT:
Stack and Column solve DIFFERENT problems.
They are NOT interchangeable.
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
      home: StackVsColumnPage(),
    );
  }
}

/*
This page shows TWO sections:
1️⃣ Column layout example
2️⃣ Stack layout example
*/
class StackVsColumnPage extends StatelessWidget {
  const StackVsColumnPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/03 – Stack vs Column')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: [
          const Text(
            '1️⃣ COLUMN (Flow Layout)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          /*
          COLUMN EXAMPLE
          */
          Container(
            height: 200,
            color: Colors.white,
            padding: const EdgeInsets.all(8),

            /*
            Column arranges children in a VERTICAL LINE.
            No overlapping.
            */
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: const [
                _Box(color: Colors.blue, label: 'Header'),
                SizedBox(height: 8),
                _Box(color: Colors.green, label: 'Content'),
                SizedBox(height: 8),
                _Box(color: Colors.orange, label: 'Footer'),
              ],
            ),
          ),

          const SizedBox(height: 30),

          const Text(
            '2️⃣ STACK (Layered Layout)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          /*
          STACK EXAMPLE
          */
          Container(
            height: 200,
            color: Colors.white,

            /*
            Stack allows overlapping layers.
            */
            child: Stack(
              children: [
                /*
                Background layer
                */
                Container(color: Colors.blue), // Grows to fill Stack
                /*
                Positioned content layer
                */
                Positioned(
                  bottom: 20,
                  left: 20,
                  child: Container(
                    padding: const EdgeInsets.all(12),
                    color: Colors.black.withValues(alpha: 0.6),
                    child: const Text(
                      'Overlay Text',
                      style: TextStyle(color: Colors.white),
                    ),
                  ),
                ),
              ],
            ),
          ),

          const SizedBox(height: 20),

          const Text(
            'Observe:\n'
            '- Column → header, content, footer in order\n'
            '- Stack → background + overlay text\n',
          ),
        ],
      ),
    );
  }
}

/*
Reusable labeled box
*/
class _Box extends StatelessWidget {
  final Color color;
  final String label;

  const _Box({required this.color, required this.label});

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 40,
      width: double.infinity,
      color: color,
      alignment: Alignment.center,
      child: Text(label, style: const TextStyle(color: Colors.white)),
    );
  }
}

/*
------------------------------------
🧠 DECISION RULES (CRITICAL)
------------------------------------

Use Column when:
- Widgets should be in a vertical flow
- No overlapping is needed
- Order matters top → bottom

Use Stack when:
- Widgets must overlap
- You need layers
- You need overlays (badges, labels, floating text)

------------------------------------
🧠 THINK LIKE THIS
------------------------------------

Column:
"I want items in a list/flow."

Stack:
"I want layers on top of each other."

------------------------------------
❌ COMMON MISTAKES
------------------------------------

❌ Using Stack to simulate Column spacing
❌ Using Column to fake overlays
❌ Forgetting that Stack ignores normal flow

------------------------------------
MENTAL MODEL
------------------------------------

Column = document layout
Stack  = Photoshop layers
*/
