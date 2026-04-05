/*
CH02 - 02
What is a Widget? (Declarative UI)

GOAL of this file:
- Understand what a Widget REALLY is
- Stop thinking in terms of "drawing UI"
- Start thinking in terms of "describing UI"

IMPORTANT IDEA:
Widgets do NOT draw pixels.
Widgets DESCRIBE how the UI should look.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
1️⃣ WHAT IS A WIDGET?
------------------------------------

A Widget is:
- An IMMUTABLE object
- That DESCRIBES part of the UI

A widget is NOT:
❌ A button itself
❌ A view
❌ A rendered element on screen

A widget IS:
✅ A configuration (a description)
*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    We return MaterialApp again.
    This is still part of the "description".
    */
    return const MaterialApp(home: WidgetTreeDemoPage());
  }
}

/*
------------------------------------
2️⃣ EVERYTHING IS A WIDGET
------------------------------------

Text → Widget
Center → Widget
Padding → Widget
AppBar → Widget
Scaffold → Widget

Even invisible things (spacing, alignment) are widgets.
*/

class WidgetTreeDemoPage extends StatelessWidget {
  const WidgetTreeDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('What is a Widget?')),

      /*
      Below is a WIDGET TREE.
      Read it top → down.
      */
      body: Center(
        // Widget 1: centers its child
        child: Padding(
          // Widget 2: adds inner spacing
          padding: const EdgeInsets.all(20),
          child: Container(
            // Widget 3: visual box
            color: Colors.blue,
            padding: const EdgeInsets.all(16),
            child: const Text(
              // Widget 4: displays text
              'I am made of widgets\nstacked together',
              textAlign: TextAlign.center,
              style: TextStyle(color: Colors.white),
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------
3️⃣ DECLARATIVE UI (VERY IMPORTANT)
------------------------------------

Flutter uses DECLARATIVE UI.

Declarative means:
"You describe WHAT the UI should look like,
not HOW to draw it."

You say:
- This is a Column
- Inside it is a Text
- With this color and padding

Flutter handles:
- Layout
- Rendering
- Redrawing when needed

------------------------------------
IMPERATIVE UI (for comparison)
------------------------------------

In imperative UI, you would say:
- draw rectangle
- set color
- move position
- redraw manually

Flutter DOES NOT work like this.
*/

/*
------------------------------------
4️⃣ WIDGET TREE MENTAL MODEL
------------------------------------

Think of UI like this:

MaterialApp
 └── Scaffold
     └── Center
         └── Padding
             └── Container
                 └── Text

Each widget:
- Has ONE parent (except root)
- Can have ONE or MANY children
*/

/*
------------------------------------
✅ KEY TAKEAWAYS (READ CAREFULLY)
------------------------------------

1) Widgets are descriptions, not UI elements
2) UI = Widget Tree
3) Flutter rebuilds widgets, not pixels
4) You do NOT control drawing
5) You control configuration

If this clicks,
Flutter becomes MUCH easier.
*/
