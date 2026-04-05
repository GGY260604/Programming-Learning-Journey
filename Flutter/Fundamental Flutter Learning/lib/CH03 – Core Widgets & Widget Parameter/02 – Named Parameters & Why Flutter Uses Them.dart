/*
CH03 - 02
Named Parameters & Why Flutter Uses Them

GOAL:
- Understand named parameters clearly
- Understand why Flutter uses them heavily
- See readability advantage
- Understand required keyword

IMPORTANT:
Flutter APIs are designed for READABILITY.
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
      home: NamedParameterPage(),
    );
  }
}

class NamedParameterPage extends StatelessWidget {
  const NamedParameterPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/02 – Named Parameters')),
      body: Center(
        child: Container(
          /*
          These are NAMED parameters.

          Notice how readable this is.
          */
          width: 200,
          height: 100,
          padding: const EdgeInsets.all(12),
          alignment: Alignment.center,
          color: Colors.blue,
          child: const Text(
            'Named parameters\nmake this readable.',
            textAlign: TextAlign.center,
            style: TextStyle(color: Colors.white),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT ARE NAMED PARAMETERS?
------------------------------------------------

In Dart, you can define constructors like this:

Container({
  double? width,
  double? height,
  EdgeInsets? padding,
  Widget? child,
})

Notice the { } → this means named parameters.

You MUST write:

Container(
  width: 200,
  height: 100,
)

------------------------------------------------
🧠 WHY FLUTTER USES NAMED PARAMETERS
------------------------------------------------

Imagine if Container was positional:

Container(200, 100, 12, Alignment.center, Colors.blue, child)

You would not know:
- What 200 means
- What 12 means
- What order is correct

Named parameters solve this.

Flutter widgets often have MANY properties.
Named parameters make them:

✔ Clear
✔ Self-documenting
✔ Safer

------------------------------------------------
🧠 REQUIRED NAMED PARAMETERS
------------------------------------------------

Example:
Text({required String data})

This forces you to provide:

Text("Hello")

Some parameters are required.
Some are optional.

------------------------------------------------
🧠 OPTIONAL PARAMETERS
------------------------------------------------

Example:
Container({
  double? width,
  double? height,
})

You can omit them.

If omitted:
- Default behavior applies.

------------------------------------------------
🧠 READABILITY ADVANTAGE
------------------------------------------------

Flutter code reads almost like English:

Container(
  padding: EdgeInsets.all(12),
  alignment: Alignment.center,
  color: Colors.blue,
)

You are describing configuration clearly.

------------------------------------------------
❌ COMMON BEGINNER CONFUSION
------------------------------------------------

❌ Thinking order matters
→ It does NOT (for named parameters)

❌ Thinking everything must be provided
→ Only required ones must be provided

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Named parameters = readable configuration

Flutter widgets are designed
to be readable configuration objects.
*/
