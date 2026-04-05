/*
CH03 - 13
Divider & Visual Separation

GOAL:
- Understand Divider widget
- Learn thickness, indent
- Learn visual grouping
- Compare Divider vs SizedBox

IMPORTANT:
Good UI is about spacing and structure.
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
      home: DividerDemoPage(),
    );
  }
}

class DividerDemoPage extends StatelessWidget {
  const DividerDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/13 – Divider')),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [
          /*
          ------------------------------------------------
          1️⃣ Basic Divider
          ------------------------------------------------
          */
          const Text('Section 1', style: TextStyle(fontSize: 18)),

          const SizedBox(height: 10),

          const Text('Item A'),
          const Divider(),
          const Text('Item B'),
          const Divider(),
          const Text('Item C'),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          2️⃣ Custom Thickness
          ------------------------------------------------
          */
          const Text('Custom Thickness', style: TextStyle(fontSize: 18)),

          const SizedBox(height: 10),

          const Divider(thickness: 3),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          3️⃣ Indented Divider
          ------------------------------------------------
          */
          const Text('Indented Divider', style: TextStyle(fontSize: 18)),

          const SizedBox(height: 10),

          const Divider(indent: 40, endIndent: 40, thickness: 2),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          4️⃣ Divider in ListTile
          ------------------------------------------------
          */
          const Text('List with Divider', style: TextStyle(fontSize: 18)),

          const SizedBox(height: 10),

          const ListTile(title: Text('Profile')),
          const Divider(height: 1),
          const ListTile(title: Text('Settings')),
          const Divider(height: 1),
          const ListTile(title: Text('Logout')),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          5️⃣ Divider vs SizedBox
          ------------------------------------------------
          */
          const Text('Spacing vs Divider', style: TextStyle(fontSize: 18)),

          const SizedBox(height: 10),

          const Text('Above'),
          const SizedBox(height: 20), // spacing only
          const Text('Below'),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Divider?
------------------------------------------------

Divider:
- Horizontal line
- Used to separate content visually

------------------------------------------------
🧠 IMPORTANT PROPERTIES
------------------------------------------------

thickness:
- Line thickness

indent:
- Left spacing before line starts

endIndent:
- Right spacing before line ends

height:
- Total vertical space occupied

------------------------------------------------
🧠 Divider vs SizedBox
------------------------------------------------

Divider:
- Visual line

SizedBox:
- Empty space

Use Divider when:
- You want separation line

Use SizedBox when:
- You only want spacing

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Spacing organizes.
Divider separates.
*/
