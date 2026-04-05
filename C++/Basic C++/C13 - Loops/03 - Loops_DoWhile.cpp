/*
------------------------------------------------------------
               DO...WHILE LOOP (DETAILED)
------------------------------------------------------------
- do...while runs the body at least once, then checks the condition.
- Same infinite-loop risks as while: the loop must move the state
  toward making the condition false at some point.
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Correct do...while example (counts up):" << endl;
    int i = 1;
    do {
        cout << i << " ";
        i++;                  // update counter toward termination
    } while (i <= 5);
    cout << endl << endl;

    // Infinite example (wrong: no counter change)
    // int j = 1;
    // do {
    //     cout << j << " ";
    //     // missing j++ -> infinite loop
    // } while (j <= 5);

    cout << "Example showing must-change condition when using input:" << endl;
    char choice = 'y';
    int attempts = 0;
    do {
        cout << "Attempt " << attempts + 1 << endl;
        attempts++;
        // Simulate user setting choice to 'n' after 3 attempts
        if (attempts >= 3) choice = 'n'; // ensure condition will eventually be false
    } while (choice == 'y' && attempts < 10);
    cout << "Ended after " << attempts << " attempts." << endl;

    return 0;
}

/*
SAFE PRACTICES:
- Always change the variable(s) that control the loop inside the body.
- When using external conditions (like user input), ensure there's a clear exit path.
- Use an upper bound (like attempts < MAX) for extra safety.
*/
