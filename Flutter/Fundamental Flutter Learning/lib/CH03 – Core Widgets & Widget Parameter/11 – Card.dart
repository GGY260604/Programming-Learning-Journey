/*
CH03 - 11
Card

GOAL:
- Understand Card widget
- Learn elevation
- Learn shape
- Learn margin
- See practical usage

IMPORTANT:
Card is a Material Design container
with elevation and rounded corners.
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
      home: CardDemoPage(),
    );
  }
}

class CardDemoPage extends StatelessWidget {
  const CardDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/11 – Card')),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [
          /*
          ------------------------------------------------
          1️⃣ Basic Card
          ------------------------------------------------
          */
          const Text(
            '1️⃣ Basic Card',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          const Card(
            child: Padding(
              padding: EdgeInsets.all(16),
              child: Text('This is a basic Card'),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          2️⃣ Elevation
          ------------------------------------------------
          */
          const Text(
            '2️⃣ Elevation',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Card(
            elevation: 8, // Higher elevation for stronger shadow
            child: const Padding(
              padding: EdgeInsets.all(16),
              child: Text('Higher elevation = more shadow'),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          3️⃣ Shape & Rounded Corners
          ------------------------------------------------
          */
          const Text(
            '3️⃣ Custom Shape',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Card(
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(16),
            ),
            elevation: 6,
            child: const Padding(
              padding: EdgeInsets.all(16),
              child: Text('Rounded corners Card'),
            ),
          ),

          const SizedBox(height: 30),

          /*
          ------------------------------------------------
          4️⃣ Card with ListTile (Common Usage)
          ------------------------------------------------
          */
          const Text(
            '4️⃣ Card + ListTile',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 10),

          Card(
            child: ListTile(
              leading: const Icon(Icons.person),
              title: const Text('John Doe'),
              subtitle: const Text('Software Engineer'),
              trailing: const Icon(Icons.arrow_forward_ios),
              onTap: () {
                debugPrint('Card tapped');
              },
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Card?
------------------------------------------------

Card:
- Material Design container
- Has default rounded corners
- Has shadow (elevation)
- Used for grouping content

------------------------------------------------
🧠 ELEVATION
------------------------------------------------

elevation:
- Controls shadow depth
- Higher value → stronger shadow
- Creates layered UI feel

------------------------------------------------
🧠 SHAPE
------------------------------------------------

shape:
- Controls border radius
- Controls custom border

------------------------------------------------
🧠 COMMON USAGE
------------------------------------------------

Card + ListTile is very common:
- Contact lists
- Product lists
- Settings sections

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Card = elevated surface for grouped content.
*/
