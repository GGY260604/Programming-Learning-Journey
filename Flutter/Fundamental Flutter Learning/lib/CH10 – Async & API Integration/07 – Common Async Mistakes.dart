/*
CH10 - 07
Common Async Mistakes

GOAL:
- Learn the most common async bugs in Flutter
- Understand WHY they happen
- Learn correct patterns

IMPORTANT:
Async + rebuild + widget lifecycle is where many bugs happen.
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
      home: AsyncMistakesPage(),
    );
  }
}

class AsyncMistakesPage extends StatefulWidget {
  const AsyncMistakesPage({super.key});

  @override
  State<AsyncMistakesPage> createState() => _AsyncMistakesPageState();
}

class _AsyncMistakesPageState extends State<AsyncMistakesPage> {
  String status = 'Press button to start';

  /*
  Simulated async work.
  */
  Future<String> slowTask() async {
    await Future.delayed(const Duration(seconds: 2));
    return "✅ Finished after 2 seconds";
  }

  Future<void> startTask() async {
    setState(() {
      status = "Loading...";
    });

    /*
    MISTAKE 1 (common):
    Forgetting await.

    WRONG:
    final result = slowTask(); // Future<String>
    status = result.toString(); // not actual value

    CORRECT:
    await slowTask()
    */
    final result = await slowTask();

    /*
    MISTAKE 2:
    setState after widget disposed.

    Example:
    - user navigates away while waiting
    - async finishes
    - setState tries to run
    - Flutter throws error

    Fix:
    Check mounted before setState.
    */

    if (!mounted) return;

    setState(() {
      status = result;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/07 – Async Mistakes')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              status,
              textAlign: TextAlign.center,
              style: const TextStyle(fontSize: 18),
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: startTask,
              child: const Text('Start Async Task'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
⚠️ COMMON ASYNC MISTAKES (VERY IMPORTANT)
------------------------------------------------

❌ 1) Calling Future inside build repeatedly

BAD:
FutureBuilder(
  future: fetchData(), // created every build
)

Each rebuild -> new API call.

✅ Fix:
Store future in state:

Future? _future;

initState() { _future = fetchData(); }

FutureBuilder(future: _future)

------------------------------------------------

❌ 2) Doing navigation / setState inside build

build() can run many times.
Never trigger async side-effects in build.

✅ Fix:
Trigger in:
- onPressed
- initState (careful)

------------------------------------------------

❌ 3) Forgetting await

push returns Future
API returns Future
File read returns Future

Without await:
You don’t get the real result.

------------------------------------------------

❌ 4) setState after dispose

If widget is removed while async running,
calling setState causes error.

✅ Fix:
if (!mounted) return;

------------------------------------------------

❌ 5) Not handling errors

await fetchData(); // may throw

✅ Fix:
try / catch
and show friendly UI.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Async work returns Future.
Rebuild happens often.
Never start async in build.
Always handle lifecycle + errors safely.
*/
