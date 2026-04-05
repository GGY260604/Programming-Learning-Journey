/*
CH08 - 02
Navigator.push & pop (Basic)

GOAL:
- Navigate from Page 1 -> Page 2 using push
- Go back using pop
- Understand navigation stack visually

IMPORTANT:
push = go to next page (stack grows)
pop  = go back (stack shrinks)
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
class FirstPage extends StatelessWidget {
  const FirstPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/02 – Page 1')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Navigator.push:
            - Pushes a new route (page) onto the stack
            - The new page becomes visible (on top)

            MaterialPageRoute:
            - A route that shows a Material-style page transition
            */
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => const SecondPage()),
            );
          },
          child: const Text('Go to Page 2'),
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
      appBar: AppBar(title: const Text('CH08/02 – Page 2')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Navigator.pop:
            - Removes the top page from stack
            - Reveals the previous page
            */
            Navigator.pop(context);
          },
          child: const Text('Back to Page 1'),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT JUST HAPPENED?
------------------------------------------------

Start:
[ Page 1 ]

Press "Go to Page 2" (push):
[ Page 1 ]
[ Page 2 ]

Press "Back to Page 1" (pop):
[ Page 1 ]

------------------------------------------------
🧠 WHY DO WE NEED context?
------------------------------------------------

Navigator is found using context.

context tells Flutter:
"Where am I in the widget tree?"

Flutter uses it to find:
Navigator (provided by MaterialApp)

So:
Navigator.push(context, ...)
Navigator.pop(context)

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

push → add page to stack
pop  → remove page from stack
*/
