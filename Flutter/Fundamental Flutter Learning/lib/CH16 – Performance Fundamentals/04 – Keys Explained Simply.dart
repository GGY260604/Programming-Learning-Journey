/*
CH16 - 04
Keys Explained Simply

GOAL:
- Understand what a Key really does
- Know when keys are necessary
- See what happens WITHOUT keys

CORE IDEA:

Flutter identifies widgets by:
1) Type
2) Position in the tree

If order changes,
Flutter may reuse the wrong element.

Key tells Flutter:
"This widget is THIS one."

Mental Model:
Key = identity tag for a widget.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(debugShowCheckedModeBanner: false, home: KeyDemoPage()),
  );
}

class KeyDemoPage extends StatefulWidget {
  const KeyDemoPage({super.key});

  @override
  State<KeyDemoPage> createState() => _KeyDemoPageState();
}

class _KeyDemoPageState extends State<KeyDemoPage> {
  List<String> items = ["A", "B", "C"];

  bool useKeys = false;

  void _shuffle() {
    setState(() {
      items.shuffle();
    });
  }

  void _toggleKeys() {
    setState(() {
      useKeys = !useKeys;
    });
  }

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 Parent rebuilt");

    return Scaffold(
      appBar: AppBar(title: const Text("CH16/04 – Keys Explained")),
      body: Center(
        child: Column(
          children: [
            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: _shuffle,
              child: const Text("Shuffle Items"),
            ),

            const SizedBox(height: 10),

            ElevatedButton(
              onPressed: _toggleKeys,
              child: Text(
                useKeys
                    ? "Using Keys (Switch OFF)"
                    : "Not Using Keys (Switch ON)",
              ),
            ),

            const SizedBox(height: 30),

            /*
          Observe behavior when shuffling.
          */
            Column(
              children: items.map((item) {
                if (useKeys) {
                  return ColorBox(key: ValueKey(item), label: item);
                } else {
                  return ColorBox(label: item);
                }
              }).toList(),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Each ColorBox has internal state (a random color).
If order changes without keys,
state may attach to wrong label.
*/

class ColorBox extends StatefulWidget {
  final String label;

  const ColorBox({super.key, required this.label});

  @override
  State<ColorBox> createState() => _ColorBoxState();
}

class _ColorBoxState extends State<ColorBox> {
  late final Color color;

  @override
  void initState() {
    super.initState();
    color =
        Colors.primaries[DateTime.now().millisecondsSinceEpoch %
            Colors.primaries.length];
  }

  @override
  Widget build(BuildContext context) {
    debugPrint("🔁 ColorBox ${widget.label} rebuilt");

    return Container(
      margin: const EdgeInsets.all(6),
      padding: const EdgeInsets.all(20),
      color: color,
      child: Text(
        widget.label,
        style: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
      ),
    );
  }
}

/*
Experiment:

1) Turn OFF keys.
2) Shuffle items multiple times.
Notice colors move incorrectly.

Why?
Flutter matches by position.

3) Turn ON keys.
Now each label keeps its color.

Why?
ValueKey(label) gives identity.

When to use keys:
- Reorderable lists
- Animated lists
- Dynamic insert/remove
- Stateful list items

When NOT needed:
- Static layout
- No reordering

Next:
List performance discipline.
*/
