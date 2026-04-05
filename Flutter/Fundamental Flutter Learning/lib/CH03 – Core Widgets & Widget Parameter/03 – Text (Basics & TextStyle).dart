/*
CH03 - 03
Text (Basics & TextStyle)

GOAL:
- Understand Text widget clearly
- Understand TextStyle
- Learn common style properties
- Build mental model for text rendering

IMPORTANT:
Text is one of the most used widgets in Flutter.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App wrapper
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: TextBasicsPage(),
    );
  }
}

class TextBasicsPage extends StatelessWidget {
  const TextBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/03 – Text Basics')),

      body: Padding(
        padding: const EdgeInsets.all(16),

        /*
        Column is just for vertical arrangement.
        Column is NOT the focus here.
        */
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: const [
            /*
            ------------------------------------
            1️⃣ Basic Text
            ------------------------------------
            */
            Text('Basic Text'),

            SizedBox(height: 20),

            /*
            ------------------------------------
            2️⃣ Font Size
            ------------------------------------
            */
            Text('Font Size 24', style: TextStyle(fontSize: 24)),

            SizedBox(height: 20),

            /*
            ------------------------------------
            3️⃣ Font Weight
            ------------------------------------
            */
            Text('Bold Text', style: TextStyle(fontWeight: FontWeight.bold)),

            SizedBox(height: 20),

            /*
            ------------------------------------
            4️⃣ Color
            ------------------------------------
            */
            Text('Colored Text', style: TextStyle(color: Colors.blue)),

            SizedBox(height: 20),

            /*
            ------------------------------------
            5️⃣ Multiple Style Properties
            ------------------------------------
            */
            Text(
              'Styled Text Example',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.w600,
                color: Colors.deepPurple,
              ),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Text WIDGET?
------------------------------------------------

Text is a widget that displays a string of characters.

Basic usage:

Text("Hello")

But Text has MANY properties.

------------------------------------------------
🧠 WHY STYLE IS A SEPARATE OBJECT?
------------------------------------------------

Text(
  style: TextStyle(...)
)

TextStyle is separated because:
- Styling is a configuration object
- It can be reused
- It keeps Text constructor clean

This follows Flutter's:
"Configuration object" design philosophy.

------------------------------------------------
🧠 COMMON TextStyle PROPERTIES
------------------------------------------------

fontSize     → size of text
fontWeight   → thickness (boldness)
color        → text color
fontStyle    → italic
letterSpacing
wordSpacing
height       → line height

------------------------------------------------
🧠 IMPORTANT: Text is NOT layout
------------------------------------------------

Text:
- Displays characters
- Does NOT control spacing around itself

Layout (padding, alignment)
is controlled by parent widgets.

------------------------------------------------
❌ COMMON BEGINNER MISTAKES
------------------------------------------------

❌ Trying to center text using TextStyle
→ TextStyle does NOT control alignment.

Alignment belongs to:
- Text(textAlign: ...)
- Parent widgets

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Text = content
TextStyle = appearance of content
Parent widget = layout control
*/
