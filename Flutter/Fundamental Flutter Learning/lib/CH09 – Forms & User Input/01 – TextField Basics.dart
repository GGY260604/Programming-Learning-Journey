/*
CH09 - 01
TextField Basics

GOAL:
- Understand TextField widget
- Learn decoration
- Learn keyboardType
- See user input visually

IMPORTANT:
TextField allows user to input text.
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
      home: TextFieldDemoPage(),
    );
  }
}

class TextFieldDemoPage extends StatelessWidget {
  const TextFieldDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/01 – TextField Basics')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            /*
            ------------------------------------------------
            1️⃣ Basic TextField
            ------------------------------------------------
            */
            const TextField(),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            2️⃣ TextField with decoration
            ------------------------------------------------
            */
            const TextField(
              decoration: InputDecoration(
                labelText: 'Username',
                hintText: 'Enter your username',
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            3️⃣ Password Field
            ------------------------------------------------
            */
            const TextField(
              obscureText: true, // hide text
              decoration: InputDecoration(
                labelText: 'Password',
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            4️⃣ Number Keyboard
            ------------------------------------------------
            */
            const TextField(
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Age',
                border: OutlineInputBorder(),
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
🧠 WHAT IS TextField?
------------------------------------------------

TextField:
- Allows user to type text
- Manages internal state automatically
- Provides input events

------------------------------------------------
🧠 COMMON PROPERTIES
------------------------------------------------

decoration:
- Visual styling
- labelText
- hintText
- border
02 – TextEditingController.dart
obscureText:
- Hide text (for passwords)

keyboardType:
- number
- emailAddress
- text
- phone

------------------------------------------------
🧠 IMPORTANT
------------------------------------------------

Right now:
We can type text.

But:
We are NOT capturing the value yet.

Next lesson:
We learn how to READ the input.
*/
