/*
-------------------------------------
       Why package: is Preferred
-------------------------------------

package: imports:
- are absolute within the package
- survive refactoring
- avoid deep ../ paths

Preferred:
import 'package:my_app/models/user.dart';

Avoid:
import '../../../models/user.dart';
*/
void main() {}
