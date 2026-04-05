/*
CH02 - 06
MaterialApp (App-level attributes)

GOAL of this file:
- Understand what MaterialApp REALLY is
- Understand what problems it solves
- Know which responsibilities belong to MaterialApp
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
------------------------------------
1️⃣ WHAT IS MaterialApp?
------------------------------------

MaterialApp is:
- An APP-LEVEL widget
- A wrapper that sets up the environment for your app

MaterialApp provides:
- Material Design styling
- Navigation system
- Theme system
- Localization
- App-wide configuration

IMPORTANT:
You usually have ONE MaterialApp in your app.
*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      /*
      ------------------------------------
      2️⃣ title
      ------------------------------------

      title:
      - Logical name of the app
      - Used by the OS (task switcher)
      - NOT always visible in UI
      */
      title: 'CH02 – MaterialApp',

      /*
      ------------------------------------
      3️⃣ debugShowCheckedModeBanner
      ------------------------------------

      This controls the red "DEBUG" banner.
      It appears only in debug mode.
      */
      debugShowCheckedModeBanner: false,

      /*
      ------------------------------------
      4️⃣ theme (PREVIEW)
      ------------------------------------

      theme:
      - Defines global colors, fonts, styles
      - Applies to ALL widgets below MaterialApp

      We only preview it here.
      Theme gets its own chapter later.
      */
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),

      /*
      ------------------------------------
      5️⃣ home – FIRST PAGE
      ------------------------------------

      home:
      - The first screen shown when the app starts
      - Usually a Scaffold
      - Think of it as: "entry page"

      MaterialApp does NOT define page layout.
      It just decides WHICH page to show.
      */
      home: const HomePage(),
    );
  }
}

/*
------------------------------------
PAGE-LEVEL STARTS HERE
------------------------------------

Everything below MaterialApp is page-level UI.
*/

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      /*
      Scaffold belongs to PAGE structure.
      We'll deeply study Scaffold next.
      */
      appBar: AppBar(
        title: const Text('MaterialApp Demo'),
      ),
      body: const Center(
        child: Text(
          'MaterialApp = App-level\n'
          'Scaffold = Page-level',
          textAlign: TextAlign.center,
        ),
      ),
    );
  }
}

/*
------------------------------------
🧠 VERY IMPORTANT DISTINCTION
------------------------------------

MaterialApp:
- App-wide configuration
- Usually ONE
- Controls theme, navigation, localization

Scaffold:
- Page structure
- Usually MANY (one per screen)

------------------------------------
MENTAL MODEL
------------------------------------

MaterialApp
 └── Page (Scaffold)
     └── UI widgets
*/

/*
------------------------------------
❗ COMMON BEGINNER CONFUSIONS
------------------------------------

❌ "MaterialApp is just a container"
✅ No — it sets up app infrastructure

❌ "I need multiple MaterialApp"
✅ No — usually one only

❌ "MaterialApp is optional"
✅ Technically yes, but practically no
   (unless you use CupertinoApp or WidgetsApp)
*/

/*
------------------------------------
✅ KEY TAKEAWAYS
------------------------------------

1) MaterialApp sets up the APP
2) home defines the first PAGE
3) Theme applies app-wide
4) Scaffold is NOT part of MaterialApp
5) App-level ≠ Page-level

NEXT:
Now we are READY to deeply study Scaffold.
*/
