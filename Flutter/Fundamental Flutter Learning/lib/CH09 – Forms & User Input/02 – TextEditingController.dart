/*
CH09 - 02
TextEditingController

GOAL:
- Control TextField programmatically
- Read input value
- Clear text
- Understand controller lifecycle

IMPORTANT:
Controller must be disposed to avoid memory leaks.
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
      home: ControllerDemoPage(),
    );
  }
}

/*
================================================
STATEFUL PAGE (Controller needed)
================================================
*/
class ControllerDemoPage extends StatefulWidget {
  const ControllerDemoPage({super.key});

  @override
  State<ControllerDemoPage> createState() => _ControllerDemoPageState();
}

class _ControllerDemoPageState extends State<ControllerDemoPage> {
  /*
  Controller holds and manages text.
  */
  final TextEditingController _controller = TextEditingController();

  String displayedText = '';

  @override
  void dispose() {
    /*
    VERY IMPORTANT:
    Dispose controller when widget is removed.
    Prevents memory leaks.
    */
    _controller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/02 – TextEditingController')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            /*
            TextField connected to controller.
            */
            TextField(
              controller: _controller,
              decoration: const InputDecoration(
                labelText: 'Enter something',
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                /*
                Read text from controller.
                */
                setState(() {
                  displayedText = _controller.text;
                });
              },
              child: const Text('Show Text'),
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                /*
                Clear text programmatically.
                */
                _controller.clear();

                setState(() {
                  displayedText = '';
                });
              },
              child: const Text('Clear Text'),
            ),

            const SizedBox(height: 30),

            Text(
              'You typed: $displayedText',
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
🧠 WHAT IS TextEditingController?
------------------------------------------------

Controller:
- Stores current text value
- Allows reading text
- Allows modifying text

------------------------------------------------
🧠 HOW TO READ TEXT
------------------------------------------------

_controller.text

------------------------------------------------
🧠 WHY StatefulWidget?
------------------------------------------------

Because:
- We need to manage controller lifecycle
- We need setState to update UI

------------------------------------------------
🧠 WHY dispose() IS IMPORTANT
------------------------------------------------

Controllers:
- Allocate resources
- Listen to changes internally

If not disposed:
- Memory leak risk
- Bad practice

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

TextField = UI
Controller = text manager
*/
