/*
CH06 - 02
SingleChildScrollView (Basic Scrolling)

GOAL:
- Fix overflow from previous example
- Understand how scrolling works
- Learn when to use SingleChildScrollView

IMPORTANT:
SingleChildScrollView allows ONE child to scroll.
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
      home: ScrollFixPage(),
    );
  }
}

class ScrollFixPage extends StatelessWidget {
  const ScrollFixPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/02 – SingleChildScrollView')),

      /*
      Instead of Column directly,
      we wrap it with SingleChildScrollView.
      */
      body: SingleChildScrollView(
        child: Column(
          children: List.generate(
            20,
            (index) => Container(
              height: 80,
              margin: const EdgeInsets.all(8),
              color: Colors.green,
              alignment: Alignment.center,
              child: Text(
                'Item ${index + 1}',
                style: const TextStyle(color: Colors.white),
              ),
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT CHANGED?
------------------------------------------------

Previously:
Column was direct child of Scaffold.

Now:
SingleChildScrollView wraps Column.

------------------------------------------------
🧠 HOW IT WORKS
------------------------------------------------

SingleChildScrollView:
- Allows its child to be bigger than viewport
- Creates a scrollable viewport
- Clips content outside visible area
- Allows user to scroll

------------------------------------------------
🧠 IMPORTANT CONSTRAINT CHANGE
------------------------------------------------

Without scroll:
Parent gives tight height constraint.

With scroll:
SingleChildScrollView gives child
unbounded height (in scroll direction).

This removes overflow.

------------------------------------------------
🧠 WHEN TO USE SingleChildScrollView
------------------------------------------------

Use when:
- Small content
- Static content
- Few children
- Forms

Do NOT use for:
- Long dynamic lists
- Large data sets

Because:
It builds ALL children at once.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

SingleChildScrollView =
"Make this one child scrollable."

But it is NOT efficient for big lists.
*/
