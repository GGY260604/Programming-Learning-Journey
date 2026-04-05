# CH01 – Install Flutter + Check Doctor

## 1) Install Flutter (Windows)
- Download Flutter SDK zip from Flutter official site (stable)
- Extract to a folder without spaces, example:
  C:\flutter

## 2) Add Flutter to PATH (Environment Variable)
Add this to PATH:
  C:\flutter\bin

## 3) Verify
Open PowerShell or CMD:

flutter --version
flutter doctor

## What "flutter doctor" does
It checks:
- Flutter SDK installed
- Dart SDK (bundled)
- Android toolchain (Android Studio / SDK)
- Emulator setup
- VS Code / IntelliJ plugins (optional)

## Typical Fixes
- If Android toolchain missing:
  Install Android Studio + Android SDK + accept licenses:
  flutter doctor --android-licenses
