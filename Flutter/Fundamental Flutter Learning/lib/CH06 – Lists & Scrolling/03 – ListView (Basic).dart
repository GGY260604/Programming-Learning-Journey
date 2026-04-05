/*
CH06 - 03
ListView (Basic)

GOAL:
- Understand ListView
- See built-in scrolling behavior
- Compare with SingleChildScrollView
- Understand why ListView exists

IMPORTANT:
ListView is a scrollable list of widgets.
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
      home: ListViewBasicPage(),
    );
  }
}

class ListViewBasicPage extends StatelessWidget {
  const ListViewBasicPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/03 – ListView Basic')),

      /*
      ListView is scrollable by default.
      No need for SingleChildScrollView.
      */
      body: ListView(
        padding: const EdgeInsets.all(8),

        /*
        children is similar to Column.
        */
        children: List.generate(
          20,
          (index) => Container(
            height: 80,
            margin: const EdgeInsets.symmetric(vertical: 8),
            color: Colors.blue,
            alignment: Alignment.center,
            child: Text(
              'List Item ${index + 1}',
              style: const TextStyle(color: Colors.white),
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS ListView?
------------------------------------------------

ListView is:
- A scrollable column
- Optimized for list-like UI
- Built-in scrolling

------------------------------------------------
🧠 DIFFERENCE FROM Column
------------------------------------------------

Column:
- Not scrollable
- Tries to display everything
- Causes overflow

ListView:
- Scrollable
- Displays items within viewport
- No overflow

------------------------------------------------
🧠 DIFFERENCE FROM SingleChildScrollView
------------------------------------------------

SingleChildScrollView:
- Scrolls one child
- Builds ALL content immediately

ListView:
- Designed specifically for lists
- Has builder constructor (next lesson)
- More efficient for dynamic content

------------------------------------------------
🧠 IMPORTANT CONSTRAINT BEHAVIOR
------------------------------------------------

ListView:
- Takes full height of parent
- Provides unbounded height to its children (in scroll direction)
- Handles viewport automatically

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Column = vertical layout
SingleChildScrollView = scroll one child
ListView = scrollable list layout
*/
