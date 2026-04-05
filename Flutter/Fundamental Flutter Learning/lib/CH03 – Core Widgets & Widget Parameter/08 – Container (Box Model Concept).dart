/*
CH03 - 08
Container (Box Model Concept)

GOAL:
- Understand Container deeply
- Learn padding vs margin
- Learn alignment
- Learn decoration (color, border, radius)
- Understand Flutter box model

IMPORTANT:
Container is a COMBINATION widget.
It wraps multiple lower-level widgets internally.
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
      home: ContainerBoxModelPage(),
    );
  }
}

class ContainerBoxModelPage extends StatelessWidget {
  const ContainerBoxModelPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/08 – Container & Box Model')),

      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [
          /*
          ------------------------------------
          1️⃣ Basic Container
          ------------------------------------
          */
          const Text(
            '1️⃣ Basic Container',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Container(
            width: 200,
            height: 80,
            color: Colors.blue,
            alignment: Alignment.center,
            child: const Text(
              'Basic Container',
              style: TextStyle(color: Colors.white),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          2️⃣ Padding (inside spacing)
          ------------------------------------
          */
          const Text(
            '2️⃣ Padding (inside spacing)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Container(
            color: Colors.green,
            padding: const EdgeInsets.all(20),
            child: const Text(
              'Padding adds space INSIDE the box',
              style: TextStyle(color: Colors.white),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          3️⃣ Margin (outside spacing)
          ------------------------------------
          */
          const Text(
            '3️⃣ Margin (outside spacing)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Container(
            margin: const EdgeInsets.all(20),
            color: Colors.orange,
            padding: const EdgeInsets.all(10),
            child: const Text(
              'Margin adds space OUTSIDE the box',
              style: TextStyle(color: Colors.white),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          4️⃣ Decoration (border + radius)
          ------------------------------------
          */
          const Text(
            '4️⃣ Decoration (border + radius)',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Container(
            padding: const EdgeInsets.all(16),
            decoration: BoxDecoration(
              color: Colors.purple,
              borderRadius: BorderRadius.circular(12),
              border: Border.all(color: Colors.black, width: 3),
            ),
            child: const Text(
              'Decorated Container',
              style: TextStyle(color: Colors.white),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          5️⃣ Alignment
          ------------------------------------
          */
          const Text(
            '5️⃣ Alignment',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Container(
            width: 200,
            height: 100,
            color: Colors.grey.shade300,
            alignment: Alignment.bottomRight,
            child: const Text('Bottom Right'),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 FLUTTER BOX MODEL
------------------------------------------------

Similar to CSS box model:

        Margin
      -----------------
      |               |
      |   Padding     |
      |  -----------  |
      |  | Content |  |
      |  -----------  |
      |               |
      -----------------

Content = child widget

------------------------------------------------
🧠 PADDING vs MARGIN
------------------------------------------------

padding:
- Space INSIDE container
- Between border and child

margin:
- Space OUTSIDE container
- Between this container and other widgets

------------------------------------------------
🧠 ALIGNMENT
------------------------------------------------

alignment:
- Controls where child sits
- Inside the container

Common values:
- Alignment.center
- Alignment.topLeft
- Alignment.bottomRight

------------------------------------------------
🧠 DECORATION
------------------------------------------------

If you need:
- border
- borderRadius
- gradient
- shadow

Use decoration: BoxDecoration()

NOTE:
If you use decoration,
DO NOT use color property directly.
Instead, put color inside BoxDecoration.

------------------------------------------------
🧠 CONTAINER IS A CONVENIENCE WIDGET
------------------------------------------------

Internally, Container may use:
- Padding
- Align
- DecoratedBox
- ConstrainedBox

You could build same UI manually,
but Container makes it easier.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Container = configurable box

Padding = inside spacing
Margin  = outside spacing
Decoration = visual styling
Alignment = child positioning
*/
