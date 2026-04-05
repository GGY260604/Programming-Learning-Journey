/*
CH02 - 05
StatefulWidget Overview (What "state" means)

GOAL of this file:
- Understand what "state" is
- Understand WHY StatefulWidget exists
- Understand the relationship:
  UI = function(state)

IMPORTANT:
This file is CONCEPTUAL.
We are NOT deep-diving into state management yet.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
1️⃣ WHAT IS "STATE"?
------------------------------------

State = data that can CHANGE
and affects what the UI looks like.

Examples of state:
- counter value
- checkbox checked / unchecked
- text input
- selected item

If data changes AND UI should update,
that data is called STATE.
*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: StateConceptPage());
  }
}

/*
------------------------------------
2️⃣ WHY StatelessWidget IS NOT ENOUGH
------------------------------------

StatelessWidget:
- UI does NOT depend on changing data
- build() always returns the same UI

But many apps need:
- buttons that change text
- counters
- toggles
- forms

That is why StatefulWidget exists.
*/

class StateConceptPage extends StatefulWidget {
  const StateConceptPage({super.key});

  /*
  createState() links:
  - the widget (configuration)
  - the State object (data + logic)

  You don't need to fully understand this yet.
  Just know:
  StatefulWidget ALWAYS has a State class.
  */
  @override
  State<StateConceptPage> createState() => _StateConceptPageState();
}

/*
------------------------------------
3️⃣ THE State CLASS
------------------------------------

This class holds:
- mutable data (state)
- logic that changes state
- build() that uses state to produce UI
*/

class _StateConceptPageState extends State<StateConceptPage> {
  /*
  This is STATE.
  It can change over time.
  */
  int counter = 0;

  /*
  ------------------------------------
  4️⃣ setState() – CONCEPTUAL PREVIEW
  ------------------------------------

  setState():
  - inherited method from State class
  - tells Flutter: "my state changed"
  - Flutter will call build() again
  - UI updates to reflect new state

  VERY IMPORTANT:
  setState does NOT update UI directly.
  It triggers a rebuild.
  */

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('StatefulWidget Overview')),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            const Text('Counter value (state):'),
            Text('$counter', style: const TextStyle(fontSize: 32)),
            const SizedBox(height: 16),

            ElevatedButton(
              onPressed: () {
                /*
                When button is pressed:
                - counter changes
                - setState tells Flutter to rebuild
                */
                setState(() {
                  counter++;
                });
              },
              child: const Text('Increment'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------
🧠 CORE MENTAL MODEL (CRITICAL)
------------------------------------

UI = function(state)

When state changes:
- build() runs again
- new widget tree is produced
- Flutter updates the screen

StatelessWidget:
UI = function(nothing changes)

StatefulWidget:
UI = function(state)
*/

/*
------------------------------------
5️⃣ VERY IMPORTANT CLARIFICATION
------------------------------------

State is NOT:
❌ UI elements
❌ Widgets
❌ BuildContext

State IS:
✅ plain Dart data
✅ values that change
*/

/*
------------------------------------
✅ KEY TAKEAWAYS
------------------------------------

1) State = data that changes UI
2) StatefulWidget exists to handle state
3) setState triggers rebuild
4) build() uses current state

NEXT:
Now that we know what STATE is,
we can understand APP-level structure.
*/
