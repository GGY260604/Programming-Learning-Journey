/*
CH05 - 02
Positioned (Controlling Stack Children)

GOAL:
- Understand how to CONTROL child position inside Stack
- Learn why Positioned ONLY works with Stack
- Build intuition for top / left / right / bottom

IMPORTANT IDEA:
Stack gives LAYERS.
Positioned gives COORDINATES.
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
      home: PositionedBasicsPage(),
    );
  }
}

/*
This page demonstrates:
- Stack without Positioned (default behavior)
- Stack WITH Positioned (controlled placement)
*/
class PositionedBasicsPage extends StatelessWidget {
  const PositionedBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH05/02 – Positioned')),

      backgroundColor: Colors.grey.shade200,

      body: Column(
        children: [
          const SizedBox(height: 16),
          const Text(
            'Positioned works ONLY inside Stack',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 12),

          /*
          ==============================
          STACK STAGE
          ==============================
          */
          Center(
            child: Container(
              width: 300,
              height: 200,
              color: Colors.white,

              /*
              Stack is the ONLY parent that understands Positioned.
              */
              child: Stack(
                children: [
                  /*
                  ------------------------------------
                  1️⃣ Unpositioned child
                  ------------------------------------

                  - No Positioned
                  - Uses Stack's default alignment
                  - Top-left by default
                  */
                  Container(
                    width: 100,
                    height: 60,
                    color: Colors.blue,
                    alignment: Alignment.center,
                    child: const Text(
                      'No Positioned',
                      style: TextStyle(color: Colors.white),
                      textAlign: TextAlign.center,
                    ),
                  ),

                  /*
                  ------------------------------------
                  2️⃣ Positioned with top & left
                  ------------------------------------

                  Positioned tells Stack:
                  "Place this child at exact coordinates"
                  */
                  Positioned(
                    top: 20,
                    left: 120,
                    child: Container(
                      width: 120,
                      height: 60,
                      color: Colors.green,
                      alignment: Alignment.center,
                      child: const Text(
                        'top:20\nleft:120',
                        style: TextStyle(color: Colors.white),
                        textAlign: TextAlign.center,
                      ),
                    ),
                  ),

                  /*
                  ------------------------------------
                  3️⃣ Positioned with bottom & right
                  ------------------------------------

                  This anchors the child
                  to the bottom-right corner.
                  */
                  Positioned(
                    bottom: 10,
                    right: 10,
                    child: Container(
                      width: 120,
                      height: 50,
                      color: Colors.red,
                      alignment: Alignment.center,
                      child: const Text(
                        'bottom:10\nright:10',
                        style: TextStyle(color: Colors.white),
                        textAlign: TextAlign.center,
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ),

          const SizedBox(height: 20),

          /*
          Explanation text
          */
          const Padding(
            padding: EdgeInsets.all(16),
            child: Text(
              'Observe:\n'
              '- Blue box uses Stack default position\n'
              '- Green box is positioned using top & left\n'
              '- Red box is positioned using bottom & right\n',
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------
🧠 CORE RULES OF Positioned (READ CAREFULLY)
------------------------------------

1️⃣ Positioned ONLY works inside Stack
   - Using Positioned elsewhere = ERROR

2️⃣ Positioned removes the child from normal layout
   - No Row / Column flow
   - Exact placement instead

3️⃣ You can use:
   - top
   - left
   - right
   - bottom
   (any combination)

------------------------------------
🧠 HOW TO READ Positioned CODE
------------------------------------

Read this:
Positioned(
  top: 20,
  left: 120,
  child: ...
)

As:
"Place this widget 20px from the top
 and 120px from the left
 of the Stack."

------------------------------------
❌ COMMON BEGINNER MISTAKES
------------------------------------

❌ Using Positioned inside Row / Column
❌ Expecting Positioned to affect siblings
❌ Forgetting Stack boundaries

------------------------------------
✅ WHEN TO USE Positioned
------------------------------------

Use Positioned when:
- You need absolute-like placement
- You need overlays (badges, icons)
- You need precise control

------------------------------------
MENTAL MODEL (VERY IMPORTANT)
------------------------------------

Stack = layers
Positioned = coordinates inside layers

Row / Column = flow layout
Stack + Positioned = free layout
*/
