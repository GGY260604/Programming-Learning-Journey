/*
CH07 - 07
Common State Mistakes

GOAL:
- Identify common beginner mistakes
- Learn correct patterns
- Avoid rebuild issues
- Strengthen state thinking

IMPORTANT:
State must be updated correctly and in correct place.
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
      home: StateMistakePage(),
    );
  }
}

class StateMistakePage extends StatefulWidget {
  const StateMistakePage({super.key});

  @override
  State<StateMistakePage> createState() => _StateMistakePageState();
}

class _StateMistakePageState extends State<StateMistakePage> {
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH07/07 – Common State Mistakes')),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Text('Counter: $counter', style: const TextStyle(fontSize: 24)),

          const SizedBox(height: 20),

          ElevatedButton(
            onPressed: () {
              /*
              MISTAKE 1:
              Updating state WITHOUT setState

              If you write:
              counter++;

              UI will NOT update.
              */

              setState(() {
                counter++;
              });
            },
            child: const Text('Increase Correctly'),
          ),

          const SizedBox(height: 10),

          ElevatedButton(
            onPressed: () {
              /*
              MISTAKE 2:
              Calling setState but NOT changing state.

              setState(() {});
              This rebuilds but does nothing useful.
              */

              setState(() {});
            },
            child: const Text('Rebuild Without Change'),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 COMMON STATE MISTAKES
------------------------------------------------

❌ 1️⃣ Updating state without setState

counter++;
→ UI will NOT update.

Correct:
setState(() {
  counter++;
});

------------------------------------------------
❌ 2️⃣ Calling setState but not changing state

setState(() {});

This causes rebuild but no actual change.
Wasteful.

------------------------------------------------
❌ 3️⃣ Putting state in wrong widget

If state belongs to parent,
do NOT put it inside child.

Use lifting state up.

------------------------------------------------
❌ 4️⃣ Heavy logic inside build()

build() should:
- Return UI
- Be fast
- Not contain heavy computation

------------------------------------------------
❌ 5️⃣ Infinite rebuild

Calling setState inside build():
This creates rebuild loop.

Never do this:

@override
Widget build(BuildContext context) {
  setState(() {});
  return ...
}

------------------------------------------------
🎯 FINAL STATE RULES
------------------------------------------------

Rule 1:
State must change inside setState.

Rule 2:
Keep state in proper level.

Rule 3:
build() should be pure UI.

Rule 4:
Rebuild is normal, abuse is not.
*/
