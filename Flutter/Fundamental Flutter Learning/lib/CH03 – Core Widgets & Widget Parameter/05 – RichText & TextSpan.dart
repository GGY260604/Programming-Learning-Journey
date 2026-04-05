/*
CH03 - 05
RichText & TextSpan

GOAL:
- Understand why Text() is limited
- Learn how to mix styles in one paragraph
- Understand TextSpan tree structure
- Understand that TextSpan is NOT a widget

IMPORTANT:
RichText gives full control over styled text.
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
      home: RichTextPage(),
    );
  }
}

class RichTextPage extends StatelessWidget {
  const RichTextPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/05 – RichText')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            ------------------------------------
            1️⃣ Normal Text (Single Style)
            ------------------------------------
            */
            const Text(
              'Normal Text only supports one style.',
              style: TextStyle(fontSize: 18),
            ),

            const SizedBox(height: 24),

            /*
            ------------------------------------
            2️⃣ RichText with multiple styles
            ------------------------------------
            */
            RichText(
              text: const TextSpan(
                text: 'Flutter ',
                style: TextStyle(fontSize: 20, color: Colors.black),
                children: [
                  TextSpan(
                    text: 'is ',
                    style: TextStyle(fontWeight: FontWeight.bold),
                  ),
                  TextSpan(
                    text: 'awesome!',
                    style: TextStyle(color: Colors.blue),
                  ),
                ],
              ),
            ),

            const SizedBox(height: 24),

            /*
            ------------------------------------
            3️⃣ Nested TextSpan (Tree Structure)
            ------------------------------------
            */
            RichText(
              text: const TextSpan(
                text: 'Parent ',
                style: TextStyle(fontSize: 18, color: Colors.black),
                children: [
                  TextSpan(
                    text: 'Child ',
                    style: TextStyle(color: Colors.red),
                    children: [
                      TextSpan(
                        text: 'Grandchild',
                        style: TextStyle(fontWeight: FontWeight.bold),
                      ),
                    ],
                  ),
                ],
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
🧠 WHY Text() IS LIMITED
------------------------------------------------

Text() supports only ONE style object.

If you want:
- Multiple colors
- Mixed bold and normal
- Partial styling

Text() alone is not enough.

------------------------------------------------
🧠 WHAT IS RichText?
------------------------------------------------

RichText is a widget.

It allows you to display styled text
using a tree of TextSpan objects.

------------------------------------------------
🧠 WHAT IS TextSpan?
------------------------------------------------

TextSpan is NOT a widget.

TextSpan is:
- A text configuration object
- Used inside RichText

It forms a TREE structure.

------------------------------------------------
🧠 TEXT BECOMES A TREE
------------------------------------------------

RichText
 └── TextSpan (root)
      ├── TextSpan (child)
      └── TextSpan (child)

Each TextSpan:
- Can have its own style
- Can have children
- Inherits parent style unless overridden

------------------------------------------------
🧠 STYLE INHERITANCE
------------------------------------------------

If a child TextSpan does NOT specify a style,
it inherits from parent.

Only overridden properties change.

------------------------------------------------
❌ COMMON BEGINNER MISTAKE
------------------------------------------------

❌ Thinking TextSpan is a widget
❌ Trying to use TextSpan outside RichText

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Text() = simple text, one style

RichText + TextSpan = styled text tree

TextSpan = configuration, not widget
*/
