/*
CH06 - 06
ListView.separated (Clean Separators)

GOAL:
- Understand ListView.separated
- Learn how separatorBuilder works
- Improve list design
- Compare with manual Divider usage

IMPORTANT:
separated = cleaner way to insert dividers.
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
      home: ListSeparatedPage(),
    );
  }
}

class ListSeparatedPage extends StatelessWidget {
  const ListSeparatedPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/06 – ListView.separated')),

      body: ListView.separated(
        /*
        How many items in the list.
        */
        itemCount: 20,

        /*
        Builds each list item.
        */
        itemBuilder: (context, index) {
          return ListTile(
            leading: const Icon(Icons.person),
            title: Text('User ${index + 1}'),
            subtitle: const Text('Tap to view profile'),
            onTap: () {
              debugPrint('Tapped item ${index + 1}');
            },
          );
        },

        /*
        Builds the separator between items.
        This is called between each item.
        */
        separatorBuilder: (context, index) {
          return const Divider(thickness: 1, height: 1);
        },
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHY NOT JUST ADD Divider MANUALLY?
------------------------------------------------

You could do:

ListView(
  children: [
    ListTile(),
    Divider(),
    ListTile(),
    Divider(),
  ]
)

But this:
- Is repetitive
- Harder to manage
- Error-prone

------------------------------------------------
🧠 HOW separated WORKS
------------------------------------------------

ListView.separated(
  itemBuilder,
  separatorBuilder,
)

Flutter automatically inserts separators
between items.

If itemCount = 20
separatorBuilder runs 19 times.

------------------------------------------------
🧠 WHEN TO USE separated
------------------------------------------------

Use when:
- You need dividers
- You need consistent spacing
- You want clean structure

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

ListView.builder = build items
ListView.separated = build items + separators cleanly
*/
