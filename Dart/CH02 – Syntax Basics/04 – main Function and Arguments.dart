/*
-------------------------------------
    Dart - main() and Arguments
-------------------------------------

main() is the program entry point.

Optional:
- main() can receive arguments
- Useful for console programs and testing
*/

void main(List<String> args) {

  print("Arguments count: ${args.length}");

  if (args.isNotEmpty) {
    print("First argument: ${args[0]}");
  } else {
    print("No arguments provided");
  }
}

/*
How to run with arguments:
Use cd to go to the folder where the file is saved.

Then run:
dart run "04 – main Function and Arguments.dart" hello world
// or
dart "04 – main Function and Arguments.dart" hello world

Output:
Arguments count: 2
First argument: hello
*/
