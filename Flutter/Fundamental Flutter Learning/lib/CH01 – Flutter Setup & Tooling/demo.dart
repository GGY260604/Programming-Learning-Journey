/*
CH01 - Flutter Setup & Tooling (Runnable Notes)

Goal of this file:
- Prove your Flutter environment works
- Teach the *minimum* Flutter structure:
  main() -> runApp() -> MyApp -> MaterialApp -> Scaffold -> UI widgets

How to run:
1) Open terminal inside: my_first_flutter_app/
2) flutter run

Important:
- This file is a NOTE + DEMO. Explanations are written as comments.
- When you edit UI code, try Hot Reload first.
*/

import 'package:flutter/material.dart';

/*
main() is the entry point, same idea as Dart.
In Flutter, we usually do:

void main() {
  runApp(MyApp());
}

runApp() takes a Widget (the root of the app).
*/
void main() {
  runApp(const MyApp());
}

/*
MyApp is a widget.
There are two common kinds of widgets:
1) StatelessWidget -> UI depends only on input, no internal changing state
2) StatefulWidget  -> UI can change over time (state changes)

We start with StatelessWidget because it's simplest.
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  /*
  build() returns a Widget tree (UI description).
  Flutter draws the screen based on the returned tree.
  */
  @override
  Widget build(BuildContext context) {
    /*
    MaterialApp:
    - sets up Material Design defaults (theme, navigation, etc.)
    - usually the top-level widget for most Flutter apps
    */
    return MaterialApp(
      debugShowCheckedModeBanner: false, // hide the red "DEBUG" banner
      title: 'CH01 Demo',

      /*
      home: is the first screen (page) shown.
      We'll use Scaffold because it's a standard page layout.
      */
      home: const HomePage(),
    );
  }
}

/*
HomePage is also a widget.
We use StatelessWidget for now.

Later in CH06, we'll learn StatefulWidget + setState
when we want the UI to change (like a counter).
*/
class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    Scaffold:
    - provides structure for a typical page
    - appBar (top bar), body (main area), floatingActionButton, etc.
    */
    return Scaffold(
      appBar: AppBar(title: const Text('CH01 - Flutter is Running ✅')),

      /*
      body: main content of the screen
      We center a small column of text.
      */
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min, // keep column as small as possible
          children: const [
            Text(
              'If you can see this, your Flutter setup works.',
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 12),
            Text(
              'Try editing this text and press Hot Reload.',
              textAlign: TextAlign.center,
            ),
            SizedBox(height: 24),
            Text(
              'Next: CH02 (Widgets & Build)',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Mini practice (do this after running once):
1) Change the AppBar title text
2) Change one of the Text widgets
3) Press Hot Reload and see it update fast (Hot Reload = ctrl + s or 'r' in terminal)
4) Then do Hot Restart and notice: it fully restarts the app

If Hot Reload doesn't apply changes sometimes:
- do Hot Restart
- or stop and run again
*/
