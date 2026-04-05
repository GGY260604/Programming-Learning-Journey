/*
CH03 - 09
SizedBox & Constraints (Correct Demonstration)

GOAL:
- Understand tight vs loose constraints
- See when width is respected
- See when width is ignored
- Build correct constraint mental model

CRITICAL RULE:
Parent gives min/max constraints.
Child chooses a size within that range.
Parent positions the child.
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
      home: ConstraintDemoPage(),
    );
  }
}

class ConstraintDemoPage extends StatelessWidget {
  const ConstraintDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/09 – Constraints (Correct)')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            =====================================================
            1️⃣ Loose Constraint (Center allows child to choose)
            =====================================================
            */
            const Text(
              '1️⃣ Loose Constraint (Center)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            Container(
              height: 120,
              color: Colors.grey.shade300,

              /*
              Center gives LOOSE constraints.
              Child can choose its own width.
              */
              child: Center(
                child: Container(
                  width: 150,
                  height: 60,
                  color: Colors.blue,
                  alignment: Alignment.center,
                  child: const Text(
                    'Width = 150',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
            ),

            const SizedBox(height: 30),

            /*
            =====================================================
            2️⃣ Tight Constraint (Expanded forces full width)
            =====================================================
            */
            const Text(
              '2️⃣ Tight Constraint (Expanded)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            Row(
              children: [
                /*
                Expanded forces child to fill available width.
                */
                Expanded(
                  child: Container(
                    width: 150, // This will be ignored
                    height: 60,
                    color: Colors.red,
                    alignment: Alignment.center,
                    child: const Text(
                      'Width ignored',
                      style: TextStyle(color: Colors.white),
                    ),
                  ),
                ),
              ],
            ),

            const SizedBox(height: 30),

            /*
            =====================================================
            3️⃣ Parent Smaller Than Child Request
            =====================================================
            */
            const Text(
              '3️⃣ Parent Smaller Than Child',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            Container(
              width: 120,
              height: 80,
              color: Colors.grey.shade300,
              alignment: Alignment.center,

              /*
              Child wants 300 width,
              but parent only allows 120.
              */
              child: Container(
                width: 300,
                height: 60,
                color: Colors.green,
                alignment: Alignment.center,
                child: const Text(
                  'Clamped to 120',
                  style: TextStyle(color: Colors.white),
                ),
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
🧠 WHAT WE JUST DEMONSTRATED
------------------------------------------------

1️⃣ Center = loose constraint
- Child can choose width freely (within screen limit)

2️⃣ Expanded = tight constraint
- Child MUST fill available width
- width: 150 is ignored

3️⃣ Parent smaller than child request
- Child requests width: 300
- Parent allows only 120
- Child becomes 120

------------------------------------------------
🧠 CONSTRAINT TYPES
------------------------------------------------

Loose constraint:
- minWidth = 0
- maxWidth = some value
- Child chooses size

Tight constraint:
- minWidth = maxWidth
- Child MUST use that size

------------------------------------------------
🧠 ABSOLUTE LAW
------------------------------------------------

Child CANNOT exceed parent constraints.

Even if you write:
width: 1000

If parent says maxWidth = 200,
child becomes 200.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Constraints flow DOWN.
Sizes flow UP.
Positions happen at parent level.

Every layout problem in Flutter
can be solved using this rule.
*/
