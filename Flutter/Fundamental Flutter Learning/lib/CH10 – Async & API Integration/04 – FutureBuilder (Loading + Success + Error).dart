/*
CH10 - 04
FutureBuilder (Loading + Success + Error)

GOAL:
- Learn FutureBuilder
- Understand AsyncSnapshot
- Handle loading / success / error
- Declarative async UI

IMPORTANT:
FutureBuilder rebuilds UI based on Future state.
*/

import 'package:flutter/material.dart';
import 'dart:math';

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
      home: FutureBuilderDemoPage(),
    );
  }
}

class FutureBuilderDemoPage extends StatefulWidget {
  const FutureBuilderDemoPage({super.key});

  @override
  State<FutureBuilderDemoPage> createState() => _FutureBuilderDemoPageState();
}

class _FutureBuilderDemoPageState extends State<FutureBuilderDemoPage> {
  /*
  Store future so it does NOT recreate on every build.
  */
  Future<String>? _future;

  /*
  Fake API
  */
  Future<String> fakeApiCall() async {
    await Future.delayed(const Duration(seconds: 3));

    if (Random().nextBool()) {
      return "✅ Data loaded successfully!";
    } else {
      throw Exception("❌ Server error!");
    }
  }

  void loadData() {
    setState(() {
      _future = fakeApiCall();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH10/04 – FutureBuilder')),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            /*
            If no future yet, show instruction.
            */
            if (_future == null)
              const Text("Press button to load data")
            else
              FutureBuilder<String>(
                future: _future,

                /*
                builder gives AsyncSnapshot.
                */
                builder: (context, snapshot) {
                  /*
                  snapshot.connectionState tells
                  current state of Future.
                  */

                  if (snapshot.connectionState == ConnectionState.waiting) {
                    return const CircularProgressIndicator();
                  }

                  if (snapshot.hasError) {
                    return Text(
                      snapshot.error.toString(),
                      style: const TextStyle(color: Colors.red),
                      textAlign: TextAlign.center,
                    );
                  }

                  if (snapshot.hasData) {
                    return Text(
                      snapshot.data!,
                      style: const TextStyle(fontSize: 18),
                      textAlign: TextAlign.center,
                    );
                  }

                  return const Text("Unknown state");
                },
              ),

            const SizedBox(height: 30),

            ElevatedButton(onPressed: loadData, child: const Text("Load Data")),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS FutureBuilder?
------------------------------------------------

FutureBuilder:
- Takes a Future
- Rebuilds UI automatically
- Provides snapshot of state

------------------------------------------------
🧠 WHAT IS AsyncSnapshot?
------------------------------------------------

snapshot contains:

snapshot.connectionState
snapshot.hasData
snapshot.hasError
snapshot.data
snapshot.error

------------------------------------------------
🧠 CONNECTION STATES
------------------------------------------------

none      → no future yet
waiting   → still loading
active    → rarely used (streams)
done      → completed

------------------------------------------------
🧠 WHY STORE FUTURE IN VARIABLE?
------------------------------------------------

If you call fakeApiCall() directly in build():

FutureBuilder(
  future: fakeApiCall(), // BAD
)

It will run again on every rebuild!

Store in variable instead.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

FutureBuilder:
Declarative async UI manager.
*/
