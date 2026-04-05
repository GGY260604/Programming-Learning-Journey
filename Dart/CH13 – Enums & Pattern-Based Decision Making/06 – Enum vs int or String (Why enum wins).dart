/*
-------------------------------------
       Enum vs String / int
-------------------------------------
*/

enum ThemeMode {
  light,
  dark,
}

void main() {
  ThemeMode mode = ThemeMode.dark;

  if (mode == ThemeMode.dark) {
    print("Dark mode enabled");
  }
}

/*
Why enum is better:

❌ String:
- typo-prone
- no autocomplete
- no compiler safety

❌ int:
- meaningless values
- unreadable logic

✅ enum:
- self-documenting
- safe
- readable
*/
