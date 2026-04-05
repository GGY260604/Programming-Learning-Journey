/*
CH16 - 02
const Optimization Deep Dive

GOAL:
- Understand what const REALLY does
- Learn why const reduces rebuild cost
- See practical difference in console

CORE IDEA:

const does NOT stop parent rebuild.

const helps Flutter:
- Reuse the same widget instance
- Skip rebuilding identical subtrees

Important Distinction:

Parent build() runs.
Children are compared.
If identical (const) → subtree reused.

const = canonicalized object (same instance in memory)
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ConstOptimizationPage(),
    ),
  );
}

class ConstOptimizationPage extends StatefulWidget {
  const ConstOptimizationPage({super.key});

  @override
  State<ConstOptimizationPage> createState() => _ConstOptimizationPageState();
}

class _ConstOptimizationPageState extends State<ConstOptimizationPage> {
  int counter = 0;
  bool useConst = true;

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 Parent rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH16/02 – const Optimization")),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text("Counter: $counter", style: const TextStyle(fontSize: 24)),
            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                setState(() {
                  counter++;
                });
              },
              child: const Text("Increase Counter"),
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                setState(() {
                  useConst = !useConst;
                });
              },
              child: Text(
                useConst
                    ? "Switch to NON-const child"
                    : "Switch to const child",
              ),
            ),

            const SizedBox(height: 40),

            /*
          Toggle between const and non-const child
          to observe rebuild behavior.
          */
            useConst ? const StaticChild() : StaticChild(),
          ],
        ),
      ),
    );
  }
}

class StaticChild extends StatelessWidget {
  const StaticChild({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 StaticChild rebuilt");

    return const Text(
      "I never depend on counter",
      style: TextStyle(fontSize: 18),
    );
  }
}

/*
Experiment Steps:

1) Keep "const" enabled.
2) Press Increase Counter multiple times.
   → StaticChild will NOT rebuild.

3) Switch to NON-const.
4) Press Increase Counter.
   → StaticChild WILL rebuild every time.

Why?

With const:
- Same widget instance reused.
- Flutter detects identical configuration.
- Element subtree reused.

Without const:
- New widget object created each build.
- Flutter must update subtree.

Important:

const does NOT stop parent rebuild.
const reduces subtree rebuild cost.

Professional Rule:

- Make widgets const whenever possible.
- Especially leaf widgets.
- Especially static UI parts.
*/
