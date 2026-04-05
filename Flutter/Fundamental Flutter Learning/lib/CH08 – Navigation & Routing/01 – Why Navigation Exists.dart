/*
CH08 - 01
Why Navigation Exists

GOAL:
- Understand why multi-screen apps exist
- Understand page stack concept
- Prepare for Navigator.push / pop

IMPORTANT:
Navigation is stack-based.
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
FIRST PAGE
================================================
*/
class FirstPage extends StatelessWidget {
  const FirstPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH08/01 – First Page')),
      body: const Center(
        child: Text('This is Page 1', style: TextStyle(fontSize: 24)),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHY NAVIGATION EXISTS
------------------------------------------------

Real apps:
- Login page
- Home page
- Detail page
- Settings page

Single screen is not enough.

------------------------------------------------
🧠 PAGE STACK CONCEPT
------------------------------------------------

Navigation works like a stack:

[ Page 1 ]

Push Page 2:

[ Page 1 ]
[ Page 2 ]

Push Page 3:

[ Page 1 ]
[ Page 2 ]
[ Page 3 ]

Pop:

Removes top page.

------------------------------------------------
🧠 IMPORTANT IDEA
------------------------------------------------

Navigation is NOT switching screens.

It is:
Pushing new page onto stack.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

push = add page on top
pop  = remove top page

Like stack data structure.
*/
