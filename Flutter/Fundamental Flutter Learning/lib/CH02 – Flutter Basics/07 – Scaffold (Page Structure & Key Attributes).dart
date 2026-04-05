/*
CH02 - 07
Scaffold – Page Structure & Key Attributes (Preview)

GOAL:
- Visually PREVIEW all major Scaffold attributes
- Understand WHAT each attribute is responsible for
- NOT deep behavior, just structural understanding

Scaffold represents ONE PAGE (screen).
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
MaterialApp (app-level wrapper)
------------------------------------
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ScaffoldPreviewPage(),
    );
  }
}

/*
------------------------------------
ScaffoldPreviewPage
------------------------------------

This page PREVIEWS:
- appBar
- body
- floatingActionButton
- drawer
- bottomNavigationBar
- backgroundColor
*/
class ScaffoldPreviewPage extends StatelessWidget {
  const ScaffoldPreviewPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      /*
      ------------------------------------
      backgroundColor
      ------------------------------------

      Controls the background of the WHOLE page.
      */
      backgroundColor: Colors.grey.shade200,

      /*
      ------------------------------------
      appBar (top bar)
      ------------------------------------

      Displays at the TOP of the page.
      Usually contains:
      - title
      - actions
      */
      appBar: AppBar(
        title: const Text('Scaffold Preview'),
        actions: [
          IconButton(
            icon: const Icon(Icons.info),
            onPressed: () {
              debugPrint('AppBar action pressed');
            },
          ),
        ],
      ),

      /*
      ------------------------------------
      body (main content area)
      ------------------------------------

      This is where MOST UI goes.
      */
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: const [
            Text(
              'Scaffold Body',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 12),
            Text(
              'This is the main content area.\n'
              'Everything below AppBar lives here.',
            ),
          ],
        ),
      ),

      /*
      ------------------------------------
      floatingActionButton (FAB)
      ------------------------------------

      A floating circular button.
      Used for the PRIMARY action of the page.
      */
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          debugPrint('FloatingActionButton pressed');
        },
        child: const Icon(Icons.add),
      ),

      /*
      ------------------------------------
      drawer (side menu)
      ------------------------------------

      Slides in from the LEFT.
      Usually used for navigation.
      */
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: const [
            DrawerHeader(
              decoration: BoxDecoration(color: Colors.blue),
              child: Text(
                'Drawer Header',
                style: TextStyle(color: Colors.white),
              ),
            ),
            ListTile(leading: Icon(Icons.home), title: Text('Home')),
            ListTile(leading: Icon(Icons.settings), title: Text('Settings')),
          ],
        ),
      ),

      /*
      ------------------------------------
      bottomNavigationBar
      ------------------------------------

      Fixed bar at the BOTTOM of the page.
      Often used for tab navigation.
      */
      bottomNavigationBar: BottomNavigationBar(
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Home'),
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Profile'),
        ],
      ),
    );
  }
}

/*
------------------------------------
🧠 VISUAL SUMMARY (IMPORTANT)
------------------------------------

Scaffold Layout:

┌────────────────────────────┐
│ appBar                     │
├────────────────────────────┤
│                            │
│ body                       │
│                            │
├────────────────────────────┤
│ bottomNavigationBar        │
└────────────────────────────┘

floatingActionButton floats ABOVE body
drawer slides from the SIDE
backgroundColor fills everything
*/

/*
------------------------------------
🧠 FINAL MENTAL MODEL
------------------------------------

MaterialApp → defines the APP
Scaffold     → defines ONE PAGE

Scaffold attributes = page structure slots

You do NOT put:
- multiple pages
- navigation logic
inside Scaffold (yet)

Scaffold = layout skeleton only.
*/
