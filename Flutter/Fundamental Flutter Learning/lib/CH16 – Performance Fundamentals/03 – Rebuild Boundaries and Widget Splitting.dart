/*
CH16 - 03
Rebuild Boundaries and Widget Splitting

GOAL:
- Learn how to reduce rebuild scope
- Understand why splitting widgets improves performance
- Create rebuild boundaries intentionally

CORE IDEA:

Rebuild spreads downward.

If a parent rebuilds,
all its children are re-evaluated.

But if you split widgets properly,
you can isolate rebuild to smaller parts.

This is called:
Rebuild Boundary via Widget Splitting
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: RebuildBoundaryPage(),
    ),
  );
}

class RebuildBoundaryPage extends StatefulWidget {
  const RebuildBoundaryPage({super.key});

  @override
  State<RebuildBoundaryPage> createState() => _RebuildBoundaryPageState();
}

class _RebuildBoundaryPageState extends State<RebuildBoundaryPage> {
  int counter = 0;

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 Parent rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH16/03 – Rebuild Boundary")),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CounterSection(
              counter: counter,
              onIncrease: () {
                setState(() {
                  counter++;
                });
              },
            ),

            const SizedBox(height: 40),

            /*
          This section does NOT depend on counter.
          Because it's split into its own widget
          and marked const,
          it will not rebuild unnecessarily.
          */
            const StaticSection(),
          ],
        ),
      ),
    );
  }
}

/* -------------------------
   Dynamic Section
--------------------------*/

class CounterSection extends StatelessWidget {
  final int counter;
  final VoidCallback onIncrease;

  const CounterSection({
    super.key,
    required this.counter,
    required this.onIncrease,
  });

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 CounterSection rebuilt");

    return Column(
      children: [
        Text(
          "Counter: $counter",
          style: const TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
        ),
        const SizedBox(height: 20),
        ElevatedButton(onPressed: onIncrease, child: const Text("Increase")),
      ],
    );
  }
}

/* -------------------------
   Static Section
--------------------------*/

class StaticSection extends StatelessWidget {
  const StaticSection({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 StaticSection rebuilt");

    return const Text(
      "I never depend on counter",
      style: TextStyle(fontSize: 18),
    );
  }
}

/*
Observe console:

When counter increases:
- Parent rebuilds
- CounterSection rebuilds
- StaticSection does NOT rebuild (because const)

Why this matters:

In large screens:
If everything lives in one big build(),
every change rebuilds entire UI.

Professional Strategy:
- Extract dynamic parts into small widgets
- Mark static parts const
- Reduce rebuild scope

This is architectural performance,
not micro optimization.

Next:
Keys explained simply.
*/
