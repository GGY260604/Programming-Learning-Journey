/*
CH05 - 04
Wrap (Automatic Line Breaking)

GOAL:
- Understand WHY Wrap exists
- See how Wrap prevents overflow
- Learn spacing and runSpacing

IMPORTANT IDEA:
Row = single line only
Wrap = multiple lines automatically
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
      home: WrapBasicsPage(),
    );
  }
}

class WrapBasicsPage extends StatelessWidget {
  const WrapBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/04 – Wrap')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: [
          const Text(
            '1️⃣ ROW (Single Line – May Overflow)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          /*
          ROW EXAMPLE
          */
          Container(
            color: Colors.white,
            padding: const EdgeInsets.all(8),

            /*
            Row will try to fit everything in ONE line.
            If items exceed width → overflow.
            */
            child: Row(
              children: const [
                _Chip(label: 'Flutter'),
                _Chip(label: 'Dart'),
                _Chip(label: 'Layout'),
                _Chip(label: 'Widgets'),
                _Chip(label: 'Stack'),
                _Chip(label: 'Wrap'),
              ],
            ),
          ),

          const SizedBox(height: 30),

          const Text(
            '2️⃣ WRAP (Automatic Line Break)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          /*
          WRAP EXAMPLE
          */
          Container(
            color: Colors.white,
            padding: const EdgeInsets.all(8),

            /*
            Wrap automatically moves items
            to next line when space runs out.
            */
            child: Wrap(
              /*
              spacing:
              Horizontal space between items
              */
              spacing: 8,

              /*
              runSpacing:
              Vertical space between lines
              */
              runSpacing: 8,

              children: const [
                _Chip(label: 'Flutter'),
                _Chip(label: 'Dart'),
                _Chip(label: 'Layout'),
                _Chip(label: 'Widgets'),
                _Chip(label: 'Stack'),
                _Chip(label: 'Wrap'),
              ],
            ),
          ),

          const SizedBox(height: 20),

          const Text(
            'Observe:\n'
            '- Row tries to stay on one line\n'
            '- Wrap automatically creates new lines\n',
          ),
        ],
      ),
    );
  }
}

/*
Reusable chip-like box
*/
class _Chip extends StatelessWidget {
  final String label;

  const _Chip({required this.label});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
      decoration: BoxDecoration(
        color: Colors.blue,
        borderRadius: BorderRadius.circular(20),
      ),
      child: Text(label, style: const TextStyle(color: Colors.white)),
    );
  }
}

/*
------------------------------------
🧠 WHY WRAP EXISTS (CRITICAL)
------------------------------------

Row limitations:
- Single horizontal line
- No automatic line break
- Causes overflow easily

Wrap solves:
- Dynamic width layouts
- Tag lists
- Chip groups
- Responsive button groups

------------------------------------
🧠 WRAP RULES
------------------------------------

spacing:
- Horizontal gap between items

runSpacing:
- Vertical gap between rows

Wrap behaves like:
"Responsive Row"

------------------------------------
❌ COMMON BEGINNER MISTAKES
------------------------------------

❌ Using Row for dynamic content
❌ Trying to manually calculate width
❌ Adding Expanded randomly

------------------------------------
✅ WHEN TO USE WRAP
------------------------------------

Use Wrap when:
- Items may exceed screen width
- You want automatic wrapping
- Content size is unpredictable

------------------------------------
MENTAL MODEL
------------------------------------

Row  = single-line layout
Wrap = multi-line flowing layout
*/
