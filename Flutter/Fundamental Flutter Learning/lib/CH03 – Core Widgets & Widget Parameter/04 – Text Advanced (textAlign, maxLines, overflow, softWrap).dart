/*
CH03 - 04
Text Advanced (textAlign, maxLines, overflow, softWrap)

GOAL:
- Understand how text behaves when space is limited
- Learn textAlign
- Learn maxLines
- Learn overflow handling
- Understand wrapping behavior

IMPORTANT:
Text behavior depends on its parent constraints.
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
      home: TextAdvancedPage(),
    );
  }
}

class TextAdvancedPage extends StatelessWidget {
  const TextAdvancedPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/04 – Text Advanced')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            ------------------------------------
            1️⃣ textAlign
            ------------------------------------
            */
            const Text(
              '1️⃣ TextAlign.center',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            Container(
              width: 250,
              color: Colors.grey.shade300,
              child: const Text(
                'This text is centered inside a fixed width container.',
                textAlign: TextAlign.center, // focus on this line
              ),
            ),

            const SizedBox(height: 24),

            /*
            ------------------------------------
            2️⃣ maxLines + overflow
            ------------------------------------
            */
            const Text(
              '2️⃣ maxLines: 1 + TextOverflow.ellipsis',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            Container(
              width: 250,
              color: Colors.grey.shade300,
              child: const Text(
                'This is a very long sentence that will not fit inside the container.',
                maxLines: 1,
                overflow: TextOverflow.ellipsis, // focus on this line
              ),
            ),

            const SizedBox(height: 24),

            /*
            ------------------------------------
            3️⃣ overflow fade
            ------------------------------------
            */
            const Text(
              '3️⃣ maxLines: 1 + TextOverflow.fade',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            Container(
              width: 250,
              color: Colors.grey.shade300,
              child: const Text(
                'This is another long sentence that demonstrates fade overflow.',
                maxLines: 1,
                overflow: TextOverflow.fade, // focus on this line
                softWrap: false,
              ),
            ),

            const SizedBox(height: 24),

            /*
            ------------------------------------
            4️⃣ softWrap (disable wrapping)
            ------------------------------------
            */
            const Text(
              '4️⃣ SoftWrap: false + TextOverflow.visible',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            Container(
              width: 250,
              color: Colors.grey.shade300,
              child: const Text(
                'This text will not wrap to the next line. It will overflow visibly.',
                softWrap: false,
                overflow: TextOverflow.visible,
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
🧠 TEXT ALIGN
------------------------------------------------

textAlign controls horizontal alignment
inside the Text widget.

Common values:
- TextAlign.start
- TextAlign.center
- TextAlign.end
- TextAlign.justify

IMPORTANT:
textAlign works inside the text's width.
It does NOT control parent alignment.

------------------------------------------------
🧠 maxLines
------------------------------------------------

Limits the number of lines displayed.

If text exceeds that:
- overflow behavior is triggered.

------------------------------------------------
🧠 overflow
------------------------------------------------

TextOverflow options:
- clip      → cut off
- fade      → fade out
- ellipsis  → ...
- visible   → allow overflow (may cause layout issues)

------------------------------------------------
🧠 softWrap
------------------------------------------------

softWrap: true  → text wraps to next line
softWrap: false → text does NOT wrap

If softWrap is false and text is too long,
overflow rules apply.

------------------------------------------------
🧠 IMPORTANT LAYOUT RULE
------------------------------------------------

Text behavior depends on constraints.

If Text has unlimited width:
- It will not wrap.

If Text is inside fixed-width container:
- Wrapping rules apply.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Text rendering depends on:
1) Style
2) Parent constraints
3) maxLines
4) overflow
*/
