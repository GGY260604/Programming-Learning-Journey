# 📘 Fundamental Flutter Learning Project

## 🎯 Project Purpose

This project is a **structured learning system for Flutter fundamentals**.

It is designed to:

- Learn Flutter step-by-step from beginner to intermediate
- Understand concepts through **runnable Dart files**
- Focus on architecture, async, state management, performance, and real-world patterns
- Build strong engineering habits (testing, structure, bootstrap, etc.)

Each chapter:

- Contains executable `.dart` files
- Includes heavy comments explaining concepts
- Demonstrates UI behavior visually
- Teaches mental models, not just syntax

This is not a random tutorial collection.  
It is a **systematic Flutter foundation curriculum**.

---

# 🚀 Common Flutter Commands

Below are commonly used Flutter CLI commands during development.

| Command | Description |
|----------|------------|
| `flutter create <project_name>` | Create a new Flutter project |
| `flutter run` | Run the app on connected device/emulator |
| `flutter doctor` | Check Flutter installation status |
| `flutter pub get` | Install dependencies from pubspec.yaml |
| `flutter pub upgrade` | Upgrade project dependencies |
| `flutter clean` | Remove build cache |
| `flutter test` | Run all test files inside `/test` |
| `flutter build apk` | Build Android APK |
| `flutter build ios` | Build iOS app |
| `flutter analyze` | Static code analysis |

---

# 📂 Flutter Project Directory Structure

Below is the standard Flutter project structure and what each folder does.

| Directory / File | Purpose | Typical Content |
|------------------|----------|----------------|
| `/lib` | Main application code | Widgets, models, services, repositories |
| `/test` | Automated tests | Unit tests, widget tests |
| `/android` | Android native project | Gradle files, Android configs |
| `/ios` | iOS native project | Xcode project files |
| `/web` | Web build configuration | Web entry files |
| `/windows`, `/macos`, `/linux` | Desktop support | Platform-specific configs |
| `/build` | Auto-generated build output | Compiled artifacts (do not edit) |
| `pubspec.yaml` | Project configuration | Dependencies, assets, metadata |
| `pubspec.lock` | Dependency version lock | Exact dependency versions |
| `analysis_options.yaml` | Linting rules | Code quality configuration |
| `main.dart` | App entry point | `runApp()` starts the application |

---

## 📁 Inside `/lib` (Recommended Structure for Flutter Project)

| Folder | Responsibility |
|--------|----------------|
| `/models` | Data models (domain layer) |
| `/services` | API or platform services |
| `/repositories` | Business data access layer |
| `/widgets` | Reusable UI components |
| `/utils` | Pure Dart utilities |

---

# 🧠 Learning Philosophy

This project emphasizes:

- Declarative UI thinking
- Rebuild mechanics understanding
- Clean architecture separation
- State management discipline
- Async understanding (Future + Stream)
- Testing mindset
- Production-ready patterns

---

# 📈 Current Learning Coverage

The project covers:

- Flutter basics
- Layout system
- Navigation
- Forms
- Async & API
- Provider state management
- Theming & dark mode
- Local persistence
- Performance fundamentals
- App bootstrap architecture
- Testing fundamentals

---

# 🔥 Final Goal

By completing this project, you should be able to:

- Build structured Flutter applications
- Implement clean startup logic
- Manage scalable state
- Handle API & persistence properly
- Write basic unit and widget tests
- Understand Flutter rebuild behavior deeply

This is a **foundation-focused, architecture-aware Flutter learning system**.