/*
CH09 - 03
Handling Input Changes (onChanged)

GOAL:
- Listen to input while user types
- Update UI instantly
- Compare onChanged vs controller

IMPORTANT:
onChanged triggers every time text changes.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App root
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: OnChangedDemoPage(),
    );
  }
}

/*
================================================
STATEFUL PAGE
================================================
*/
class OnChangedDemoPage extends StatefulWidget {
  const OnChangedDemoPage({super.key});

  @override
  State<OnChangedDemoPage> createState() => _OnChangedDemoPageState();
}

class _OnChangedDemoPageState extends State<OnChangedDemoPage> {
  String liveText = '';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/03 – onChanged')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            /*
            TextField using onChanged.
            */
            TextField(
              decoration: const InputDecoration(
                labelText: 'Type something',
                border: OutlineInputBorder(),
              ),

              /*
              onChanged gives current text.
              */
              onChanged: (value) {
                setState(() {
                  liveText = value;
                });
              },
            ),

            const SizedBox(height: 30),

            Text(
              'Live preview: $liveText',
              style: const TextStyle(fontSize: 20),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS onChanged?
------------------------------------------------

onChanged:
- Callback
- Runs every time text changes
- Provides current text as parameter

------------------------------------------------
🧠 WHEN DOES IT RUN?
------------------------------------------------

Every:
- Character typed
- Character deleted
- Paste action

------------------------------------------------
🧠 CONTROLLER vs onChanged
------------------------------------------------

Controller:
- Gives full control
- Can read, set, clear text
- Requires dispose()

onChanged:
- Lightweight
- Good for simple live updates
- No controller needed

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Controller = full control
onChanged = event listener
*/
