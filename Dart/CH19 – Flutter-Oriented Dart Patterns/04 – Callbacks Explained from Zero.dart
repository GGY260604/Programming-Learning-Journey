/*
-------------------------------------
       Callbacks (Conceptual)
-------------------------------------

A callback is:
- a function passed into another function
- to be called later

Used for:
- notifying events
- user actions
- child → parent communication
*/

void performAction(void Function() callback) {
  print("Before action");
  callback();
  print("After action");
}

void main() {
  performAction(() {
    print("Action executed");
  });
}

/*
Flutter uses callbacks for:
- onPressed
- onChanged
- onTap
*/
