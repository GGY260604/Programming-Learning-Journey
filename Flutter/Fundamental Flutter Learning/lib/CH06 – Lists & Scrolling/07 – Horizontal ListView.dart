/*
CH06 - 07
Horizontal ListView

GOAL:
- Understand scrollDirection
- Learn horizontal scrolling
- See how constraints change
- Avoid common mistakes

IMPORTANT:
Horizontal ListView behaves differently
from vertical ListView in constraints.
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
      home: HorizontalListPage(),
    );
  }
}

class HorizontalListPage extends StatelessWidget {
  const HorizontalListPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/07 – Horizontal ListView')),

      body: Column(
        children: [
          /*
          ------------------------------------------------
          1️⃣ Fixed Height Container (IMPORTANT)
          ------------------------------------------------

          Horizontal ListView must have
          a bounded height.
          */
          Container(
            height: 150, // REQUIRED for horizontal list
            color: Colors.grey.shade200,

            child: ListView.builder(
              scrollDirection: Axis.horizontal,

              itemCount: 20,

              itemBuilder: (context, index) {
                return Container(
                  width: 120,
                  margin: const EdgeInsets.all(8),
                  color: Colors.blue,
                  alignment: Alignment.center,
                  child: Text(
                    'Item ${index + 1}',
                    style: const TextStyle(color: Colors.white),
                  ),
                );
              },
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          2️⃣ Explanation Text
          ------------------------------------------------
          */
          const Padding(
            padding: EdgeInsets.all(16),
            child: Text(
              'Observe:\n'
              '- Items scroll horizontally\n'
              '- Height must be constrained\n'
              '- Width is unbounded (scroll direction)\n',
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT CHANGED?
------------------------------------------------

We added:
scrollDirection: Axis.horizontal

Now scrolling is left-right instead of up-down.

------------------------------------------------
🧠 VERY IMPORTANT CONSTRAINT RULE
------------------------------------------------

Vertical ListView:
- Height = full screen
- Width = constrained
- Height = scroll direction (unbounded)

Horizontal ListView:
- Width = scroll direction (unbounded)
- Height MUST be constrained

That is why we wrap it in:

Container(height: 150)

------------------------------------------------
🧠 COMMON BEGINNER MISTAKE
------------------------------------------------

Putting horizontal ListView directly inside Column
WITHOUT giving it height.

Result:
Unbounded height error.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Scroll direction:
- That direction is unbounded.
- Opposite direction must be constrained.

Vertical scroll → height unbounded
Horizontal scroll → width unbounded
*/
