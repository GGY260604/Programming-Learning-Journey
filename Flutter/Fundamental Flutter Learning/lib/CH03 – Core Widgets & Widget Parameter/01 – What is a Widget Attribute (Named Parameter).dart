/*
CH03 - 01
What is a Widget Attribute?

This file answers:
- What is an attribute (property)?
- Why widgets have attributes
- How attributes affect UI
- How to READ widget code without panic

IMPORTANT:
- Attributes are NOT magic.
- They are just named inputs to a widget.
- Attributes are named parameters. Some accept widgets 
  (e.g., child), many accept values (e.g., color, padding).
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
Widget WITHOUT attributes
------------------------------------

This widget has:
- no color
- no alignment
- no padding

It uses DEFAULT values.
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: AttributeDemoPage());
  }
}

class AttributeDemoPage extends StatelessWidget {
  const AttributeDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Widget Attributes – Basics')),

      /*
      Container WITH attributes
      */
      body: Container(
        /*
        ATTRIBUTE: color
        - Controls background color
        */
        color: Colors.grey.shade300,

        /*
        ATTRIBUTE: alignment
        - Controls where child is placed
        */
        alignment: Alignment.center,

        /*
        ATTRIBUTE: child
        - The widget inside this widget
        */
        child: Container(
          width: 200,
          height: 120,

          /*
          ATTRIBUTE: color
          */
          color: Colors.blue,

          /*
          ATTRIBUTE: alignment
          */
          alignment: Alignment.center,

          /*
          ATTRIBUTE: child
          */
          child: const Text(
            'I am controlled\nby attributes',
            textAlign: TextAlign.center,
            style: TextStyle(color: Colors.white, fontSize: 16),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------
🧠 CORE IDEA (READ THIS CAREFULLY)
------------------------------------

Widget(attributes...)

Examples:
Container(
  color: Colors.blue,
  alignment: Alignment.center,
  child: Text(...)
)

- "color" is an attribute
- "alignment" is an attribute
- "child" is an attribute

Attributes:
- are named parameters
- configure HOW a widget behaves or looks
- do NOT execute logic
- only DESCRIBE UI

MENTAL MODEL:
Widget = function
Attributes = arguments
*/
