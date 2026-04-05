/*
CH16 - 01
What Actually Causes Rebuild

GOAL:
- Understand when build() is triggered
- See rebuild propagation visually
- Build correct mental model

CORE IDEA:

Flutter rebuild happens when:

1) setState() is called
2) A parent rebuilds
3) Inherited dependency changes (Theme, Provider, etc.)

IMPORTANT:
Rebuild ≠ repaint
Rebuild = widget tree reconstruction
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: RebuildDemoPage(),
    ),
  );
}

class RebuildDemoPage extends StatefulWidget {
  const RebuildDemoPage({super.key});

  @override
  State<RebuildDemoPage> createState() => _RebuildDemoPageState();
}

class _RebuildDemoPageState extends State<RebuildDemoPage> {
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 RebuildDemoPage rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH16/01 – Rebuild Cause")),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CounterDisplay(counter: counter),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                setState(() {
                  counter++;
                });
                debugPrint("Button pressed → setState()");
              },
              child: const Text("Increase"),
            ),
            const SizedBox(height: 40),
            const StaticWidget(),
          ],
        ),
      ),
    );
  }
}

class CounterDisplay extends StatelessWidget {
  final int counter;

  const CounterDisplay({super.key, required this.counter});

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 CounterDisplay rebuilt");

    return Text(
      "Counter: $counter",
      style: const TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
    );
  }
}

class StaticWidget extends StatelessWidget {
  const StaticWidget({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 StaticWidget rebuilt");

    return const Text("I never change", style: TextStyle(fontSize: 18));
  }
}

/*
Observe the console:

When you press Increase:
- Parent rebuilds
- All children rebuild

Even StaticWidget rebuilds
even though it doesn't depend on counter,
but because StaticWidget is const, so it will
not be rebuilt when Increase is pressed.

This is NORMAL behavior.

Next file:
How const reduces unnecessary rebuild cost.
*/
