/*
CH03 - 10
Container vs SizedBox vs Padding

GOAL:
- Compare three very common widgets
- Understand their responsibilities
- Learn when to use each
- Avoid overusing Container

IMPORTANT:
Do NOT use Container for everything.
Choose the simplest correct widget.
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
      home: ComparisonPage(),
    );
  }
}

class ComparisonPage extends StatelessWidget {
  const ComparisonPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/10 – Widget Comparison')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            =====================================================
            1️⃣ SizedBox
            =====================================================
            */
            const Text(
              '1️⃣ SizedBox (Size or Spacing Only)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            const SizedBox(
              width: 150,
              height: 60,
              child: ColoredBox(
                color: Colors.blue,
                child: Center(
                  child: Text(
                    'SizedBox',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
            ),

            const SizedBox(height: 30),

            /*
            =====================================================
            2️⃣ Padding
            =====================================================
            */
            const Text(
              '2️⃣ Padding (Inside Spacing)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            Padding(
              padding: const EdgeInsets.all(20),
              child: Container(
                color: Colors.green,
                child: const Text(
                  'Padding adds space INSIDE',
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ),

            const SizedBox(height: 30),

            /*
            =====================================================
            3️⃣ Container
            =====================================================
            */
            const Text(
              '3️⃣ Container (Combination Widget)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            Container(
              width: 180,
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: Colors.orange,
                borderRadius: BorderRadius.circular(8),
              ),
              alignment: Alignment.center,
              child: const Text(
                'Container',
                style: TextStyle(color: Colors.white),
              ),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 RESPONSIBILITY COMPARISON
------------------------------------------------

SizedBox:
- Controls width / height
- Used for spacing
- Lightweight
- Does NOT support decoration

Padding:
- Adds space INSIDE around child
- Does NOT control color or size
- Very focused responsibility

Container:
- Can control:
  - width / height
  - padding
  - margin
  - decoration
  - alignment
- Combination widget
- More powerful but heavier

------------------------------------------------
🧠 WHEN TO USE WHICH?
------------------------------------------------

If you only need spacing:
→ Use SizedBox

If you only need internal spacing:
→ Use Padding

If you need decoration or multiple features:
→ Use Container

------------------------------------------------
❌ COMMON BEGINNER MISTAKE
------------------------------------------------

Using Container everywhere:

Container(
  child: SizedBox(height: 20),
)

Better:
SizedBox(height: 20)

------------------------------------------------
🎯 FINAL DECISION RULE
------------------------------------------------

Choose the SIMPLEST widget
that accomplishes the task.

Do not default to Container.
*/
