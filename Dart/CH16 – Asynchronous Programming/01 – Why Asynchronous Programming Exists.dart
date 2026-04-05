/*
-------------------------------------
       Dart - Why Async Exists
-------------------------------------

Problem:
Some operations take TIME:
- network requests
- file access
- database queries
- timers

If we block the program while waiting:
- UI freezes
- app becomes unresponsive

Asynchronous programming allows:
- work to happen in the background
- program to stay responsive
*/

void main() {
  print("Async exists to avoid blocking.");
}
