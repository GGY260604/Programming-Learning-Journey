/*
-------------------------------------
    Extensions vs Utility Classes
-------------------------------------

Prefer extensions when:
- function logically belongs to the type
- readability improves

Prefer utility classes when:
- logic is generic
- no clear "owner" type
*/

extension StringTrim on String {
  String get cleaned => trim();
}

class StringUtils {
  static String cleaned(String s) => s.trim();
}

void main() {
  print("  hi  ".cleaned);
  print(StringUtils.cleaned("  hi  "));
}
