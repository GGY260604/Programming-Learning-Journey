/*
CH04 - 04
mainAxisSize (min vs max)

GOAL:
- Understand why Row / Column fill space by default
- Learn what mainAxisSize controls
- Visually compare max vs min

REMINDER:
main axis = direction of layout
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
      home: MainAxisSizePage(),
    );
  }
}

/*
This page compares:
- mainAxisSize.max (default)
- mainAxisSize.min
*/
class MainAxisSizePage extends StatelessWidget {
  const MainAxisSizePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH04/04 – mainAxisSize')),

      backgroundColor: Colors.grey.shade200,

      body: Container(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            const _Title('mainAxisSize.max (DEFAULT)'),

            /*
            Stage container
            */
            Container(
              height: 100,
              color: Colors.white,
              padding: const EdgeInsets.all(8),

              /*
              Row with mainAxisSize.max
              */
              child: Row(
                mainAxisSize: MainAxisSize.max,
                mainAxisAlignment: MainAxisAlignment.center,
                children: const [
                  _Box(color: Colors.red),
                  SizedBox(width: 10),
                  _Box(color: Colors.green),
                  SizedBox(width: 10),
                  _Box(color: Colors.blue),
                ],
              ),
            ),

            const SizedBox(height: 30),

            const _Title('mainAxisSize.min'),

            Container(
              height: 100,
              color: Colors.white,
              padding: const EdgeInsets.all(8),

              /*
              Row with mainAxisSize.min
              */
              child: Row(
                mainAxisSize: MainAxisSize.min,
                children: const [
                  _Box(color: Colors.red),
                  SizedBox(width: 10),
                  _Box(color: Colors.green),
                  SizedBox(width: 10),
                  _Box(color: Colors.blue),
                ],
              ),
            ),

            const SizedBox(height: 20),

            const Text(
              'Observe:\n'
              '- max: Row stretches across available space\n'
              '- min: Row wraps tightly around its children',
            ),
          ],
        ),
      ),
    );
  }
}

/*
Reusable colored box
*/
class _Box extends StatelessWidget {
  final Color color;

  const _Box({required this.color});

  @override
  Widget build(BuildContext context) {
    return Container(width: 40, height: 40, color: color);
  }
}

/*
Simple section title
*/
class _Title extends StatelessWidget {
  final String text;

  const _Title(this.text);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 8),
      child: Text(text, style: const TextStyle(fontWeight: FontWeight.bold)),
    );
  }
}

/*
------------------------------------
🧠 KEY IDEA (VERY IMPORTANT)
------------------------------------

mainAxisSize controls:
"How much space the Row / Column wants
along the MAIN axis"

------------------------------------
VALUES
------------------------------------

MainAxisSize.max (default):
- Take ALL available space

MainAxisSize.min:
- Take ONLY the space needed
  by children

------------------------------------
COMMON BEGINNER CONFUSION
------------------------------------

❌ "Row width depends on children"
✅ By default, Row wants MAX space

------------------------------------
MENTAL MODEL
------------------------------------

Row / Column behavior:
1) Ask parent for space
2) Decide how much to take (mainAxisSize)
3) Lay out children inside that space
*/
