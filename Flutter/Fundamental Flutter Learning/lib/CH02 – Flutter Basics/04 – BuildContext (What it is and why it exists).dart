/*
CH02 - 04
BuildContext (What it is and why it exists)

GOAL of this file:
- Understand what BuildContext really represents
- Stop treating context as "magic"
- Learn the correct mental model for context

VERY IMPORTANT:
BuildContext is NOT data.
BuildContext is NOT UI.
BuildContext represents POSITION in the widget tree.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
1️⃣ WHAT IS BuildContext?
------------------------------------

BuildContext is an object that:
- Knows WHERE a widget is in the widget tree
- Allows a widget to look UP the tree
- Helps Flutter connect widgets together

Think of BuildContext as:
"My location in the UI tree"
*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    This context belongs to MyApp.
    It represents MyApp's position in the tree.
    */

    return const MaterialApp(
      home: ContextDemoPage(),
    );
  }
}

class ContextDemoPage extends StatelessWidget {
  const ContextDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    This context belongs to ContextDemoPage.
    It is DIFFERENT from MyApp's context.
    */

    return Scaffold(
      appBar: AppBar(
        title: const Text('BuildContext'),
      ),
      body: Center(
        child: Text(
          /*
          Theme.of(context):

          - Uses context to search UP the widget tree
          - Finds the nearest Theme widget
          - Retrieves styling information

          This works ONLY because:
          - This context is BELOW MaterialApp
          */
          'Context knows where I am',
          style: Theme.of(context).textTheme.titleMedium,
        ),
      ),
    );
  }
}

/*
------------------------------------
2️⃣ WHY DOES CONTEXT DEPEND ON LOCATION?
------------------------------------

Widget tree (simplified):

MaterialApp
 └── Theme
     └── Scaffold
         └── ContextDemoPage
             └── Text

When you call:
Theme.of(context)

Flutter:
- Starts at current context
- Walks UP the tree
- Finds nearest Theme widget
*/

/*
------------------------------------
3️⃣ COMMON BEGINNER MISTAKES
------------------------------------

❌ Treating context like global data
❌ Storing context and using it later
❌ Using wrong context (above MaterialApp)

Context is TEMPORARY.
Use it only inside build() or callbacks.
*/

/*
------------------------------------
4️⃣ SIMPLE RULE TO REMEMBER
------------------------------------

BuildContext =
"Where am I in the widget tree?"

If you remember this,
90% of context confusion disappears.
*/

/*
------------------------------------
5️⃣ WHY FLUTTER DESIGNED IT THIS WAY
------------------------------------

Context allows:
- Decoupled widgets
- Reusable widgets
- Parent-provided data (themes, localization, navigation)

Widgets don't need global variables.
They use context instead.
*/

/*
------------------------------------
✅ KEY TAKEAWAYS
------------------------------------

1) BuildContext represents widget position
2) Different widgets = different contexts
3) Context lets widgets access ancestors
4) Context is NOT stored, only used temporarily

NEXT:
Now that we understand widgets, build(), and context,
we can talk about STATE.
*/
