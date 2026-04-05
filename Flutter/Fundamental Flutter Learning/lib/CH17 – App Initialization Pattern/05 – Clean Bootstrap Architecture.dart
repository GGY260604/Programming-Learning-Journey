/*
CH17 - 05
Clean Bootstrap Architecture (Theme + Auth + Startup) — Provider Version (Cleaner)

GOAL:
- Use ChangeNotifierProvider for bootstrap state
- Let pages read model directly (watch/read)
- Avoid passing callbacks/flags around (cleaner wiring)

CORE IDEA:

AppBootstrapModel (ChangeNotifier):
- isLoading
- themeMode
- isLoggedIn
- initialize(), toggleTheme(), login(), logout()

UI reads state via:
- context.watch<AppBootstrapModel>()  (rebuild when state changes)
Triggers actions via:
- context.read<AppBootstrapModel>()   (no rebuild, just call method)
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

void main() {
  runApp(const BootstrapApp());
}

/* -------------------------
   Bootstrap Model
--------------------------*/

class AppBootstrapModel extends ChangeNotifier {
  static const String keyDarkMode = "dark_mode";
  static const String keyToken = "auth_token";

  bool isLoading = true;
  ThemeMode themeMode = ThemeMode.system;
  bool isLoggedIn = false;

  Future<void> initialize() async {
    debugPrint("Bootstrap: initialize()");

    final prefs = await SharedPreferences.getInstance();

    final savedDark = prefs.getBool(keyDarkMode);
    if (savedDark == null) {
      themeMode = ThemeMode.system;
    } else {
      themeMode = savedDark ? ThemeMode.dark : ThemeMode.light;
    }

    final token = prefs.getString(keyToken);
    isLoggedIn = token != null && token.isNotEmpty;

    isLoading = false;
    notifyListeners();

    debugPrint("Bootstrap done. themeMode=$themeMode, isLoggedIn=$isLoggedIn");
  }

  Future<void> toggleTheme() async {
    final newMode = themeMode == ThemeMode.dark
        ? ThemeMode.light
        : ThemeMode.dark;

    themeMode = newMode;
    notifyListeners();

    final prefs = await SharedPreferences.getInstance();
    await prefs.setBool(keyDarkMode, newMode == ThemeMode.dark);

    debugPrint("Theme saved: $newMode");
  }

  Future<void> login() async {
    const fakeToken = "token_abc123";

    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(keyToken, fakeToken);

    isLoggedIn = true;
    notifyListeners();

    debugPrint("Logged in (token saved)");
  }

  Future<void> logout() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove(keyToken);

    isLoggedIn = false;
    notifyListeners();

    debugPrint("Logged out (token removed)");
  }
}

/* -------------------------
   App Root
--------------------------*/

class BootstrapApp extends StatelessWidget {
  const BootstrapApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => AppBootstrapModel()..initialize(),
      child: Builder(
        // Builder gives a context under the provider.
        builder: (context) {
          final model = context.watch<AppBootstrapModel>();

          return MaterialApp(
            debugShowCheckedModeBanner: false,
            theme: ThemeData.light(useMaterial3: true),
            darkTheme: ThemeData.dark(useMaterial3: true),
            themeMode: model.themeMode,
            home: const AppEntry(),
          );
        },
      ),
    );
  }
}

/* -------------------------
   App Entry (decides screen)
--------------------------*/

class AppEntry extends StatelessWidget {
  const AppEntry({super.key});

  @override
  Widget build(BuildContext context) {
    final model = context.watch<AppBootstrapModel>();

    if (model.isLoading) return const SplashView();
    return model.isLoggedIn ? const HomePage() : const LoginPage();
  }
}

class SplashView extends StatelessWidget {
  const SplashView({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(body: Center(child: CircularProgressIndicator()));
  }
}

/* -------------------------
   Pages
--------------------------*/

class LoginPage extends StatelessWidget {
  const LoginPage({super.key});

  @override
  Widget build(BuildContext context) {
    // Use read() for actions (no rebuild needed)
    final model = context.read<AppBootstrapModel>();

    return Scaffold(
      appBar: AppBar(title: const Text("Login")),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            ElevatedButton(
              onPressed: () async {
                debugPrint("Login pressed");
                await model.login();
              },
              child: const Text("Login"),
            ),
            const SizedBox(height: 12),
            ElevatedButton(
              onPressed: () async {
                debugPrint("Toggle theme pressed");
                await model.toggleTheme();
              },
              child: const Text("Toggle Theme"),
            ),
          ],
        ),
      ),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    final model = context.read<AppBootstrapModel>();

    return Scaffold(
      appBar: AppBar(title: const Text("Home")),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            ElevatedButton(
              onPressed: () async {
                debugPrint("Logout pressed");
                await model.logout();
              },
              child: const Text("Logout"),
            ),
            const SizedBox(height: 12),
            ElevatedButton(
              onPressed: () async {
                debugPrint("Toggle theme pressed");
                await model.toggleTheme();
              },
              child: const Text("Toggle Theme"),
            ),
          ],
        ),
      ),
    );
  }
}

/*
CH17 completed ✅

You now have a clean startup pattern:
- load persisted theme
- load token auth state
- show splash while initializing
- route based on state
*/