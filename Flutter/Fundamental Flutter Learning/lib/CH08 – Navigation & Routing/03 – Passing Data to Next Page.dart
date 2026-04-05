/*
CH08 - 03
Passing Data to Next Page

GOAL:
- Pass data from Page 1 to Page 2
- Use constructor parameters for passing data
- Connect to "widgets are configuration"

IMPORTANT:
In Flutter, the common way to pass data is:
- Create the next page widget
- Pass arguments through its constructor
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
    /*
    These values are data we want to send to Page 2.
    In real apps, these could come from:
    - user selection
    - API response
    - list item tapped
    */
    const String username = 'Galen';
    const int userLevel = 3;

    return Scaffold(
      appBar: AppBar(title: const Text('CH08/03 – Page 1')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            We create SecondPage and pass data via constructor.
            */
            Navigator.push(
              context,
              MaterialPageRoute(
                builder: (context) =>
                    const SecondPage(username: username, level: userLevel),
              ),
            );
          },
          child: const Text('Open Profile Page'),
        ),
      ),
    );
  }
}

/*
================================================
PAGE 2
================================================

SecondPage receives data using final fields.
This page is still Stateless because:
- It only DISPLAYS data
- It does not manage state
*/
class SecondPage extends StatelessWidget {
  final String username;
  final int level;

  const SecondPage({super.key, required this.username, required this.level});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/03 – Page 2')),
      body: Center(
        child: Text(
          'User: $username\nLevel: $level',
          textAlign: TextAlign.center,
          style: const TextStyle(fontSize: 24),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHY PASS DATA USING CONSTRUCTOR?
------------------------------------------------

Because widgets are configuration objects.

SecondPage(
  username: 'Galen',
  level: 3,
)

This means:
"We want Page 2 to be configured with this data."

------------------------------------------------
🧠 WHY final?
------------------------------------------------

We set:

final String username;
final int level;

Because:
- Data should not change inside a StatelessWidget
- Stateless widgets are immutable configurations

------------------------------------------------
🧠 REAL APP EXAMPLE
------------------------------------------------

List of products on Page 1.
Tap product -> open Page 2 (details page)
Pass selected product info to Page 2.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Passing data forward:
- Use constructor parameters
- Page becomes configured by that data
*/
