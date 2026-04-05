/*
CH06 - 09
Nested Scrolling & Common Mistakes

GOAL:
- Understand common scroll layout errors
- Learn how to fix unbounded height error
- Learn shrinkWrap and physics
- Strengthen constraint understanding

IMPORTANT:
Scroll direction is unbounded.
The other direction must be constrained.
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
      home: NestedScrollPage(),
    );
  }
}

class NestedScrollPage extends StatelessWidget {
  const NestedScrollPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/09 – Nested Scrolling')),

      body: Column(
        children: [
          /*
          ------------------------------------------------
          1️⃣ Static Header
          ------------------------------------------------
          */
          Container(
            height: 100,
            color: Colors.blue,
            alignment: Alignment.center,
            child: const Text(
              'Header (Fixed)',
              style: TextStyle(color: Colors.white),
            ),
          ),

          /*
          ------------------------------------------------
          2️⃣ ListView INSIDE Column (FIXED with Expanded)
          ------------------------------------------------

          Without Expanded:
          -> Unbounded height error.

          Expanded gives tight height constraint.
          */
          Expanded(
            child: ListView.builder(
              itemCount: 20,
              itemBuilder: (context, index) {
                return ListTile(title: Text('Item ${index + 1}'));
              },
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 COMMON MISTAKE 1
------------------------------------------------

ListView inside Column WITHOUT Expanded.

Example (WRONG):

Column(
  children: [
    Container(height: 100),
    ListView(...)
  ]
)

Why wrong?

Column gives:
- Unbounded height to ListView

ListView wants infinite height (scroll direction).
Conflict occurs.

------------------------------------------------
🧠 SOLUTION
------------------------------------------------

Wrap ListView with:

Expanded(
  child: ListView(...)
)

Expanded gives:
- Tight height constraint
- Fills remaining space

------------------------------------------------
🧠 COMMON MISTAKE 2
------------------------------------------------

ListView inside ListView

This causes nested scroll conflict.

Sometimes you need:

shrinkWrap: true,
physics: NeverScrollableScrollPhysics(),

Example:

ListView(
  children: [
    ListView(
      shrinkWrap: true,
      physics: NeverScrollableScrollPhysics(),
    )
  ]
)

But avoid nested scroll when possible.

------------------------------------------------
🧠 WHAT shrinkWrap DOES
------------------------------------------------

shrinkWrap: true
→ Makes ListView size itself based on content.

But:
- Slower
- More layout work
- Use only when necessary

------------------------------------------------
🧠 WHAT physics DOES
------------------------------------------------

physics:
- Controls scroll behavior
- Can disable scrolling
- Prevent nested scroll conflicts

------------------------------------------------
🎯 FINAL RULES
------------------------------------------------

Rule 1:
Scrollable inside Column?
→ Use Expanded.

Rule 2:
Avoid nested scroll when possible.

Rule 3:
Scroll direction = unbounded.
Other direction must be constrained.
*/
