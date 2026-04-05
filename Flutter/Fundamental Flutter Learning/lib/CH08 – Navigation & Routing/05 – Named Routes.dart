/*
CH08 - 05
Named Routes

GOAL:
- Define routes in MaterialApp
- Navigate using route names
- Centralize navigation logic

IMPORTANT:
Named routes improve scalability.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
================================================
APP ROOT WITH ROUTES
================================================
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,

      /*
      initialRoute:
      Which page loads first.
      */
      initialRoute: '/',

      /*
      routes:
      A map of route name -> page builder.
      */
      routes: {
        '/': (context) => const FirstPage(),
        '/second': (context) => const SecondPage(),
      },
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
      appBar: AppBar(title: const Text('CH08/05 – Page 1')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            /*
            Instead of MaterialPageRoute,
            we use route name.
            */
            Navigator.pushNamed(context, '/second');
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
      appBar: AppBar(title: const Text('CH08/05 – Page 2')),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            Navigator.pop(context);
          },
          child: const Text('Back'),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT ARE NAMED ROUTES?
------------------------------------------------

Instead of:
Navigator.push(context, MaterialPageRoute(...))

We use:
Navigator.pushNamed(context, '/second')

Route name is defined in:
MaterialApp.routes

------------------------------------------------
🧠 WHY USE NAMED ROUTES?
------------------------------------------------

Better for:
- Medium to large apps
- Centralized route management
- Cleaner navigation code

------------------------------------------------
🧠 initialRoute
------------------------------------------------

Defines first screen when app starts.

------------------------------------------------
🧠 LIMITATION
------------------------------------------------

Basic routes map:
- Cannot easily pass arguments.

For advanced routing,
use onGenerateRoute (advanced topic).

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

MaterialPageRoute = inline route

Named routes = centralized routing
*/
