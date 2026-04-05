/*
CH05 - 05
Wrap vs Row (Why Wrap Exists)

GOAL:
- Compare Row and Wrap side by side
- Understand when each is appropriate
- Build layout decision intuition

IMPORTANT:
Row and Wrap look similar,
but they behave VERY differently.
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
      home: WrapVsRowPage(),
    );
  }
}

class WrapVsRowPage extends StatelessWidget {
  const WrapVsRowPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/05 – Wrap vs Row')),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: [
          const Text(
            '1️⃣ Row – Strict Single Line Layout',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          Container(
            color: Colors.white,
            padding: const EdgeInsets.all(8),

            /*
            Row tries to keep everything
            in ONE horizontal line.
            */
            child: Row(
              children: const [
                _Tag('UI'),
                _Tag('Layout'),
                _Tag('Widgets'),
                _Tag('Flutter'),
                _Tag('Responsive'),
                _Tag('Overflow'),
              ],
            ),
          ),

          const SizedBox(height: 30),

          const Text(
            '2️⃣ Wrap – Responsive Flow Layout',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          Container(
            color: Colors.white,
            padding: const EdgeInsets.all(8),

            /*
            Wrap automatically creates new lines
            when space runs out.
            */
            child: Wrap(
              spacing: 8,
              runSpacing: 8,
              children: const [
                _Tag('UI'),
                _Tag('Layout'),
                _Tag('Widgets'),
                _Tag('Flutter'),
                _Tag('Responsive'),
                _Tag('Overflow'),
              ],
            ),
          ),

          const SizedBox(height: 20),

          const Text(
            'Observe:\n'
            '- Row may overflow on small screens\n'
            '- Wrap adapts automatically\n',
          ),
        ],
      ),
    );
  }
}

/*
Reusable tag widget
*/
class _Tag extends StatelessWidget {
  final String text;

  const _Tag(this.text);

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(right: 8),
      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
      decoration: BoxDecoration(
        color: Colors.blue,
        borderRadius: BorderRadius.circular(16),
      ),
      child: Text(text, style: const TextStyle(color: Colors.white)),
    );
  }
}

/*
------------------------------------
🧠 CORE DIFFERENCES
------------------------------------

Row:
- Single line only
- Faster (simpler layout)
- Predictable
- Will overflow if content exceeds width

Wrap:
- Multiple lines allowed
- Slightly more layout calculation
- Responsive behavior
- Prevents overflow naturally

------------------------------------
🧠 DECISION RULES
------------------------------------

Use Row when:
- Fixed number of items
- Known width
- You WANT strict alignment

Use Wrap when:
- Dynamic content
- Unknown item count
- Responsive design needed

------------------------------------
⚠️ PERFORMANCE NOTE
------------------------------------

Row:
- Slightly more efficient
- Simpler layout calculation

Wrap:
- More flexible
- Slightly heavier (but fine for normal UI)

Do NOT over-optimize prematurely.

------------------------------------
❌ COMMON MISTAKES
------------------------------------

❌ Using Wrap everywhere
❌ Using Row for unpredictable content
❌ Ignoring overflow warnings

------------------------------------
MENTAL MODEL
------------------------------------

Row  = rigid horizontal line
Wrap = flowing text-like layout
*/
