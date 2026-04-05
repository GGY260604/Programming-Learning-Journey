/*
CH02 - 01
Flutter App Skeleton (main, runApp, MyApp)

GOAL of this file:
- Understand the "common structure" of a Flutter app
- Understand what runs first
- Understand what runApp() really does
- Understand what MyApp is and why it exists

What you should learn from this file:
1) main() is the entry point (like normal Dart)
2) runApp() starts Flutter rendering and takes the ROOT widget
3) MyApp is usually the ROOT widget class
4) Flutter draws UI from a "widget tree"

IMPORTANT RULE for beginners:
- A Flutter app starts by giving Flutter ONE root widget.
- Flutter then builds everything from that root widget.
*/

import 'package:flutter/material.dart';

/*
------------------------------------
1) main() — where the program starts
------------------------------------

In every Dart program, execution starts at main().

In Flutter, main() typically does ONE important thing:
- call runApp(...)
*/
void main() {
  /*
  runApp takes a Widget.

  const MyApp() means:
  - create a MyApp widget object
  - "const" tells Dart: this widget is immutable and can be reused safely
    (we will discuss const more later, but for now it's fine to use)
  */
  runApp(const MyApp());
}

/*
------------------------------------
2) What is MyApp?
------------------------------------

MyApp is a class we create.
It represents the ROOT of our app.

Common Flutter convention:
- Root widget is named MyApp
- It returns MaterialApp (later file will explain MaterialApp deeply)

MyApp is a WIDGET because it extends StatelessWidget.
*/
class MyApp extends StatelessWidget {
  /*
  ------------------------------------
  3) What is "key" and "super.key"?
  ------------------------------------

  key is a special identifier Flutter can use to track widgets.

  Beginner-safe understanding:
  - Key helps Flutter recognize "which widget is which" when rebuilding UI,
    especially when widgets move around or are inside lists.

  For now:
  - just keep {super.key}
  - we will cover keys later in a dedicated place
  */
  const MyApp({super.key});

  /*
  ------------------------------------
  4) build() — returns the UI description
  ------------------------------------

  build() is the MOST important method in Flutter.

  Flutter will call build() to ask:
  "What should the UI look like right now?"

  build() must RETURN a Widget.
  That returned widget can contain other widgets -> forming a tree.

  IMPORTANT:
  - build() can be called MANY times
  - build() should be fast
  - build() should not do heavy work (like calling the internet)
  */
  @override
  Widget build(BuildContext context) {
    /*
    BuildContext (we will explain deeply in CH02/04) is basically:
    - a reference that tells where this widget is located in the widget tree

    For now:
    - you can treat `context` as "Flutter gives me environment info"
    */

    /*
    For this first skeleton file, we return MaterialApp.
    MaterialApp is the "app wrapper" for Material Design apps.

    Don't worry if MaterialApp is still unclear:
    We'll dedicate CH02/06 to it.
    */
    return MaterialApp(
      debugShowCheckedModeBanner: false,

      /*
      home: means "first screen/page to show"

      Here we put a Scaffold, which is a page structure widget.
      We'll study Scaffold in CH02/07.
      */
      home: Scaffold(
        appBar: AppBar(title: const Text('CH02/01 – App Skeleton')),
        body: const Center(
          child: Text(
            'main() → runApp() → MyApp → build() → UI',
            textAlign: TextAlign.center,
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------
✅ BIG PICTURE FLOW (MEMORIZE THIS)
------------------------------------

When your app starts:

1) main() runs first
2) runApp(rootWidget) is called
3) Flutter starts rendering using the rootWidget
4) Flutter calls build() on widgets to get the widget tree
5) Flutter draws the widget tree on screen

MENTAL MODEL:
- Widgets are like LEGO blocks
- build() returns LEGO arrangement
- Flutter displays the arrangement
*/
