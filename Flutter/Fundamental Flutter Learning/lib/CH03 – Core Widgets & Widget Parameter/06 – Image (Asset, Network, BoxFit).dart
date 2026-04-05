/*
CH03 - 06
Image (Asset, Network, BoxFit)

GOAL:
- Understand different image sources
- Understand BoxFit behavior
- Understand how constraints affect images

IMPORTANT:
Images are affected by layout constraints.
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
      home: ImageBasicsPage(),
    );
  }
}

class ImageBasicsPage extends StatelessWidget {
  const ImageBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH03/06 – Image Basics')),

      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [
          /*
          ------------------------------------
          1️⃣ Image.asset
          ------------------------------------
          */
          const Text(
            '1️⃣ Image.asset',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),

          // Image from local assets folder
          Image.asset('assets/sample.jpg', height: 150),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          2️⃣ Image.network
          ------------------------------------
          */
          const Text(
            '2️⃣ Image.network',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),

          // Image from internet URL
          Image.network('https://picsum.photos/300/200', height: 150),

          const SizedBox(height: 30),

          /*
          ------------------------------------
          3️⃣ BoxFit examples
          ------------------------------------
          */
          const Text(
            '3️⃣ BoxFit.cover',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),

          Container(
            width: 300,
            height: 150,
            color: Colors.grey.shade300,
            child: Image.network(
              'https://picsum.photos/400/300',
              fit: BoxFit.cover,
            ),
          ),

          const SizedBox(height: 20),

          const Text(
            '4️⃣ BoxFit.contain',
            style: TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(height: 8),

          Container(
            width: 300,
            height: 150,
            color: Colors.grey.shade300,
            child: Image.network(
              'https://picsum.photos/400/300',
              fit: BoxFit.contain,
            ),
          ),
        ],
      ),
    );
  }
}

/*
------------------------------------------------
🧠 IMAGE SOURCES
------------------------------------------------

Image.asset()
→ Load from local project folder

Image.network()
→ Load from internet URL

------------------------------------------------
🧠 WIDTH & HEIGHT
------------------------------------------------

If you specify:
- width
- height

Image will try to fit within those constraints.

If not specified:
- Image uses its natural size (if allowed by parent)

------------------------------------------------
🧠 BoxFit (VERY IMPORTANT)
------------------------------------------------

BoxFit.cover
→ Fill container completely
→ May crop image

BoxFit.contain
→ Show full image
→ May leave empty space

Other options:
- BoxFit.fill
- BoxFit.fitWidth
- BoxFit.fitHeight
- BoxFit.none
- BoxFit.scaleDown

------------------------------------------------
🧠 CONSTRAINT RULE (IMPORTANT)
------------------------------------------------

Image does NOT decide its own size freely.

Parent gives constraints.
Image adapts to those constraints.

Same rule as:
Text
Container
Row
Column

Everything follows constraint system.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Image source:
- asset
- network

Size behavior:
- Controlled by constraints

BoxFit:
- Controls how image fills its box
*/
