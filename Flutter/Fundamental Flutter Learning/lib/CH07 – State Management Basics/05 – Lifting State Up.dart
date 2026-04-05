/*
CH07 - 05
Lifting State Up

GOAL:
- Understand duplicated state problem
- Learn proper data flow
- See lifting state up in action
- Build architecture thinking

IMPORTANT:
State should live in the closest common ancestor.
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
      home: LiftStatePage(),
    );
  }
}

/*
================================================
PARENT (STATE OWNER)
================================================

This widget owns the state.
*/
class LiftStatePage extends StatefulWidget {
  const LiftStatePage({super.key});

  @override
  State<LiftStatePage> createState() => _LiftStatePageState();
}

class _LiftStatePageState extends State<LiftStatePage> {
  int counter = 0;

  void increase() {
    setState(() {
      counter++;
    });
  }

  void decrease() {
    setState(() {
      counter--;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH07/05 – Lifting State Up')),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          /*
          Child 1: Display
          */
          CounterDisplay(value: counter),

          const SizedBox(height: 20),

          /*
          Child 2: Buttons
          */
          CounterControls(onIncrease: increase, onDecrease: decrease),
        ],
      ),
    );
  }
}

/*
================================================
STATELESS DISPLAY
================================================
*/
class CounterDisplay extends StatelessWidget {
  final int value;

  const CounterDisplay({super.key, required this.value});

  @override
  Widget build(BuildContext context) {
    return Text('Counter: $value', style: const TextStyle(fontSize: 24));
  }
}

/*
================================================
STATELESS CONTROLS
================================================

Notice:
This widget does NOT have state.
It receives callbacks from parent.
*/
class CounterControls extends StatelessWidget {
  final VoidCallback onIncrease;
  final VoidCallback onDecrease;

  const CounterControls({
    super.key,
    required this.onIncrease,
    required this.onDecrease,
  });

  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        ElevatedButton(onPressed: onDecrease, child: const Text('-')),

        const SizedBox(width: 20),

        ElevatedButton(onPressed: onIncrease, child: const Text('+')),
      ],
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS LIFTING STATE UP?
------------------------------------------------

Instead of:
Each child having its own state

We:
Move state to common parent
Pass data down
Pass callbacks up

------------------------------------------------
🧠 DATA FLOW
------------------------------------------------

State flows DOWN:
Parent → Child

Events flow UP:
Child → Parent (via callback)

------------------------------------------------
🧠 WHY THIS IS IMPORTANT
------------------------------------------------

If each child had its own counter:
They would not stay synchronized.

By lifting state up:
Single source of truth.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

State lives in:
Closest common ancestor.

Children:
Receive data
Send events upward
*/
