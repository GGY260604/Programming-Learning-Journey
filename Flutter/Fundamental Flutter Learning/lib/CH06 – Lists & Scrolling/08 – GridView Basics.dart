/*
CH06 - 08
GridView Basics

GOAL:
- Understand GridView
- Learn gridDelegate
- Understand crossAxisCount
- Build 2D scrolling layout

IMPORTANT:
GridView arranges items in rows AND columns.
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
      home: GridViewPage(),
    );
  }
}

class GridViewPage extends StatelessWidget {
  const GridViewPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/08 – GridView Basics')),

      /*
      GridView is scrollable by default.
      */
      body: GridView.builder(
        /*
        gridDelegate defines grid layout rules.
        */
        gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
          /*
          Number of items per row.
          */
          crossAxisCount: 3,

          /*
          Space between rows.
          */
          mainAxisSpacing: 10,

          /*
          Space between columns.
          */
          crossAxisSpacing: 10,

          /*
          Controls item height relative to width.
          1 = square.
          */
          childAspectRatio: 1,
        ),

        itemCount: 30,

        itemBuilder: (context, index) {
          return Container(
            color: Colors.blue,
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
🧠 WHAT IS GridView?
------------------------------------------------

GridView:
- Scrollable layout
- 2D arrangement
- Items in rows and columns

------------------------------------------------
🧠 gridDelegate EXPLAINED
------------------------------------------------

SliverGridDelegateWithFixedCrossAxisCount

crossAxisCount:
- Number of columns

mainAxisSpacing:
- Vertical spacing

crossAxisSpacing:
- Horizontal spacing

childAspectRatio:
- width / height ratio
- 1 → square
- 2 → wider
- 0.5 → taller

------------------------------------------------
🧠 DIFFERENCE FROM ListView
------------------------------------------------

ListView:
- 1D layout
- Vertical or horizontal

GridView:
- 2D layout
- Rows + columns

------------------------------------------------
🧠 CONSTRAINT BEHAVIOR
------------------------------------------------

GridView:
- Scroll direction = vertical (default)
- Height unbounded (scroll direction)
- Width constrained by screen

Same rule as ListView.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

ListView = single column scroll
GridView = multi-column scroll
*/
