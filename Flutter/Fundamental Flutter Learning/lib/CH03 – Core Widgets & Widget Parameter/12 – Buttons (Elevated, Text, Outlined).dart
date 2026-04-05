/*
CH03 - 12
Buttons (Elevated, Text, Outlined)

GOAL:
- Understand 3 main Material buttons
- Learn visual differences
- Learn when to use which
- Understand disabled state
- Learn basic styling

IMPORTANT:
Buttons are interaction widgets.
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
      home: ButtonDemoPage(),
    );
  }
}

class ButtonDemoPage extends StatelessWidget {
  const ButtonDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/12 – Buttons')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            /*
            ------------------------------------------------
            1️⃣ ElevatedButton
            ------------------------------------------------
            */
            const Text(
              '1️⃣ ElevatedButton',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            ElevatedButton(
              onPressed: () {
                debugPrint('ElevatedButton pressed');
              },
              child: const Text('Elevated Button'),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            2️⃣ TextButton
            ------------------------------------------------
            */
            const Text(
              '2️⃣ TextButton',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            TextButton(
              onPressed: () {
                debugPrint('TextButton pressed');
              },
              child: const Text('Text Button'),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            3️⃣ OutlinedButton
            ------------------------------------------------
            */
            const Text(
              '3️⃣ OutlinedButton',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            OutlinedButton(
              onPressed: () {
                debugPrint('OutlinedButton pressed');
              },
              child: const Text('Outlined Button'),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            4️⃣ Disabled Button
            ------------------------------------------------
            */
            const Text(
              '4️⃣ Disabled Button',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            /*
            If onPressed is null,
            button becomes disabled.
            */
            const ElevatedButton(
              onPressed: null,
              child: Text('Disabled Button'),
            ),

            const SizedBox(height: 30),

            /*
            ------------------------------------------------
            5️⃣ Styled Button
            ------------------------------------------------
            */
            const Text(
              '5️⃣ Styled ElevatedButton',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),

            ElevatedButton(
              style: ElevatedButton.styleFrom(
                backgroundColor: Colors.purple,
                foregroundColor: Colors.white,
                elevation: 5,
                padding: const EdgeInsets.symmetric(
                  horizontal: 24,
                  vertical: 16,
                ),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(12),
                ),
              ),
              onPressed: () {
                debugPrint('Styled button pressed');
              },
              child: const Text('Custom Styled'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 BUTTON TYPES
------------------------------------------------

ElevatedButton:
- Filled background
- Has elevation
- Primary actions

TextButton:
- No background
- Used for low-emphasis actions
- Dialog actions

OutlinedButton:
- Transparent background
- Border outline
- Medium emphasis

------------------------------------------------
🧠 DISABLED STATE
------------------------------------------------

If onPressed is null:
→ Button is disabled
→ Visual style changes automatically

------------------------------------------------
🧠 STYLE
------------------------------------------------

styleFrom allows customizing:
- backgroundColor
- foregroundColor (text/icon)
- padding
- shape
- elevation

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Elevated = strong action
Outlined = medium action
Text = weak/secondary action
*/
