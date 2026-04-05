/*
CH06 - 05
ListTile (Standard List Item UI)

GOAL:
- Understand ListTile structure
- Learn common properties
- Understand interactive behavior
- See how it simplifies list UI

IMPORTANT:
ListTile is a pre-designed list row widget.
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
      home: ListTilePage(),
    );
  }
}

class ListTilePage extends StatelessWidget {
  const ListTilePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH06/05 – ListTile')),

      /*
      ListView used because we want scrolling.
      */
      body: ListView(
        children: [
          /*
          ------------------------------------------------
          1️⃣ Basic ListTile
          ------------------------------------------------
          */
          const ListTile(title: Text('Basic Item')),

          const Divider(),

          /*
          ------------------------------------------------
          2️⃣ Leading Icon
          ------------------------------------------------
          */
          const ListTile(leading: Icon(Icons.person), title: Text('Profile')),

          const Divider(),

          /*
          ------------------------------------------------
          3️⃣ Subtitle
          ------------------------------------------------
          */
          const ListTile(
            leading: Icon(Icons.email),
            title: Text('Email'),
            subtitle: Text('example@email.com'),
          ),

          const Divider(),

          /*
          ------------------------------------------------
          4️⃣ Trailing Widget
          ------------------------------------------------
          */
          const ListTile(
            leading: Icon(Icons.notifications),
            title: Text('Notifications'),
            trailing: Icon(Icons.arrow_forward_ios),
          ),

          const Divider(),

          /*
          ------------------------------------------------
          5️⃣ Interactive ListTile
          ------------------------------------------------
          */
          ListTile(
            leading: const Icon(Icons.settings),
            title: const Text('Settings'),
            trailing: const Icon(Icons.arrow_forward_ios),
            onTap: () {
              /*
              Called when user taps this tile.
              */
              debugPrint('Settings tapped');
            },
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS ListTile?
------------------------------------------------

ListTile is a row-based widget designed for lists.

Internally, it arranges:

[leading]  [title + subtitle]  [trailing]

------------------------------------------------
🧠 COMMON PROPERTIES
------------------------------------------------

title      → main text
subtitle   → secondary text
leading    → left widget (usually icon or avatar)
trailing   → right widget (icon, switch, etc)
onTap      → makes tile clickable

------------------------------------------------
🧠 WHY ListTile EXISTS
------------------------------------------------

Instead of writing:

Row(
  children: [...]
)

Flutter provides ListTile to:
- Save time
- Keep consistent design
- Follow Material guidelines

------------------------------------------------
🧠 INTERACTIVE BEHAVIOR
------------------------------------------------

If onTap is provided:
- Tile becomes clickable
- Ripple effect appears
- It behaves like a button

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

ListTile = standardized list row layout

Use for:
- Menus
- Settings
- Contact lists
- Simple structured rows
*/
