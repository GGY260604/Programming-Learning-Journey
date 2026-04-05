/*
CH16 - 05
List Performance Discipline

GOAL:
- Understand why ListView.builder is important
- Avoid building large lists eagerly
- Learn basic list performance rules

CORE IDEA:

Bad:
Column(
  children: largeList.map(...).toList()
)

→ Builds EVERYTHING immediately
→ High memory usage
→ Slow for large data

Good:
ListView.builder()

→ Builds items lazily
→ Only visible items are built
→ Scales to thousands of rows

Mental Model:
ListView.builder = lazy rendering
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ListPerformancePage(),
    ),
  );
}

class ListPerformancePage extends StatelessWidget {
  const ListPerformancePage({super.key});

  final int itemCount = 1000;

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 ListPerformancePage rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH16/05 – List Performance")),
      body: ListView.builder(
        itemCount: itemCount,
        itemBuilder: (context, index) {
          debugPrint("Building item $index");

          return ListTile(title: Text("Item $index"));
        },
      ),
    );
  }
}

/*
Observe console:

You will NOT see:
Building item 0 → 999 immediately.

You will see:
Only visible items built first.
As you scroll, new items build lazily.

Rules for List Performance:

1) Use ListView.builder for large lists
2) Avoid expensive logic inside itemBuilder
3) Use const widgets when possible
4) Split complex list items into smaller widgets
5) Use keys when list order changes

Now you understand:
- Rebuild behavior
- const optimization
- Rebuild boundaries
- Keys
- Lazy list rendering

You are now performance-aware at intermediate level.
*/
