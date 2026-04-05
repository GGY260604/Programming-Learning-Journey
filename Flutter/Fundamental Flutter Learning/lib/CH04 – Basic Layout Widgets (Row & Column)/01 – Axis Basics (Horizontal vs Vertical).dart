/*
CH04 - 01
Axis Basics (Horizontal vs Vertical)

GOAL:
- Understand Row vs Column
- Understand the idea of "axis"
- Preview mainAxis and crossAxis meaning (concept only)
- VISUALLY see the difference on screen

IMPORTANT:
Row and Column are layout widgets.
They position children in a line.

Row    -> children arranged HORIZONTALLY (left to right)
Column -> children arranged VERTICALLY (top to bottom)
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
      home: AxisBasicsPage(),
    );
  }
}

/*
This page shows:
- Row example
- Column example
With clear labels
*/
class AxisBasicsPage extends StatelessWidget {
  const AxisBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH04/01 – Axis Basics')),

      /*
      backgroundColor makes the page structure clearer
      */
      backgroundColor: Colors.grey.shade200,

      body: Padding(
        padding: const EdgeInsets.all(16),

        /*
        We use a Column here just to stack TWO demos vertically:
        - Row demo box
        - Column demo box

        (Yes, we are already using Column in the demo,
        but you will understand it by seeing the effect.)
        */
        child: Column(
          crossAxisAlignment:
              CrossAxisAlignment.stretch, // stretch to full width
          children: [
            const Text(
              'ROW (Horizontal Layout)',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            /*
            This container is just a "stage" to observe Row behavior
            */
            Container(
              height: 120,
              color: Colors.white,
              padding: const EdgeInsets.all(12),

              /*
              Row lays out children LEFT -> RIGHT
              */
              child: Row(
                /*
                mainAxis in Row = HORIZONTAL direction
                crossAxis in Row = VERTICAL direction

                We'll study these attributes deeply in next files.
                For now: just observe the arrangement.
                */
                children: const [
                  _ColorBox(color: Colors.red, label: '1'),
                  SizedBox(width: 10),
                  _ColorBox(color: Colors.green, label: '2'),
                  SizedBox(width: 10),
                  _ColorBox(color: Colors.blue, label: '3'),
                ],
              ),
            ),

            const SizedBox(height: 30),

            const Text(
              'COLUMN (Vertical Layout)',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            /*
            Another stage box to observe Column behavior
            */
            Container(
              height: 250,
              color: Colors.white,
              padding: const EdgeInsets.all(12),

              /*
              Column lays out children TOP -> BOTTOM
              */
              child: Column(
                /*
                mainAxis in Column = VERTICAL direction
                crossAxis in Column = HORIZONTAL direction
                */
                children: const [
                  _ColorBox(color: Colors.red, label: 'A'),
                  SizedBox(height: 10),
                  _ColorBox(color: Colors.green, label: 'B'),
                  SizedBox(height: 10),
                  _ColorBox(color: Colors.blue, label: 'C'),
                ],
              ),
            ),

            const SizedBox(height: 20),

            /*
            Summary text
            */
            const Text(
              'Key idea:\n'
              '- Row = horizontal line\n'
              '- Column = vertical line\n'
              '\nNext: we will control spacing with mainAxisAlignment.',
            ),
          ],
        ),
      ),
    );
  }
}

/*
A small reusable widget for visual blocks.

We make this as a separate widget to keep the Row/Column demo readable.
*/
class _ColorBox extends StatelessWidget {
  final Color color;
  final String label;

  const _ColorBox({required this.color, required this.label});

  @override
  Widget build(BuildContext context) {
    return Container(
      width: 60,
      height: 60,
      color: color,
      alignment: Alignment.center,
      child: Text(
        label,
        style: const TextStyle(
          color: Colors.white,
          fontWeight: FontWeight.bold,
        ),
      ),
    );
  }
}

/*
✅ WHAT TO OBSERVE ON SCREEN

1) In the Row section:
   - Boxes are arranged left to right

2) In the Column section:
   - Boxes are arranged top to bottom

✅ VERY IMPORTANT MENTAL MODEL

Row and Column both have:
- a MAIN axis (direction of the line)
- a CROSS axis (the direction across the line)

Row:
- main axis  = horizontal
- cross axis = vertical

Column:
- main axis  = vertical
- cross axis = horizontal
*/
