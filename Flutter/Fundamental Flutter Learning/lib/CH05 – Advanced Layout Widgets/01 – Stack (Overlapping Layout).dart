/*
CH05 - 01
Stack (Overlapping Layout)

GOAL:
- Understand WHY Stack exists
- See how widgets can overlap
- Learn Stack's DEFAULT behavior

IMPORTANT IDEA:
Row / Column place widgets in a LINE.
Stack places widgets on TOP of each other.
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
      home: StackBasicsPage(),
    );
  }
}

/*
This page demonstrates Stack visually.
*/
class StackBasicsPage extends StatelessWidget {
  const StackBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/01 – Stack Basics')),

      backgroundColor: Colors.grey.shade200,

      body: Center(
        /*
        We wrap Stack in a Container
        to clearly see its boundaries.
        */
        child: Container(
          width: 400,
          height: 300,
          color: Colors.white,

          /*
          ------------------------------------
          STACK
          ------------------------------------

          Stack allows children to OVERLAP.

          Key characteristics:
          - Children are painted in ORDER
          - Later children appear ON TOP
          - By default, children are aligned
            to the TOP-LEFT of the stack
          */
          child: Stack(
            children: [
              /*
              ------------------------------------
              Child 1 (BOTTOM layer)
              ------------------------------------

              First child is drawn FIRST.
              It appears at the BOTTOM.
              */
              Container(
                width: 280,
                height: 180,
                color: Colors.blue,
                alignment: Alignment.center,
                child: const Text(
                  'Bottom\n(1st child)',
                  textAlign: TextAlign.center,
                  style: TextStyle(color: Colors.white),
                ),
              ),

              /*
              ------------------------------------
              Child 2 (MIDDLE layer)
              ------------------------------------

              Drawn AFTER first child,
              so it appears ON TOP of it.
              */
              Container(
                width: 200,
                height: 100,
                color: Colors.green,
                alignment: Alignment.center,
                child: const Text(
                  'Middle\n(2nd child)',
                  textAlign: TextAlign.center,
                  style: TextStyle(color: Colors.white),
                ),
              ),

              /*
              ------------------------------------
              Child 3 (TOP layer)
              ------------------------------------

              Last child is drawn LAST,
              so it appears on TOP of everything.
              */
              Container(
                width: 120,
                height: 60,
                color: Colors.red,
                alignment: Alignment.center,
                child: const Text(
                  'Top\n(3rd child)',
                  textAlign: TextAlign.center,
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------
🧠 WHAT TO OBSERVE ON SCREEN
------------------------------------

1) All boxes start at TOP-LEFT
   - Because Stack's default alignment
     is Alignment.topLeft

2) Boxes OVERLAP
   - They are NOT in a line

3) Paint order matters:
   - 1st child → bottom
   - last child → top

------------------------------------
🧠 WHY Stack EXISTS (CRITICAL)
------------------------------------

Row / Column CANNOT:
- Overlap widgets
- Place widgets freely on top of each other

Stack EXISTS to handle:
- Badges on icons
- Floating labels
- Image overlays
- Absolute-like positioning (next file)

------------------------------------
🧠 DEFAULT STACK RULES
------------------------------------

- Children are NOT positioned by default
- All children start from the same origin
- Later children paint over earlier ones

------------------------------------
❌ COMMON BEGINNER MISTAKES
------------------------------------

❌ Using Stack when Row/Column is enough
❌ Forgetting paint order matters
❌ Expecting spacing behavior like Row

------------------------------------
✅ WHEN TO USE Stack
------------------------------------

Use Stack when:
- Widgets must overlap
- One widget sits on top of another
- You need visual layering

------------------------------------
MENTAL MODEL (VERY IMPORTANT)
------------------------------------

Row / Column → layout in a line
Stack        → layout in layers
*/
