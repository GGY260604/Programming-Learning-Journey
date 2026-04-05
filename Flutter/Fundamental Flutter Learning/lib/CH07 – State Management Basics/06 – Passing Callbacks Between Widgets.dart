/*
CH07 - 06
Passing Callbacks Between Widgets

GOAL:
- Understand callbacks clearly
- Understand function types
- Understand VoidCallback
- See event flow

IMPORTANT:
A callback is a function passed as a parameter.
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
      home: CallbackDemoPage(),
    );
  }
}

/*
================================================
PARENT (OWNS STATE)
================================================
*/
class CallbackDemoPage extends StatefulWidget {
  const CallbackDemoPage({super.key});

  @override
  State<CallbackDemoPage> createState() => _CallbackDemoPageState();
}

class _CallbackDemoPageState extends State<CallbackDemoPage> {
  int counter = 0;

  /*
  This is a function.
  */
  void increaseCounter() {
    setState(() {
      counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH07/06 – Callbacks')),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Text('Counter: $counter', style: const TextStyle(fontSize: 24)),

          const SizedBox(height: 20),

          /*
          We pass a function to child.
          */
          ActionButton(onTap: increaseCounter),
        ],
      ),
    );
  }
}

/*
================================================
CHILD WIDGET
================================================

This widget receives a callback.
*/
class ActionButton extends StatelessWidget {
  /*
  VoidCallback is:
  void Function()

  Meaning:
  - Takes no parameters
  - Returns nothing
  */
  final VoidCallback onTap;

  const ActionButton({super.key, required this.onTap});

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      /*
      We DO NOT call onTap here.
      We pass it to onPressed.
      */
      onPressed: onTap,
      child: const Text('Increase'),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS A CALLBACK?
------------------------------------------------

A callback is:

A function passed to another widget
to be called later.

------------------------------------------------
🧠 IMPORTANT DIFFERENCE
------------------------------------------------

WRONG:
onPressed: onTap()

This calls function immediately.

CORRECT:
onPressed: onTap

This passes function reference.

------------------------------------------------
🧠 WHY CALLBACKS EXIST
------------------------------------------------

Child does not own state.

Child says:
"Parent, something happened."

Parent decides:
"What to do about it."

------------------------------------------------
🧠 FUNCTION TYPES
------------------------------------------------

VoidCallback:
void Function()

You can also define:

final Function(int) onValueChanged;

Meaning:
Function that takes an int.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

State flows DOWN.
Events flow UP.

Callbacks allow upward communication.
*/
