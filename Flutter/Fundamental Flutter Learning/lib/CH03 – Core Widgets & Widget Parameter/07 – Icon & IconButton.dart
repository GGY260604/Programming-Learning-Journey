/*
CH03 - 07
Icon & IconButton

GOAL:
- Understand Icon widget
- Learn how to use material icons
- Understand size and color
- Understand IconButton (interactive icon)

IMPORTANT:
Icon is visual.
IconButton is interactive.
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
      home: IconPage(),
    );
  }
}

class IconPage extends StatelessWidget {
  const IconPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/07 – Icon & IconButton')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            ------------------------------------
            1️⃣ Basic Icon
            ------------------------------------
            */
            const Text(
              '1️⃣ Basic Icon',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            const Icon(Icons.favorite),

            const SizedBox(height: 30),

            /*
            ------------------------------------
            2️⃣ Icon with size and color
            ------------------------------------
            */
            const Text(
              '2️⃣ Icon with size and color',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            const Icon(Icons.star, size: 40, color: Colors.orange),

            const SizedBox(height: 30),

            /*
            ------------------------------------
            3️⃣ IconButton (interactive)
            ------------------------------------
            */
            const Text(
              '3️⃣ IconButton (tap me)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            IconButton(
              icon: const Icon(Icons.thumb_up),
              iconSize: 40,
              color: Colors.blue,
              onPressed: () {
                /*
                This is a callback.
                It runs when button is tapped.
                */
                debugPrint('IconButton pressed');
              },
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Icon?
------------------------------------------------

Icon is a widget that displays a graphical symbol.

Icons come from:
Icons.favorite
Icons.star
Icons.home
Icons.settings
...

These are material design icons.

------------------------------------------------
🧠 WHERE DO ICONS COME FROM?
------------------------------------------------

Flutter includes built-in Material Icons.

The Icons class provides predefined icon data.

Icon(Icons.favorite)

Icons.favorite is NOT a widget.
It is icon data.

------------------------------------------------
🧠 COMMON Icon PROPERTIES
------------------------------------------------

size   → icon size
color  → icon color

Icon does NOT handle tap by default.

------------------------------------------------
🧠 WHAT IS IconButton?
------------------------------------------------

IconButton is:
- A clickable icon
- Includes tap interaction
- Has onPressed callback

It wraps Icon internally.

------------------------------------------------
🧠 VISUAL vs INTERACTIVE WIDGET
------------------------------------------------

Icon → visual only
IconButton → interactive

This is a key Flutter design idea.

Many widgets follow this pattern:
Text → TextButton
Icon → IconButton

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Icon = visual symbol
IconButton = clickable symbol
Icons.* = icon data
*/
