/*
CH05 - 06
Common Stack & Wrap Mistakes

GOAL:
- Learn common beginner mistakes
- See WRONG idea vs RIGHT pattern (without crashing the app)
- Build debugging instincts

NOTE:
We avoid writing code that crashes intentionally.
Instead, we SHOW the correct pattern and explain the wrong one in comments.
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
      home: MistakesPage(),
    );
  }
}

/*
This page shows multiple "mistake -> fix" sections.
*/
class MistakesPage extends StatelessWidget {
  const MistakesPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/06 – Common Mistakes')),
      backgroundColor: Colors.grey.shade200,

      /*
      ListView is NOT const here because:
      - Even though many children are const,
      - It's safer to keep it non-const for future edits.
      */
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: const [
          SectionTitle(text: '1️⃣ Mistake: Using Stack when Column is enough'),
          UseColumnNotStackFix(),

          SectionTitle(text: '2️⃣ Mistake: Forgetting paint order in Stack'),
          PaintOrderFix(),

          SectionTitle(
            text: '3️⃣ Mistake: Expecting Row to wrap automatically',
          ),
          UseWrapFix(),

          SectionTitle(text: '4️⃣ Mistake: Using Positioned outside Stack'),
          PositionedOnlyInStackFix(),
        ],
      ),
    );
  }
}

/*
------------------------------------
Reusable section title widget
------------------------------------
*/
class SectionTitle extends StatelessWidget {
  final String text;

  const SectionTitle({super.key, required this.text});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 10, top: 6),
      child: Text(
        text,
        style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
      ),
    );
  }
}

/*
------------------------------------
1️⃣ Mistake: Using Stack when Column is enough
------------------------------------

Wrong mindset:
"I want vertical spacing, so I use Stack."

Correct:
Column is for FLOW layout (top -> bottom).
*/
class UseColumnNotStackFix extends StatelessWidget {
  const UseColumnNotStackFix({super.key});

  @override
  Widget build(BuildContext context) {
    return Stage(
      note:
          '✅ Use Column for vertical flow.\n'
          '❌ Do NOT use Stack to simulate a list/flow.',
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: const [
          LabelBox(color: Colors.blue, text: 'Header'),
          SizedBox(height: 8),
          LabelBox(color: Colors.green, text: 'Content'),
          SizedBox(height: 8),
          LabelBox(color: Colors.orange, text: 'Footer'),
        ],
      ),
    );
  }
}

/*
------------------------------------
2️⃣ Mistake: Forgetting paint order in Stack
------------------------------------

Rule:
- Later children are painted ON TOP of earlier ones.
*/
class PaintOrderFix extends StatelessWidget {
  const PaintOrderFix({super.key});

  @override
  Widget build(BuildContext context) {
    return Stage(
      note:
          '✅ Paint order matters.\n'
          'Last child = top layer.',
      child: Stack(
        children: [
          /*
          Bottom layer
          */
          Container(color: Colors.blue),

          /*
          Top layer (because it comes later in the list)
          */
          Center(
            child: Container(
              padding: const EdgeInsets.all(10),
              color: Colors.black54,
              child: const Text(
                'I am on top\n(because I come later)',
                textAlign: TextAlign.center,
                style: TextStyle(color: Colors.white),
              ),
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------
3️⃣ Mistake: Expecting Row to wrap automatically
------------------------------------

Row does NOT wrap.
Wrap automatically breaks into multiple lines.
*/
class UseWrapFix extends StatelessWidget {
  const UseWrapFix({super.key});

  @override
  Widget build(BuildContext context) {
    return Stage(
      note:
          '✅ Row = single line only (may overflow)\n'
          '✅ Wrap = auto line breaks\n'
          'Use Wrap for dynamic / unknown number of items.',
      child: Padding(
        padding: const EdgeInsets.all(8),
        child: Wrap(
          spacing: 8,
          runSpacing: 8, // Vertical space between lines
          children: const [
            ChipTag(text: 'Flutter'),
            ChipTag(text: 'Dart'),
            ChipTag(text: 'Row'),
            ChipTag(text: 'Wrap'),
            ChipTag(text: 'Responsive'),
            ChipTag(text: 'No Overflow'),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------
4️⃣ Mistake: Using Positioned outside Stack
------------------------------------

Wrong code (DO NOT do this):
Row(
  children: [
    Positioned(...)
  ],
)

This causes an error because Positioned only works inside Stack.

So we show the correct usage here.
*/
class PositionedOnlyInStackFix extends StatelessWidget {
  const PositionedOnlyInStackFix({super.key});

  @override
  Widget build(BuildContext context) {
    return Stage(
      note:
          '✅ Positioned ONLY works inside Stack.\n'
          'If parent is not Stack → runtime error.',
      child: Stack(
        children: [
          Container(color: Colors.blue),

          Positioned(
            bottom: 12,
            right: 12,
            child: Container(
              padding: const EdgeInsets.all(8),
              color: Colors.red,
              child: const Text(
                'Positioned\ninside Stack',
                style: TextStyle(color: Colors.white),
                textAlign: TextAlign.center,
              ),
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------
Reusable "stage" widget
------------------------------------

This shows:
- A white demo area
- A note underneath (explanation)
*/
class Stage extends StatelessWidget {
  final Widget child;
  final String note;

  const Stage({super.key, required this.child, required this.note});

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Container(
          height: 160,
          width: double.infinity,
          color: Colors.white,
          child: child,
        ),
        const SizedBox(height: 10),
        Text(note),
        const SizedBox(height: 26),
      ],
    );
  }
}

/*
Reusable labeled box
*/
class LabelBox extends StatelessWidget {
  final Color color;
  final String text;

  const LabelBox({super.key, required this.color, required this.text});

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 40,
      width: double.infinity,
      color: color,
      alignment: Alignment.center,
      child: Text(text, style: const TextStyle(color: Colors.white)),
    );
  }
}

/*
Reusable chip-like tag
*/
class ChipTag extends StatelessWidget {
  final String text;

  const ChipTag({super.key, required this.text});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
      decoration: BoxDecoration(
        color: Colors.blue,
        borderRadius: BorderRadius.circular(18),
      ),
      child: Text(text, style: const TextStyle(color: Colors.white)),
    );
  }
}
