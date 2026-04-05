/*
CH07 - 04
Stateless vs Stateful (Deep Comparison)

GOAL:
- Understand difference clearly
- See both in same file
- Learn when to use which
- Understand architecture thinking

IMPORTANT:
Stateful is NOT more powerful.
It just manages state.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
================================================
APP ROOT (Stateless)
================================================
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ComparisonPage(),
    );
  }
}

/*
================================================
MAIN PAGE (Stateful)
================================================

This widget manages state.
*/
class ComparisonPage extends StatefulWidget {
  const ComparisonPage({super.key});

  @override
  State<ComparisonPage> createState() => _ComparisonPageState();
}

class _ComparisonPageState extends State<ComparisonPage> {
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH07/04 – Stateless vs Stateful')),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          /*
          This is a Stateless child.
          It receives data from parent.
          */
          CounterDisplay(value: counter),

          const SizedBox(height: 20),

          ElevatedButton(
            onPressed: () {
              setState(() {
                counter++;
              });
            },
            child: const Text('Increase'),
          ),
        ],
      ),
    );
  }
}

/*
================================================
STATELESS CHILD WIDGET
================================================

This widget does NOT manage state.
It only displays data.
*/
class CounterDisplay extends StatelessWidget {
  final int value;

  const CounterDisplay({super.key, required this.value});

  @override
  Widget build(BuildContext context) {
    return Container(
      color: Colors.blue,
      child: Text('Counter: $value', style: const TextStyle(fontSize: 24)),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS StatelessWidget?
------------------------------------------------

StatelessWidget:
- No internal mutable state
- Cannot call setState
- Rebuilds when parent rebuilds
- Pure UI representation

------------------------------------------------
🧠 WHAT IS StatefulWidget?
------------------------------------------------

StatefulWidget:
- Has mutable state
- Has associated State class
- Can call setState()
- Controls dynamic behavior

------------------------------------------------
🧠 IMPORTANT ARCHITECTURE IDEA
------------------------------------------------

Stateful manages state.
Stateless displays UI.

Best practice:
Keep most widgets Stateless.
Only make Stateful when needed.

------------------------------------------------
🧠 WHY?
------------------------------------------------

Stateless:
- Simpler
- Predictable
- Easier to test
- Cleaner architecture

Stateful:
- Used only when data changes internally

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Stateful = manager
Stateless = presenter

State flows down.
UI reflects state.
*/
