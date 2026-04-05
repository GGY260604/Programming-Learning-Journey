/*
CH13 - 07
Common API Architecture Mistakes

GOAL:
- Learn what NOT to do when integrating APIs
- Build discipline rules you can follow in every project

IMPORTANT:
Most “API bugs” in Flutter apps come from mixing responsibilities.

Mental Model:
If a layer does the wrong job, your app becomes:
- hard to test
- hard to debug
- hard to scale
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: ApiMistakesPage(),
    ),
  );
}

class ApiMistakesPage extends StatelessWidget {
  const ApiMistakesPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH13/07 – Common Mistakes")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: ListView(
          children: const [
            _MistakeCard(
              title: "Mistake 1: UI calls http directly",
              bad:
                  "Widget does http.get() + jsonDecode() + try/catch inside build/event",
              good: "UI triggers model.load(), UI only renders state",
            ),
            _MistakeCard(
              title: "Mistake 2: JSON parsing in UI",
              bad: "UI knows response keys like json['data']['user']['name']",
              good:
                  "DTO parses JSON, Repository maps DTO → Domain, UI uses Domain only",
            ),
            _MistakeCard(
              title: "Mistake 3: No status code handling",
              bad: "Assume success and decode response.body always",
              good:
                  "Check statusCode first, throw typed error / map to failure",
            ),
            _MistakeCard(
              title: "Mistake 4: No timeout",
              bad: "Request can hang forever",
              good: "Always add timeout and map timeout to user friendly error",
            ),
            _MistakeCard(
              title: "Mistake 5: Business rules inside Service",
              bad: "Service decides app rules and UI formatting",
              good:
                  "Service = networking only; Repository/Model = app decisions",
            ),
            _MistakeCard(
              title: "Mistake 6: Duplicate derived state",
              bad: "Store items AND store total AND store count",
              good: "Store source of truth; compute derived values via getters",
            ),
            _MistakeCard(
              title: "Mistake 7: One huge AppModel",
              bad: "Everything in one ChangeNotifier",
              good:
                  "Feature based models + repositories; split by responsibility",
            ),
            SizedBox(height: 12),
            _RulesCard(),
          ],
        ),
      ),
    );
  }
}

class _MistakeCard extends StatelessWidget {
  final String title;
  final String bad;
  final String good;

  const _MistakeCard({
    required this.title,
    required this.bad,
    required this.good,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(title, style: const TextStyle(fontWeight: FontWeight.bold)),
            const SizedBox(height: 10),
            const Text("❌ Bad:", style: TextStyle(fontWeight: FontWeight.bold)),
            Text(bad),
            const SizedBox(height: 10),
            const Text(
              "✅ Good:",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            Text(good),
          ],
        ),
      ),
    );
  }
}

class _RulesCard extends StatelessWidget {
  const _RulesCard();

  @override
  Widget build(BuildContext context) {
    return const Card(
      child: Padding(
        padding: EdgeInsets.all(16),
        child: Text(
          "CH13 Rules (Keep Forever)\n\n"
          "1) UI does not know URLs, JSON keys, or status codes\n"
          "2) Service does HTTP + validation only\n"
          "3) Repository returns Domain models only\n"
          "4) Model owns loading/data/error and notifies UI\n"
          "5) Always handle status codes + timeout\n"
          "6) Keep one source of truth; derive everything else\n",
          style: TextStyle(fontSize: 13, height: 1.35),
        ),
      ),
    );
  }
}

/*
CH13 completed ✅

You now have:
- Clean layering mental model
- HTTP discipline
- Error system and Result wrapper concept
- DTO vs Domain mapping
- Repository pattern + pagination
- Full Provider integration
*/
