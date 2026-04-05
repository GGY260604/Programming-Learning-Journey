/*
CH06 - 04
ListView.builder (Efficient Lists)

GOAL:
- Understand why builder exists
- Learn lazy building concept
- Understand performance advantage
- Learn itemBuilder and itemCount

IMPORTANT:
.builder creates items ONLY when needed.
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
      home: ListViewBuilderPage(),
    );
  }
}

class ListViewBuilderPage extends StatelessWidget {
  const ListViewBuilderPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/04 – ListView.builder')),

      /*
      builder constructor is used instead of children list.
      */
      body: ListView.builder(
        /*
        itemCount tells ListView how many items exist.
        */
        itemCount: 1000,

        /*
        itemBuilder builds each item lazily.
        It is called only when needed.
        */
        itemBuilder: (context, index) {
          /*
          index starts from 0.
          */

          return Container(
            height: 80,
            margin: const EdgeInsets.symmetric(vertical: 8, horizontal: 12),
            color: Colors.purple,
            alignment: Alignment.center,
            child: Text(
              'Item ${index + 1}',
              style: const TextStyle(color: Colors.white),
            ),
          );
        },
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHY NOT USE children: [] FOR LARGE LISTS?
------------------------------------------------

If you write:

ListView(
  children: List.generate(1000, ...)
)

Flutter builds ALL 1000 widgets immediately.

This:
- Uses more memory
- Slower startup
- Not efficient

------------------------------------------------
🧠 WHAT builder DOES
------------------------------------------------

ListView.builder:
- Builds items ONLY when visible
- Reuses items when scrolling
- Efficient for large/dynamic data

This is called:
LAZY BUILDING

------------------------------------------------
🧠 HOW itemBuilder WORKS
------------------------------------------------

itemBuilder: (context, index) { ... }

- Called automatically
- index represents current item
- Only builds visible items

------------------------------------------------
🧠 PERFORMANCE RULE
------------------------------------------------

Small static list:
→ children: []

Large or dynamic list:
→ ListView.builder

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

children: [] = build everything now
builder      = build only when needed
*/
