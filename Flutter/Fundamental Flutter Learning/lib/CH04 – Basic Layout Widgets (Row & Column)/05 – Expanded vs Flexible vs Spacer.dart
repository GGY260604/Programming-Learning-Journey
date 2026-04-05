/*
CH04 - 05
Expanded vs Flexible vs Spacer (Space Negotiation)

GOAL:
- Understand how Row / Column distribute EXTRA space
- Learn who gets space and why
- Visually compare Expanded, Flexible, and Spacer

IMPORTANT IDEA:
Row / Column often have MORE space than children need.
Expanded / Flexible / Spacer decide how that space is used.
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
      home: SpaceNegotiationPage(),
    );
  }
}

/*
This page shows multiple examples:
- No Expanded (overflow risk)
- Expanded
- Flexible
- Spacer
*/
class SpaceNegotiationPage extends StatelessWidget {
  const SpaceNegotiationPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('CH04/05 – Expanded vs Flexible vs Spacer'),
      ),

      backgroundColor: Colors.grey.shade200,

      body: ListView(
        padding: const EdgeInsets.all(16),

        children: [
          _Title('1️⃣ No Expanded (children keep their size)'),
          _DemoRow.none(),

          _Title('2️⃣ Expanded (forces child to take space)'),
          _DemoRow.expanded(),

          _Title('3️⃣ Flexible (can take space, but not forced)'),
          _DemoRow.flexible(),

          _Title('4️⃣ Spacer (empty Expanded)'),
          _DemoRow.spacer(),
        ],
      ),
    );
  }
}

/*
------------------------------------
Reusable demo row
------------------------------------

Each constructor shows a different strategy.
*/
class _DemoRow extends StatelessWidget {
  final Widget child;

  const _DemoRow._(this.child);

  _DemoRow.none()
    : this._( 
        Row(
          children: [
            _Box(color: Colors.red),
            _Box(color: Colors.green),
            _Box(color: Colors.blue),
          ],
        ),
      );

  _DemoRow.expanded()
    : this._(
        Row(
          children: [
            Expanded(child: _Box(color: Colors.red)),
            _Box(color: Colors.green),
            _Box(color: Colors.blue),
          ],
        ),
      );

  _DemoRow.flexible()
    : this._(
        Row(
          children: [
            Flexible(child: _Box(color: Colors.red)),
            _Box(color: Colors.green),
            _Box(color: Colors.blue),
          ],
        ),
      );

  _DemoRow.spacer()
    : this._(
        Row(
          children: [
            _Box(color: Colors.red),
            const Spacer(),
            _Box(color: Colors.blue),
          ],
        ),
      );

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 80,
      margin: const EdgeInsets.only(bottom: 24),
      padding: const EdgeInsets.all(8),
      color: Colors.white,
      child: child,
    );
  }
}

/*
Simple colored box
*/
class _Box extends StatelessWidget {
  final Color color;

  const _Box({required this.color});

  @override
  Widget build(BuildContext context) {
    return Container(width: 400, height: 50, color: color);
  }
}

/*
Simple section title
*/
class _Title extends StatelessWidget {
  final String text;

  const _Title(this.text);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 8),
      child: Text(text, style: const TextStyle(fontWeight: FontWeight.bold)),
    );
  }
}

/*
------------------------------------
🧠 CORE CONCEPT (READ CAREFULLY)
------------------------------------

Row / Column layout steps:
1) Lay out NON-flex children first
2) Calculate remaining free space
3) Distribute free space to flex children

Expanded, Flexible, Spacer = FLEX widgets

------------------------------------
Expanded
------------------------------------

Expanded:
- MUST take all remaining space
- Forces child to expand

Use when:
- Child MUST fill space

------------------------------------
Flexible
------------------------------------

Flexible:
- CAN take remaining space
- But child decides how much it wants

Use when:
- Child can grow but doesn't have to

------------------------------------
Spacer
------------------------------------

Spacer:
- Just an Expanded with no child
- Used to push widgets apart

Spacer() == Expanded(child: SizedBox())

------------------------------------
COMMON BEGINNER MISTAKES
------------------------------------

❌ Using Expanded everywhere
❌ Forgetting Expanded causes overflow
❌ Thinking Spacer is special

------------------------------------
MENTAL MODEL (CRITICAL)
------------------------------------

Expanded = "You MUST fill space"
Flexible = "You MAY fill space"
Spacer   = "Create empty flexible space"
*/
