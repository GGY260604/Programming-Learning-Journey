/*
CH08 - 04
Returning Data from Next Page

GOAL:
- Return data using Navigator.pop(result)
- Use await with Navigator.push
- Understand navigation returns a Future

IMPORTANT:
Navigator.push returns a Future.
When page pops, that Future completes.
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
      home: FirstPage(),
    );
  }
}

/*
================================================
PAGE 1
================================================
*/
class FirstPage extends StatefulWidget {
  const FirstPage({super.key});

  @override
  State<FirstPage> createState() => _FirstPageState();
}

class _FirstPageState extends State<FirstPage> {
  String? selectedValue;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/04 – Page 1')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              selectedValue == null
                  ? 'No selection yet'
                  : 'Selected: $selectedValue',
              style: const TextStyle(fontSize: 20),
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () async {
                /*
                Navigator.push returns a Future.
                We use await to wait for result.
                */

                final result = await Navigator.push<String>(
                  context,
                  MaterialPageRoute(builder: (context) => const SecondPage()),
                );

                /*
                When SecondPage calls pop(result),
                this result receives the value.
                */

                if (result != null) {
                  setState(() {
                    selectedValue = result;
                  });
                }
              },
              child: const Text('Choose Option'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
================================================
PAGE 2
================================================
*/
class SecondPage extends StatelessWidget {
  const SecondPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/04 – Page 2')),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          const Text(
            'Select an option:',
            style: TextStyle(fontSize: 20),
            textAlign: TextAlign.center,
          ),

          const SizedBox(height: 20),

          ElevatedButton(
            onPressed: () {
              /*
              pop with result.
              */
              Navigator.pop(context, 'Option A');
            },
            child: const Text('Option A'),
          ),

          const SizedBox(height: 10),

          ElevatedButton(
            onPressed: () {
              Navigator.pop(context, 'Option B');
            },
            child: const Text('Option B'),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT JUST HAPPENED?
------------------------------------------------

Page 1:
await Navigator.push()

Page 2:
Navigator.pop(context, 'Option A')

When pop is called:
- Page 2 removed from stack
- Future completes
- Result is returned to Page 1

------------------------------------------------
🧠 WHY async / await?
------------------------------------------------

Navigator.push returns Future<T>

Future completes when page pops.

So we must use:
await Navigator.push(...)

------------------------------------------------
🧠 TYPE SAFETY
------------------------------------------------

Navigator.push<String>

This tells Flutter:
"We expect a String result."

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

push → returns Future
pop(result) → completes Future
await → receive result
*/
