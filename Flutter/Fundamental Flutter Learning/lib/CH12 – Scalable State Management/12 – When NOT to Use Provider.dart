/*
CH12 - 12
When NOT to Use Provider

GOAL:
- Build architectural judgment
- Know when Provider is overkill
- Choose the simplest correct tool

IMPORTANT:
Provider is useful for shared / app-level state.
But using it everywhere can make code harder, not better.

Mental Model:
Use the smallest tool that fits the scope of the state.
Scope decides technique.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: JudgmentDemoPage(),
    );
  }
}

/*
This page demonstrates:

Case A (Provider NOT needed):
- Local state inside ONE widget
- Simple UI
- No sharing

We use setState because it is:
- simplest
- clear
- correct for local scope
*/
class JudgmentDemoPage extends StatefulWidget {
  const JudgmentDemoPage({super.key});

  @override
  State<JudgmentDemoPage> createState() => _JudgmentDemoPageState();
}

class _JudgmentDemoPageState extends State<JudgmentDemoPage> {
  bool isExpanded = false;

  @override
  Widget build(BuildContext context) {
    debugPrint("JudgmentDemoPage rebuild");

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/12 – Judgment')),
      body: Center(
        child: Card(
          child: Padding(
            padding: const EdgeInsets.all(20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                const Text(
                  'Local UI state example:\n'
                  'This does NOT need Provider.',
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 16),

                ElevatedButton(
                  onPressed: () {
                    setState(() {
                      isExpanded = !isExpanded;
                    });
                  },
                  child: Text(isExpanded ? 'Collapse' : 'Expand'),
                ),

                const SizedBox(height: 16),

                AnimatedContainer(
                  duration: const Duration(milliseconds: 2500),
                  width: 260,
                  height: isExpanded ? 120 : 40,
                  alignment: Alignment.center,
                  child: Text(
                    isExpanded ? 'Expanded Content' : 'Collapsed',
                    style: const TextStyle(fontSize: 16),
                  ),
                ),

                const SizedBox(height: 20),

                const Text(
                  'Rule of Thumb:\n'
                  '- Local UI state → setState\n'
                  '- Shared / app-wide state → Provider\n'
                  '- Very complex flows → consider Bloc/Riverpod\n',
                  style: TextStyle(fontSize: 13),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------
Decision Guide (High Signal)
------------------------------------------

Use setState when:
- state is local
- no need to share
- short-lived UI state (toggle, animation, tab)

Use Provider when:
- many widgets need the same state
- state must survive navigation
- business logic should be separated from UI
- app modules (auth, cart, theme)

Avoid Provider when:
- it adds structure without benefit
- you only have one widget reading it
- you're just replacing setState everywhere for "style"

End of CH12 ✅
*/
